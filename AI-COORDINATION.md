# AI Coordination — Shared State Between Claude Code and Codex

**Last updated:** 2026-04-28 (Claude Code)

This file is the **single source of truth** when handing off work between AI agents working on KeyboardTester.click. Both Claude Code and Codex read this at the start of every session and update it before ending.

---

## 🧭 Current state of the project

**Site version:** v17.2.40 (April 25, 2026)
**Roadmap:** 50/50 tools built, no pending tools
**Last major work:** Pro Diagnostics panel deployed to all 9 language keyboard testers (Apr 28)

## 👥 Active agents

| Agent | Workspace | Memory location |
|-------|-----------|-----------------|
| Claude Code | `c:/xampp/htdocs/kbt` | `C:\Users\TECH OFFICE\.claude\projects\c--xampp-htdocs-kbt\memory\` |
| Codex | `c:/xampp/htdocs/kbt` | (TBD — Codex sets its own location) |

**Both agents share:** all files in the workspace, all credentials in `.env`, all gitignored credential files (`google-credentials.json`, `.ssh-deploy/kbt_deploy`).

---

## 🔄 Handoff protocol

### Before starting work
1. **Read this file first** (top to bottom)
2. Read [seo-audit-2026-04-26/SESSION-TRACKER.md](seo-audit-2026-04-26/SESSION-TRACKER.md) for last session's detailed state
3. Run `git log --oneline -20` to see recent commits
4. Check the "Active tasks" section below to know what's in flight

### During work
- If you start a non-trivial task (>15 min), add it to "Active tasks" with your agent name
- If you finish a task, move it to "Completed today" with date + agent
- If you make a discovery worth remembering, add it to "Lessons learned"
- Don't edit files another agent is currently editing — coordinate via this doc

### Before ending session
1. Update "Active tasks" — mark anything in-flight
2. Update "Last updated" at top with date + agent name
3. If new credentials/tokens were added, document in "Credentials inventory"
4. Commit changes with message prefixed `[claude]` or `[codex]`

---

## 🎯 Active tasks (in flight or queued)

**Status legend:** `[in-progress]` `[queued]` `[blocked]` `[awaiting-user]`

| Task | Owner | Status | Notes |
|------|-------|--------|-------|
| DEV.to article series (5 total, 1 published) | Claude | `[awaiting-user]` | Articles 2-5 ready to write; next publish ~Apr 30 |
| AlternativeTo.net submission | User | `[blocked]` | Account age <7 days, unlocks May 4 — text saved at `seo-audit-2026-04-27/alternativeto-submission-PENDING-2026-05-04.md` |
| Slant.co listing | User | `[blocked]` | Slant search returned 500; package ready at `seo-audit-2026-04-27/slant-submission-package.md` |
| GitHub awesome-list PR #62 | User | `[awaiting-merge]` | Maintainer feedback addressed, waiting for re-review |
| GSC validation clicks (5 buckets) | User | `[done]` | Clicked Apr 27 |
| Localized SEO Phase 1C+ | Either | `[queued]` | Russian/Spanish optimization done; remaining: localized intro paragraphs for typing-rhythm/brightness pages |

---

## 📜 Completed today (rolling 24-48h log)

### 2026-04-28 (Claude)
- ✅ Built Pro Diagnostics panel (NKRO counter, combo presets, polling rate, debounce, actuation)
- ✅ Deployed to all 9 language keyboard testers (en + 8 locales)
- ✅ Fixed polling rate calculation bug (interval ref was wrong)
- ✅ Published DEV.to Article 1 (keyboard ghosting + NKRO)

### 2026-04-27 (Claude)
- ✅ Localized Phase 1C: Russian/French/German/Spanish/Portuguese homepage SEO updates
- ✅ Spanish click-speed.php + dpi-tester.php optimizations (Arabic-pattern replica)
- ✅ Internal linking audit + 3 cross-link blocks added (mouse-test, mouse_speed_tester, keyboard_typing_test)
- ✅ All 46 GSC indexing issues addressed
- ✅ DEV.to API setup + Article 1 drafted

### 2026-04-26 (Claude)
- ✅ Survived 12-hour HostArmada outage with maintenance page
- ✅ Fixed `Cannot redeclare url()` PHP fatal in config.php
- ✅ Built GSC API automation (`gsc-traffic.py`, `gsc-coverage-audit.py`)
- ✅ Fixed mouse-trail-index.php duplicate

---

## 🔑 Credentials inventory

All credentials are in the workspace — both agents have access by default.

| Credential | Path | Format | Owner |
|-----------|------|--------|-------|
| FTP/SFTP private key | `.ssh-deploy/kbt_deploy` | OpenSSH ed25519 | Auto-loaded by `paramiko` |
| Bing Webmaster API | `.env` → `BING_API_KEY` | API key string | Read by `submit-bing-wmt.py` |
| GCP service account | `google-credentials.json` | JSON | Used by `submit-google-indexing.py`, `gsc-*.py` |
| DEV.to API key | `.env` → `DEVTO_API_KEY` | API key string | **Action: move from chat to .env** |
| GitHub PAT | (none persisted) | User generates ad-hoc when needed | Per-task generation, revoke after |
| HostArmada SSH | port 19199, user `keyboar1` | Uses `.ssh-deploy/kbt_deploy` | Documented in CLAUDE.md |

## 📚 Where to find things

| Looking for... | Path |
|----------------|------|
| Project rules/conventions (Claude) | [CLAUDE.md](CLAUDE.md) |
| Project rules/conventions (Codex) | [AGENTS.md](AGENTS.md) |
| Detailed session logs | `seo-audit-{date}/SESSION-TRACKER.md` |
| Deploy scripts | `deploy-*.py` (root) |
| Indexing/SEO scripts | `submit-*.py`, `gsc-*.py` (root) |
| DEV.to publishing | `dev-to-publish.py` + `dev-to-articles/*.md` |
| Tool registry | `includes/components/tool-list-data.php` |
| Schema / SEO meta | `includes/schema.php`, `includes/seo-meta.php` |
| GSC API service account | Domain property `sc-domain:keyboardtester.click` (siteOwner) |
| Past audits | `seo-audit-{date}/` directories |

---

## 🚫 Things NOT to do (mistakes to avoid — historical)

- ❌ **Don't deploy via FTPS** — host's TLS data channel hangs. Use SFTP/paramiko via the SSH key.
- ❌ **Don't add a function in `config.php` without a `function_exists()` guard** — caused 12-hour outage on 2026-04-26.
- ❌ **Don't use `os.system` or shell=True with user input** — use `subprocess.run([...])` with list args.
- ❌ **Don't post promotional comments on Facebook pages** — spam detection, no SEO value (links are nofollow).
- ❌ **Don't try to fix the GSC sitemap "Couldn't fetch" error** — confirmed Google-side bug since Sept 2025, no technical fix exists.
- ❌ **Don't create blog wp-content/wp-admin URLs** — those return 410 Gone via .htaccess.
- ❌ **Don't try to send WhatsApp/IFTTT spam** — not the strategy.
- ❌ **Don't submit dev.to URLs to Google Indexing API** — service account isn't a property owner there; will return 403.

## 💡 Lessons learned (worth keeping in mind)

- Domain property Owner satisfies BOTH Search Console API and Indexing API (Google's docs imply URL Prefix only — but Domain works in practice as of 2026-04).
- Adding service account to GSC Domain property can silently demote URL Prefix permissions. Re-add to URL Prefix as Owner if Indexing API starts failing.
- HostArmada uses lsapi+CageFS, NOT PHP-FPM. Don't ask host to "restart PHP-FPM" — they don't run FPM.
- DEV.to community responds to genuinely educational content; promo angle gets downranked algorithmically.
- 82% of KeyboardTester.click clicks come from non-USA. Korean and Arabic markets ARE searching in native languages; French/German/Spanish/Brazilian markets mostly search in English.

---

## 🤝 Conflict resolution

If both agents need to modify the same file:

1. **Check this file's "Active tasks" first** — if another agent claimed the file, wait
2. **If urgent and other agent unreachable:** make the change, mark in this file as "modified by [agent] while [other] was working — review for conflicts"
3. **For .env / credentials:** never commit. Always gitignored. If you need to add a key, document its existence here (don't paste the value).
4. **For deploys:** only one agent should deploy at a time. Use this file's "Active tasks" to claim.

---

## 📊 Session ending checklist (do this before logging off)

- [ ] Updated "Active tasks" with current state
- [ ] Moved completed work to "Completed today"
- [ ] Documented any new credentials added
- [ ] Updated "Last updated" timestamp at top
- [ ] Committed changes with `[agent-name]` prefix
- [ ] If site was deployed: verified production state via curl

---

## 🚀 Recommended workflow

**Daily start:**
```
1. cd c:/xampp/htdocs/kbt
2. cat AI-COORDINATION.md         # see what's queued + recent context
3. cat seo-audit-2026-04-26/SESSION-TRACKER.md  # detailed state
4. git log --oneline -20          # recent commits
5. Pick a task from "Active tasks" or take a new request from user
6. Work
7. Update this file before ending
```

**For ANY agent:** if you're unsure who's doing what, **ask the user before starting** — they'll know who's currently active.
