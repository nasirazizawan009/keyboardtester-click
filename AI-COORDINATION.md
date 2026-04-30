# AI Coordination — Shared State Between Claude Code and Codex

**Last updated:** 2026-04-30 (Codex, local runner progress visual)

This file is the **single source of truth** when handing off work between AI agents working on KeyboardTester.click. Both Claude Code and Codex read this at the start of every session and update it before ending.

---

## 🧭 Current state of the project

**Site version:** v17.2.47 (April 28, 2026 — latest work: Codex blog homepage redesign)
**Roadmap:** 50/50 tools built, no pending tools
**Last major work:** Pro Diagnostics panel deployed to all 9 language keyboard testers; Codex redesigned/deployed the blog homepage with pinned GSC-performing articles

**Note on commit prefixes:** This file previously suggested `[claude]` / `[codex]` prefixes. The first joint commit (`79de12c`) predates the convention. Going forward, both agents should add the prefix.

**Note on DEV.to API key:** `DEVTO_API_KEY` is now in `.env` (gitignored). Verified no token value in commit history. Token can be rotated at https://dev.to/settings/extensions if ever exposed.

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

### 2026-04-30 (Codex)
- Done: Refreshed the local-only English desktop keyboard tester visual in `tools/keyboard_tester_english.php` to match the dark-key/light-deck full keyboard reference more closely.
- Done: Kept existing key `data-key` wiring and added visual-key click handling so mouse/touch clicks on desktop keys record history/counters/cat progress the same way as physical key presses. PrintScreen remains disabled because browsers cannot capture it.
- Done: Follow-up alignment pass: F12 now ends on the same right edge as Backspace, and the desktop keyboard shows visible Caps/Num/Scroll indicator lights above the numpad.
- Done: Fixed local English keyboard OS switching reliability and changed the keyboard sound control to start ON by default on page load.
- Done: Improved Mac/Windows switcher visibility: Mac mode now reorders the bottom modifier row into Mac-style order while Windows mode restores the Windows order.
- Done: Moved the Pro Diagnostics floating "Held" indicator out of the lower-right viewport corner so it no longer overlaps the numpad/keyboard; it now appears as a centered pill above the keyboard while keys are held.
- Done: Stabilized visual key clicks so clicking on-screen keys no longer causes whole-keyboard flicker: keys no longer take pointer focus, counter badges are pre-rendered, active classes are updated with `classList`, and the click sound reuses one audio context.
- Done: Reserved layout space for the Pro Diagnostics "Held" pill and changed it from `display` toggling to opacity/visibility toggling so physical key presses no longer shift/flicker the keyboard deck.
- Done: Shifted the English keyboard "Held" status pill under the desktop keyboard while keeping the shared Pro Diagnostics component compatible with localized keyboard pages.
- Done: Replaced the visible cat progress game locally with a horse pasture progress scene: a small horse moves along the ground, eats grass at 10 milestones, and passes different tree shapes at each step.
- Done: Refined the horse pasture visual after review: replaced the browser-dependent horse emoji with a right-facing CSS horse and added continuous grass across the full track, not only at tree milestones.
- Verified locally only: PHP lint passed, homepage and `/tools/keyboard-tester/` render without horizontal overflow, desktop keypress/click interactions light keys and update history/horse pasture progress, and the mobile keyboard view remains active under mobile viewport. No live deploy was run.
- Done: Re-checked GSC URL Inspection against the earlier indexing cleanup. Current sample shows `mouse-and-keyboard-test-tools.php` and `keyboard-ghosting-test.php` are now indexed; `index.php` is still a normal redirect to `/`; `privacy.php` is stale canonical data from Google's March crawl; `n-key-rollover-test.php`, `stuck-key-test.php`, and `ai-assistant.php` are still unknown to Google.
- Done locally only: removed the remaining raw `index.php` contextual link in `help/seo-content/keyboard-ghosting-test.php` and strengthened homepage keyboard SEO copy with canonical contextual links to `stuck-key-test.php`, `keyboard-ghosting-test.php`, and `n-key-rollover-test.php`. No live deploy was run.
- Done: Replaced the local horse pasture progress strip with a simple Chrome T-Rex-style runner scene: monochrome track, ground dashes, clouds, grass/obstacle checkpoints, and a cleaner CSS horse silhouette that moves forward as unique keys are tested.
- Verified locally only: PHP lint passed for `includes/components/keyboard-cat-progress.php` and `tools/keyboard_tester_english.php`; `node --check` passed for `assets/js/keyboard-cat-progress.js`; desktop and mobile Playwright checks against `https://localhost/kbt/` showed no horizontal overflow, the checkpoint counter advances, and the runner strip renders correctly. No live deploy was run.

- Done: Fixed failing GitHub Actions `awesome-lint.yml` check on `nasirazizawan009/awesome-device-testing-tools` after commit `02a607f` rewrote `README.md`.
- Root cause: `README.md` removed the required Awesome badge and added a forbidden `## License` section; `awesome-lint` requires the badge and does not allow a README license section when a `LICENSE` file exists.
- Verified/pushed: Local `npx.cmd awesome-lint README.md` passes. Pushed commit `bfdc9f0` (`Fix awesome lint errors`) to `main`; GitHub Actions run #4 completed successfully.

### 2026-04-29 (Codex)
- Done: Cleaned up the published `awesome-device-testing-tools` README to reduce direct keyboard-tester clone competitors. Removed `KeyboardTester.com`, `Key-Test`, `Keyboard Test Space`, `Hardware Tester Keyboard Test`, `Hardware Tester Mouse Test`, `Hardware Tester Gamepad Test`, and `WebCamMicTest`.
- Done: Added more adjacent authority resources instead: QMK Documentation, QMK Configurator, VIA, Vial, Keyboard Layout Editor, MouseTester, DisplayCAL, MDN WebHID API, W3C Gamepad Standard, and Web Audio API.
- Verified/pushed: `npx.cmd awesome-lint README.md` passes. Pushed commit `b5f5013` directly to `https://github.com/nasirazizawan009/awesome-device-testing-tools`; raw GitHub README confirms removed competitor entries are gone and new authority entries are present.
- Done: Added and deployed `resources.php` as a public "Submit a Device Testing Tool" page that points users to the `awesome-device-testing-tools` GitHub issue form, repo, and pull request flow. Added neutral review standards so it is not framed as a backlink exchange.
- Done: Added a sitewide footer "Submit a Tool" link to `resources.php`, added SEO metadata/config links, regenerated `sitemap.xml`, and included the page in IndexNow submissions.
- Verified/deployed: PHP lint passed for changed PHP files, local/live page has exactly one H1, live `resources.php` returns HTTP 200, live homepage footer links to `/resources.php`, live sitemap includes the page, and IndexNow returned HTTP 200 with the new URL included.
- Done: Installed GitHub CLI via winget. Binary is at `C:\Program Files\GitHub CLI\gh.exe`, version `2.92.0`. It is not authenticated yet; run `gh auth login --web --hostname github.com --git-protocol https` before publishing new repos from CLI.
- Done: Created local starter repo package for `awesome-device-testing-tools` at `github-repo/awesome-device-testing-tools/` with README, contribution rules, CC0 license, PR template, issue form, awesome-lint GitHub Action, and maintainer notes. Local repo initialized on `main` with commit `22bcd0f`.
- Done: Published public GitHub repo at `https://github.com/nasirazizawan009/awesome-device-testing-tools` and kept the URL unchanged per user request. Added repo topics (`awesome`, `awesome-list`, `device-testing`, etc.), homepage URL, and submission review labels. Verified `npx awesome-lint README.md` passes.
- Done: Added supporting homepage copy for Google "People also search for" keyboard tester variants without changing the primary homepage title/meta/H1. New visible coverage includes no-download keyboard tester, laptop keyboard tester, Windows/Mac compatibility, 60 percent keyboard testing, and gaming keyboard tester use cases.
- Done: Updated homepage FAQ schema in `includes/schema.php` to match the new visible FAQ entries.
- Verified/deployed: PHP lint passed with `C:\xampp\php\php.exe`, live homepage returns HTTP 200, existing title/meta stayed unchanged, new visible copy and JSON-LD FAQ entries are present on production. IndexNow returned HTTP 200 after deployment.

### 2026-04-28 (Codex)
- Done: Created a 23.5s vertical YouTube Short package for KeyboardTester.click at `seo-audit-2026-04-28/youtube-short-keyboard-test/`. Files include `keyboardtester-keyboard-test-short.mp4` (1080x1920 H.264/AAC with narration/captions), `keyboardtester-short-thumbnail.jpg`, `upload-title-description.txt`, and `upload-metadata.json`.
- Note: YouTube upload was not completed because the project has no YouTube OAuth/API credentials or upload script. `.env` only contains Bing/DEV.to/FTP/IndexNow keys. The MP4 is ready for manual upload or OAuth-based upload once channel access is provided.
- Done: Fixed `/blog/` dark-mode contrast issue where global dark-mode `!important` text rules made blog card titles/excerpts nearly invisible on white card backgrounds. Added explicit dark-mode blog card/page backgrounds plus high-contrast title, excerpt, date, CTA, placeholder, section, and pagination colors in `blog/index.php`.
- Verified/deployed: PHP lint passed. Local and live Playwright computed-style checks in forced dark mode passed with card background `rgb(17, 24, 39)`, title contrast `16.96:1`, excerpt contrast `11.95:1`, date contrast `6.96:1`, and no horizontal overflow. Uploaded `blog/index.php` via SFTP and verified live `/blog/` HTTP 200 contains the dark-mode CSS.
- Done: Researched a low-competition keyboard timing content cluster from GSC + live SERP checks. Selected `keyboard polling rate test`, `keyboard Hz checker`, `keyboard polling rate checker`, and `how to check keyboard polling rate` because GSC already shows impressions around page-one positions but no clicks, and the SERP is mostly niche tools/explainers rather than high-authority publishers.
- Done: Published `blog/keyboard-polling-rate-test-check-keyboard-hz.php` with stock keyboard images, a related YouTube embed, Article + FAQ schema, internal links to the keyboard polling rate test, latency checker, key repeat rate tester, NKRO/ghosting tools, and relevant blog guides.
- Deployed: Uploaded the new article, `blog/posts-data.php`, two optimized WebP images, and updated `sitemap.xml` via SFTP/paramiko. Live verification passed: article HTTP 200, exactly one H1, images HTTP 200, video embed present, `/blog/` shows the new post, live sitemap contains the new URL, and IndexNow returned HTTP 200 with 862 URLs including the new post.
- Done: Redesigned `blog/index.php` so `/blog/` has a stronger editorial homepage: dark hero panel, large featured article, GSC-pinned "Top performing articles" rail, and a cleaner latest-guides archive below.
- Done: Kept top-performing blog articles on the blog homepage based on GSC data. `best-mechanical-keyboards-for-gaming-2026.php` is now the featured story; keyboard fix, ghosting, shortcuts, WebRTC leak, and crosshair articles are pinned below it. The normal archive excludes those pinned posts to avoid duplicate cards.
- Verified/deployed: Local PHP lint passed. Playwright desktop/mobile checks passed with one H1, 5 pinned rail cards, 9 latest cards, no horizontal overflow, and no duplicate mechanical-keyboard card in the latest grid. Deployed `blog/index.php` via SFTP and verified live `/blog/` and `/blog/?page=2` return HTTP 200 with the expected pinned behavior.
- Done: Replaced visible internal wording on `/blog/` that mentioned "SEO" with reader-facing copy about finding proven guides and new articles quickly. Deployed and verified live.
- Done: GSC CTR batch 1 for `mouse_sensitivity_DPI_tester.php` and `latency-checker.php`. Tightened page titles, meta descriptions, H1s, hero badges, tool-stage copy, feature cards, process copy, and schema/meta config around the actual GSC query language (`dpi tester`, `mouse dpi checker`, `keyboard latency test`, `keyboard delay test`, `input delay`).
- Done: Expanded `help/latency-checker.php` with clearer browser-measurement guidance: what the test measures, what it cannot measure, and how to reduce noisy results without overclaiming hardware-level accuracy.
- Deployed: Uploaded the 8 changed CTR files via SFTP/paramiko and verified production returns HTTP 200 with exactly one title/meta description/H1 on both target URLs. IndexNow endpoint returned HTTP 200 after deployment.
- Done: Counter-checked the Semrush Site Audit PDF from Apr 28 before acting. Live verification showed the reported hreflang, blocked CSS/JS/image resources, and broken image issues are stale/false positives.
- Done: Cleaned real sitemap/indexing problems: excluded non-indexable endpoints (`ai-chat.php`, `ai-config.php`, `desktop-manifest.php`), the old `testpage.php`, `404.php`, and `mouse-trail-index.php` from future sitemap generation.
- Done: Deployed `.htaccess`, `desktop-manifest.php`, `generate-sitemap.php`, and `sitemap.xml`. Production now returns 403 for direct `ai-config.php`, 410 for `testpage.php`, and `X-Robots-Tag: noindex` for `desktop-manifest.php`.
- Verified: Live `sitemap.xml` now contains 875 URLs and no excluded endpoints. Local sitemap URL status sweep found no real bad URLs after retrying one timeout. IndexNow returned HTTP 200 for 861 submitted URLs.
- Done: Updated and deployed `blog/best-mechanical-keyboards-for-gaming-2026.php` for weak GSC CTR: shorter title/meta/H1, refreshed JSON-LD `dateModified`, quick-answer box, jump links, and "How we chose" copy.
- Done: Updated and deployed `blog/posts-data.php` so the blog card uses the new title/excerpt.
- Done: Fixed all static blog PHP pages plus `blog/generate-blog.php` so SEO meta output lives inside `<head>` and duplicate manual `<title>` tags are removed.
- Done: Regenerated/deployed `sitemap.xml`; updated `generate-sitemap.php` so `/blog/` lastmod follows `blog/posts-data.php`, and excluded `blog/posts-data.php` from future sitemap/IndexNow discovery.
- Verified: Production article returns HTTP 200 with exactly one title/meta description, new title, H1, quick-answer section, and `dateModified=2026-04-28`. Blog card appears on `/blog/?page=2`; IndexNow returned HTTP 200 for 861 URLs.

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
