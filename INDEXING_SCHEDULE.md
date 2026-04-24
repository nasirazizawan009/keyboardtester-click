# Google Indexing API — Submission Schedule

**Total sitemap URLs:** 665
**Daily quota:** 200 URLs/day (Google Cloud free tier)
**Script:** [`submit-google-indexing.py`](submit-google-indexing.py:1)

---

## 📅 Run Schedule

### ✅ Day 1 — April 23, 2026 (DONE)
- Submitted: **207 URLs** (items 1–207)
- Quota hit at item 208
- Log: [`submit-google-indexing-log.txt`](submit-google-indexing-log.txt:1)

### ⏳ Day 2 — April 24, 2026
```bash
python submit-google-indexing.py --from-sitemap --offset 207
```
Expected: ~200 more URLs submitted (items 208–407)

### ⏳ Day 3 — April 25, 2026
```bash
python submit-google-indexing.py --from-sitemap --offset 407
```
Expected: ~200 more URLs submitted (items 408–607)

### ⏳ Day 4 — April 26, 2026
```bash
python submit-google-indexing.py --from-sitemap --offset 607
```
Expected: Final ~58 URLs (items 608–665) — under quota

---

## 🔁 Weekly Cadence (Ongoing)

After the initial 4-day push, re-submit the full sitemap **once a week** to keep Google refreshing pages:

```bash
# Monday: run first 200
python submit-google-indexing.py --from-sitemap

# Tuesday: next 200
python submit-google-indexing.py --from-sitemap --offset 200

# Wednesday: next 200
python submit-google-indexing.py --from-sitemap --offset 400

# Thursday: final batch
python submit-google-indexing.py --from-sitemap --offset 600
```

---

## 📊 Monitoring

Check Google Search Console → **Pages** report every 3–7 days:
- URL: https://search.google.com/search-console
- Property: `keyboardtester.click` (Domain)
- Watch: "Indexed" count (was ~37 before this push)
- Target: 150+ indexed within 2–3 weeks

---

## 🛠️ Common Commands

```bash
# Dry run (see URLs, don't submit)
python submit-google-indexing.py --from-sitemap --dry-run

# Submit specific URLs only
python submit-google-indexing.py --urls https://keyboardtester.click/new-tool.php

# Submit default hardcoded "new tools" list (bypasses sitemap)
python submit-google-indexing.py

# Change delay between requests (default 0.4s)
python submit-google-indexing.py --from-sitemap --delay 0.6
```

---

## ⚠️ Troubleshooting

| Problem | Fix |
|---------|-----|
| `HTTP 429 QUOTA` | Expected. Wait until tomorrow and resume with `--offset N` shown in the error. |
| `HTTP 403` | Service account lost GSC Owner permission — re-add it in GSC Settings → Users. |
| `credentials.json not found` | File is gitignored. Check it exists at repo root. |
| Sitemap not updating | Regenerate via `php generate-sitemap.php` then re-run script. |

---

**Last updated:** April 23, 2026
