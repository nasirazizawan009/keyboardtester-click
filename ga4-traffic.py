#!/usr/bin/env python3
"""GA4 Traffic Report - pull sessions, users, top pages, channels, countries, and
devices from the Google Analytics 4 Data API for any date range.

Mirrors gsc-traffic.py. Uses the SAME service account (google-credentials.json)
already used for the Search Console + Indexing APIs.

ONE-TIME SETUP (3 steps):
  1. Enable the Analytics Data API on the GCP project:
       https://console.cloud.google.com/apis/library/analyticsdata.googleapis.com?project=kbt-indexing-4659
     (or:  gcloud services enable analyticsdata.googleapis.com --project kbt-indexing-4659)
  2. In GA4 -> Admin -> Property Access Management, add the service account
       kbt-indexing-sa@kbt-indexing-4659.iam.gserviceaccount.com  as a "Viewer".
  3. Put your GA4 numeric property ID in .env:   GA4_PROPERTY_ID=123456789
       (GA4 -> Admin -> Property Settings -> "PROPERTY ID", a number, NOT the G-XXXX measurement id)

Usage:
  python ga4-traffic.py                 # last 30 days
  python ga4-traffic.py --days 90       # last 90 days
  python ga4-traffic.py --property 123456789 --days 28
"""
import argparse, json, sys
from datetime import date, timedelta
from pathlib import Path

try:
    from google.oauth2 import service_account
    import google.auth.transport.requests
    import requests
except ImportError:
    sys.exit("Missing deps. Run: pip install google-auth requests")

KEY_FILE = "google-credentials.json"
SCOPES = ["https://www.googleapis.com/auth/analytics.readonly"]
ENV_FILE = Path(".env")
API = "https://analyticsdata.googleapis.com/v1beta/properties/{pid}:runReport"


def load_property_id(cli_value):
    if cli_value:
        return str(cli_value).strip()
    if ENV_FILE.exists():
        for line in ENV_FILE.read_text(encoding="utf-8", errors="replace").splitlines():
            line = line.strip()
            if line.startswith("GA4_PROPERTY_ID="):
                v = line.split("=", 1)[1].strip().strip('"').strip("'")
                if v and v.lower() not in ("", "your_ga4_property_id_here"):
                    return v
    return None


def token():
    creds = service_account.Credentials.from_service_account_file(KEY_FILE, scopes=SCOPES)
    creds.refresh(google.auth.transport.requests.Request())
    return creds.token


def run_report(pid, tok, body):
    r = requests.post(API.format(pid=pid),
                      headers={"Authorization": f"Bearer {tok}", "Content-Type": "application/json"},
                      data=json.dumps(body), timeout=60)
    if r.status_code != 200:
        msg = r.text[:400]
        if "SERVICE_DISABLED" in msg or "has not been used" in msg:
            sys.exit("Analytics Data API is not enabled. Do setup step 1 (see file header).\n" + msg)
        if "PERMISSION_DENIED" in msg:
            sys.exit("Service account lacks access to this GA4 property. Do setup step 2.\n" + msg)
        sys.exit(f"GA4 API HTTP {r.status_code}: {msg}")
    return r.json()


def report(pid, tok, dims, mets, start, end, limit=25):
    body = {
        "dateRanges": [{"startDate": start, "endDate": end}],
        "dimensions": [{"name": d} for d in dims],
        "metrics": [{"name": m} for m in mets],
        "limit": limit,
        "orderBys": [{"metric": {"metricName": mets[0]}, "desc": True}] if dims else [],
    }
    rows = run_report(pid, tok, body).get("rows", [])
    out = []
    for row in rows:
        dv = [d["value"] for d in row.get("dimensionValues", [])]
        mv = [m["value"] for m in row.get("metricValues", [])]
        out.append((dv, mv))
    return out


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--days", type=int, default=30)
    ap.add_argument("--property", default=None)
    ap.add_argument("--top", type=int, default=25)
    args = ap.parse_args()

    pid = load_property_id(args.property)
    if not pid:
        sys.exit("No GA4 property id. Add GA4_PROPERTY_ID=<number> to .env or pass --property. See file header for setup.")

    end = date.today()
    start = end - timedelta(days=args.days)
    s, e = start.isoformat(), end.isoformat()
    print(f"GA4 property {pid} | {s} to {e} ({args.days} days)")
    tok = token()

    totals = report(pid, tok, [], ["sessions", "totalUsers", "screenPageViews", "engagementRate", "averageSessionDuration"], s, e)
    pages = report(pid, tok, ["pagePath"], ["screenPageViews", "sessions"], s, e, args.top)
    channels = report(pid, tok, ["sessionDefaultChannelGroup"], ["sessions", "totalUsers"], s, e, 15)
    countries = report(pid, tok, ["country"], ["sessions"], s, e, 15)
    devices = report(pid, tok, ["deviceCategory"], ["sessions"], s, e, 5)

    md = [f"# GA4 Traffic Report\n", f"**Property:** {pid}  \n**Range:** {s} to {e} ({args.days} days)\n"]
    if totals:
        t = totals[0][1]
        md.append("## Totals\n")
        md.append(f"- Sessions: {t[0]}\n- Users: {t[1]}\n- Pageviews: {t[2]}\n- Engagement rate: {float(t[3])*100:.1f}%\n- Avg session (s): {float(t[4]):.1f}\n")
        print("\nTotals:", dict(zip(["sessions","users","views","engRate","avgSec"], t)))
    def tbl(title, rows, cols):
        md.append(f"\n## {title}\n\n| " + " | ".join(cols) + " |\n|" + "---|"*len(cols) + "\n")
        for dv, mv in rows:
            md.append("| " + " | ".join(list(dv)+list(mv)) + " |\n")
    tbl("Top Pages", pages, ["Page", "Views", "Sessions"])
    tbl("Channels", channels, ["Channel", "Sessions", "Users"])
    tbl("Countries", countries, ["Country", "Sessions"])
    tbl("Devices", devices, ["Device", "Sessions"])

    outdir = Path(f"seo-audit-{end.isoformat()}"); outdir.mkdir(exist_ok=True)
    (outdir / f"ga4-traffic-{end.isoformat()}-{args.days}d.md").write_text("".join(md), encoding="utf-8")
    (outdir / f"ga4-traffic-{end.isoformat()}-{args.days}d.json").write_text(
        json.dumps({"totals": totals, "pages": pages, "channels": channels, "countries": countries, "devices": devices}, indent=2), encoding="utf-8")
    print(f"Saved: {outdir}/ga4-traffic-{end.isoformat()}-{args.days}d.md")


if __name__ == "__main__":
    main()
