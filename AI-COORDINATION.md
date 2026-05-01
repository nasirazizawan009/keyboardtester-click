# AI Coordination — Shared State Between Claude Code and Codex

**Last updated:** 2026-05-02 (Codex, GitHub backlink reply)

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
| USA backlink outreach batch | User/Codex | `[awaiting-replies]` | 29 validated contacts sent from `outreach@keyboardtester.click`; 21 contacts remain on hold pending email/source validation. Watch mailbox for replies, bounces, and opt-outs. Master tracker: `seo-audit-2026-05-02/outreach/outreach-master-tracker-2026-05-02.md`. |
| Russian/localized outreach | Either | `[queued]` | Do not send yet. Wait 24-48h after USA batch, then build 15-20 verified Russian-language prospects. Use Russian only for Russian-language/relevant sites, unique subjects, sender as `KeyboardTester.click team`. |
| Advertiser prospecting | Either | `[queued]` | Separate from backlink outreach. Build commercial leads for page-specific sponsorships/media kit; do not ask advertisers for backlinks in the first pitch. |
| WhatsApp outreach | Either | `[paused]` | Use only for highly relevant public business WhatsApp numbers; no automation, no blasts, no repeat messages without reply. |

---

## 📜 Completed today (rolling 24-48h log)

### 2026-05-02 (Codex)
- Replied on merged PR `nafasebra/awesome-webdesign-tools#32` with a short thank-you comment. Do not add more comments there unless the maintainer replies. Current verified awesome-list state: `StanForever/awesome-websites#49` merged, `nafasebra/awesome-webdesign-tools#32` merged, and `Bakumon/awesome-online-tools#29` submitted/open.
- Registered the outreach operating rules in ignored master tracker `seo-audit-2026-05-02/outreach/outreach-master-tracker-2026-05-02.md`. It covers mailbox/Sent-folder handling, USA batch status, held contacts, email writing rules, sender reputation limits, Russian/localized outreach rules, advertiser prospecting, WhatsApp outreach rules, backlink PR status, and next actions. Future outreach should follow that tracker to avoid duplicate sends or reputation damage.
- Fixed the outreach mailbox Sent-folder visibility issue. SMTP delivery did not automatically save messages to webmail Sent, so Codex appended 29 already-sent message copies to IMAP folder `INBOX.Sent` without resending anything. Sent folder count moved from 0 to 29. Copy log is ignored at `seo-audit-2026-05-02/outreach/imap-sent-copy-log-usa-keyboardtester-2026-05-02.csv`. Future outreach send scripts should append a Sent copy via IMAP, or otherwise BCC/archive explicitly, so webmail reflects sent messages.
- Verified `nafasebra/awesome-webdesign-tools#32` was merged into `main` on 2026-05-01T20:04:26Z. The merged backlink points to `https://keyboardtester.click/online-ruler.php` from `README.md` at merge commit `50f108f02b91ffdea6cec3449e333cd5126e9ec9`. Updated ignored backlink sprint note; practical status is now 2 merged GitHub backlink PRs and 19 open PRs to monitor.
- Sent the approved USA outreach batch from `outreach@keyboardtester.click` after shortening the copy and personalizing each email by company/reference/target URL. Sent 29 validated contacts successfully with 0 SMTP failures; 21 unverified contacts remain on hold. Logs and final drafts are ignored under `seo-audit-2026-05-02/outreach/`: `drafts-short-ready-usa-keyboardtester-2026-05-02.csv`, `drafts-short-ready-usa-keyboardtester-2026-05-02.sent.csv`, `sent-log-usa-keyboardtester-2026-05-02.csv`, and updated `outreach-approval-summary-2026-05-02.md`. Do not resend these 29 unless a manual follow-up is approved later.
- Prepared a 50-prospect USA backlink outreach batch for KeyboardTester.click under ignored `seo-audit-2026-05-02/outreach/`. Files: `prospects-usa-50-keyboardtester-2026-05-02.csv`, `validation-usa-50-keyboardtester-2026-05-02.csv`, `drafts-usa-50-keyboardtester-2026-05-02.csv`, and `outreach-approval-summary-2026-05-02.md`. Validation found 29 contacts ready for user-approved sending and 21 contacts on hold because the exact email was not confirmed on public pages or needs replacement. Drafts vary target URLs across homepage, keyboard tester, keyboard ghosting, N-key rollover, online ruler, and dead-pixel pages. No outreach emails were sent.
- Created `outreach@keyboardtester.click` via cPanel UAPI over SSH for backlink/outreach work. Mailbox quota is 750 MB (host maximum). SMTP/IMAP credentials are stored only in gitignored `.env` under `OUTREACH_SMTP_*` / `OUTREACH_FROM` / `OUTREACH_REPLY_TO`; password value is not documented here. Verified SMTP 587 login and IMAP 993 login successfully. No outreach emails were sent; next step remains prospect list + manual approval before sending small batches.
- Prepared the next practical backlink execution plan at `seo-audit-2026-05-02/backlink-next-actions-2026-05-02.md`. Recommendation: pause new random GitHub PRs because 20 are already open; focus next on manual/directory submissions and editorial outreach. Priority order: AlternativeTo on 2026-05-04 after the account-age block clears, Slant retry, SaaSHub product verification/submission, and three targeted guest/resource pitches to WeTechTitans, Technical Master, and UltraBookGaming.
- Ran a practical backlink sprint focused on GitHub awesome-list opportunities. Opened two new mergeable PRs: `Bakumon/awesome-online-tools#29` adding KeyboardTester.click to the Test section, and `nafasebra/awesome-webdesign-tools#32` adding the Online Ruler to the Utils section. Used the `devicetester/awesome-online-tools` fork for the Bakumon PR because the user account already had a same-name fork from another upstream; cleaned up the unused branch from the wrong fork. Current GitHub backlink PR snapshot: 20 open, 1 merged, 5 closed/not-merged. Saved the working note at `seo-audit-2026-05-02/backlink-sprint-2026-05-02.md`.

### 2026-05-01 (Codex)
- Cleaned up the latest broken-link report: added a 301 redirect from `/keyboard-tester/` to `/tools/keyboard-tester/`, fixed the Minecraft circle related-tool link that emitted the old path, removed the missing `assets/css/tool-components.css` include from Russian DPI, added a compatibility `assets/css/tool-components.css` asset for older references, and removed crawler-hostile Tracker/MSI store source links from two live blog posts. Deployed via SFTP/paramiko and verified live: `/keyboard-tester/` now returns 301 to the canonical tool, `/assets/css/tool-components.css` returns HTTP 200, the updated source pages are HTTP 200, and the removed external URLs no longer appear in the live source pages. The DAA opt-out link returned HTTP 200 in verification and was kept because it is a compliance/helpful privacy reference.
- Completed duplicate/similar page audit across the full sitemap-rendered page set. Initial render audit checked 880 indexable URLs and found no duplicate titles, descriptions, canonicals, or exact rendered-text duplicates. One repeatable high-confidence near-duplicate pattern existed: localized `dead-pixel-test.php` pages overlapped strongly with localized `screen-test.php` pages in all 8 locales.
- Consolidated the 8 localized dead-pixel URLs into their matching localized screen-test URLs via `.htaccess` 301 redirects, PHP renderer fallback redirects, URL helper normalization, localized intent catalog removal, and sitemap generator exclusion. Regenerated and deployed `sitemap.xml`; live sitemap now has 872 URLs and no localized dead-pixel entries.
- Verification passed locally and live: PHP lint passed for changed PHP files; local duplicate audit after the fix rendered 872 URLs with 0 fetch errors, 0 duplicate title groups, 0 duplicate description groups, 0 duplicate canonical groups, 0 exact rendered-text duplicate groups, and 0 high-confidence near-duplicate pairs. Live checks confirmed all 8 retired localized dead-pixel URLs return 301 to localized `screen-test.php`, all 8 targets return HTTP 200 with one H1, and live sitemap is HTTP 200 with 872 URLs.
- Submitted the updated state to discovery systems: IndexNow live endpoint returned HTTP 200 with 858 URLs, Google Indexing API accepted the 8 retired URLs plus 8 target screen-test URLs (16 OK), and Bing WMT accepted the same 16 URL batch.
- Updated the live AI GPU blog article `blog/ai-gpu-test-webgpu-browser-ai-readiness.php` with three additional local WebP stock images, section captions, and an official Chrome Developers YouTube embed about WebAssembly/WebGPU for faster Web AI. Verified locally and live: article HTTP 200, one H1, one iframe, new image assets served as `image/webp`. Submitted the updated article URL to Bing WMT, Google Indexing API, and IndexNow. Note: the blog article and new image assets live under ignored `blog/` paths and were deployed directly via SFTP/paramiko.
- Published the English AI GPU cluster live: deployed `ai-gpu-test.php`, shared AI GPU assets/includes, regenerated `sitemap.xml`, added the new tool to IndexNow submission, and published `blog/ai-gpu-test-webgpu-browser-ai-readiness.php` with research-backed WebGPU/WebNN/browser AI readiness content and internal links to AI GPU, GPU stress, FPS, CPU stress, and memory tests. Submitted updated URLs to IndexNow and Google Indexing API. Note: `submit-indexnow.php` and the new blog article live under ignored paths; local copies were deployed directly via SFTP/paramiko.
- Built local-only English `ai-gpu-test.php` with WebGPU/WebGL2/WebNN detection, AI readiness score, WebGPU matrix benchmark, WebGL graphics FPS sanity check, SEO copy/schema/help content, and tool-list/related-tool wiring. No live deploy, sitemap regeneration, or IndexNow submission was run; user will test locally first.
- Localized the left floating site sidebar across all 9 locales. `includes/components/site-sidebar.php` now uses the existing localized tool/category data from `tool-list-data.php`, localizes sidebar UI labels/search/ARIA text, and sets RTL direction for Arabic. Deployed only this component via SFTP/paramiko. Verified live Spanish, Japanese, Arabic, and German pages render localized sidebar labels and tool names; Arabic sidebar includes `dir="rtl"`.
- DeviceTester GitHub org setup completed after user authorized GitHub CLI as `nasirazizawan009` with `repo,admin:org`. Created `devicetester/.github`, pushed org profile README, transferred `awesome-device-testing-tools` to `devicetester/awesome-device-testing-tools`, set homepage to `https://keyboardtester.click`, kept issues enabled, and verified the old `nasirazizawan009/awesome-device-testing-tools` URL 301-redirects to the new org repo.
- DeviceTester GitHub org follow-up: user created `https://github.com/devicetester` and uploaded the generated avatar. Initial CLI web auth timed out before user authorization; Codex prepared an ignored org profile README draft at `seo-audit-2026-05-01/devicetester-org-profile/profile/README.md`, then completed setup after authorization.
- Checked GitHub awesome/backlink status: `nasirazizawan009/awesome-device-testing-tools` has no open/closed PRs or issues from outside contributors. Outgoing PR status found 1 merged backlink PR (`StanForever/awesome-websites#49`, merged 2026-04-26), 18 open PRs, and 5 closed-not-merged PRs. `mathewlewallen/awesome-free-tools#62` remains open/mergeable with reviewer requested and no new maintainer comment after the user addressed feedback on 2026-04-27.
- Generated Microsoft Store PWA package using Partner Center identity values. Local archive: `microsoft-store/package/KeyboardTester-click-pwabuilder-package.zip`; upload files: `microsoft-store/package/extracted/KeyboardTester.click.msixbundle` and `microsoft-store/package/extracted/KeyboardTester.click.classic.appxbundle`. Verified package manifests contain Package ID `KeyboardTester.Click.KeyboardTester.click`, Publisher `CN=1DE207C4-E7E1-4A04-A664-AEAD22613CAE`, and PublisherDisplayName `KeyboardTester.Click`. `microsoft-store/package/` is ignored because it contains generated upload artifacts.
- Prepared local Microsoft Store PWA submission kit under `microsoft-store/`: preflight report/README, Partner Center submission checklist, ready-to-paste Store listing draft, and four 1366x768 desktop screenshots.
- Confirmed no native Windows rebuild is needed for the first Store submission: existing live PWA has reachable manifest, service worker, offline page, and 512x512 icon. Final `.msixbundle`/`.classic.appxbundle` generation is blocked only on Partner Center Product Identity values: Package ID, Publisher ID, and Publisher display name.
- Follow-up for `keyboard_tester_different_languages.php`: live Japanese flag asset was present at `flags/japanese_flag.svg`, but the browser could still show the old broken `japan_flag.svg` DOM/cache. Added cache-busting `?v=20260501` to the Japanese flag URL and re-uploaded both the page and `flags/japanese_flag.svg`. Live verification: page HTTP 200, versioned Japanese flag URL HTTP 200, old `japan_flag.svg` path absent.
- Fixed and deployed live `keyboard_tester_different_languages.php`: removed the outdated note saying only Keyboard Tester has language support, updated the page title/description/hero copy to reflect the localized tool suite, and corrected the Japanese flag path from `japan_flag.svg` to `japanese_flag.svg`.
- Verified locally and live: page returns HTTP 200, old note is absent, new localized-tool-suite note is present, and the Japanese flag path is correct. Deployed via SFTP/paramiko only.
- Ran a fresh Search Console URL Inspection API audit against the current sitemap URL set: 877 URLs inspected, 167 submitted/indexed, 701 unknown to Google, and 9 confirmed `Crawled - currently not indexed`.
- Evidence for the 9 affected URLs: all were `ALLOWED`, `INDEXING_ALLOWED`, fetch `SUCCESSFUL`, and canonicalized to themselves. Root cause was not robots/noindex/canonical/fetch; fixes targeted weak page value and inconsistent alternate signals.
- Fixed all discovered redirecting/wrong localized `hreflang` English/x-default targets for click-speed and headphone pages. `click-speed-test.php`, `headphone-test.php`, and `tools/headphone_speaker_tester.php` no longer appear as localized alternate targets; Japanese click-speed no longer points alternates at `mouse-test.php`.
- Strengthened the 7 affected localized tool pages with more specific titles/descriptions, expanded FAQ schema, and visible result-interpretation/help content: French mouse, French click-speed, French latency, French typing, German click-speed, Portuguese click-speed, German headphone.
- Strengthened `pages/category-utilities.php` with fuller utility selection content, visible FAQ, ItemList schema, FAQPage schema, and supporting CSS in `assets/css/category-pages.css`.
- Updated the ignored/static blog article `blog/what-is-keyboard-ghosting-anti-ghosting-fix-guide.php` directly because `blog/` is gitignored: shorter anti-ghosting-led title/meta/schema, May 1 modified date, quick-answer block, and a dedicated "anti-ghosting keyboard meaning" section with links to the ghosting and NKRO tests.
- Saved local audit evidence at `seo-audit-2026-05-01/crawled-not-indexed-fix-report.md` plus the API exports under `seo-audit-2026-05-01/` (ignored by git).
- Verified locally: PHP lint passed for modified tracked PHP files, local target pages returned HTTP 200, JSON-LD parsed on all 9 target pages, bad redirecting hreflang scan returned 0, and targeted `git diff --check` passed.
- Deployed live via SFTP/paramiko only. Live verification passed for all 9 target URLs: HTTP 200, updated titles/descriptions present, JSON-LD valid, and corrected alternates visible.
- Submitted the 9 affected URLs to Google Indexing API: 9 OK, 0 failed. Submitted the live IndexNow endpoint: HTTP 200 with "URLs submitted successfully".
- Note: unrelated local changes already existed in `blog/posts-data.php`, `sitemap.xml`, and untracked `scripts/submit-targeted-awesome-prs.py`; they were not deployed as part of this cleanup.

### 2026-04-30 (Codex)
- Fixed and deployed live: Pac-Man/ghost contact now uses swept collision detection instead of only end-of-frame overlap. This fixes cases where a ghost visually crossed Pac-Man but no collision/eat event fired.
- Scope: `assets/js/pacman-game.js` now checks movement path distance between Pac-Man and ghosts, including tunnel wrapping; `assets/js/keyboard-cat-progress.js` now sweeps ghost movement and Pac-Man keypress jumps in the keyboard progress strip; regenerated `assets/js/keyboard-cat-progress.min.js`.
- Verified: `node --check` passed for `pacman-game.js`, `keyboard-cat-progress.js`, and `keyboard-cat-progress.min.js`; local `pacman-game.php` and homepage returned HTTP 200; live JS/page verification returned HTTP 200 and confirmed the collision-fix markers are being served.
- Deployed live via SFTP/paramiko, not FTPS: GSC indexing cleanup content, English keyboard tester, shared keyboard progress/Pac-Man strip assets, all 8 localized keyboard sections, localized keyboard visual/history assets, shared head component, `tools/keyboard-tester-advanced.php`, and the standalone `pacman-game.php` page/assets.
- Verified live: `pacman-game.php`, `assets/js/pacman-game.js`, `assets/css/pacman-game.css`, `assets/js/keyboard-cat-progress.min.js`, `includes/components/keyboard-cat-progress.php`, `assets/js/localized-keyboard-history.js`, Japanese localized keyboard page, homepage keyboard page, and `keyboard-ghosting-test.php` all returned HTTP 200 and contained the expected deployed markers.
- Submitted the updated URL set through the live IndexNow endpoint. Response was HTTP 200 with "URLs submitted successfully" for 863 URLs. Google/GSC does not accept IndexNow; this submission covers Bing, Yandex, Seznam, and Naver-compatible discovery.
- Note: attempted browser smoke via local Playwright, but the workspace does not currently have the `playwright` Node module installed. Live HTTP/content verification passed.
- Done locally only: Improved the standalone Pac-Man game screen behavior. Added a `Fullscreen` control, fullscreen-specific board layout CSS, and automatic vertical viewport follow so the page scrolls down/up to keep Pac-Man visible while playing on shorter screens.
- Verified locally only: `C:\xampp\php\php.exe -l pacman-game.php` and `node --check assets/js/pacman-game.js` passed. Chrome headless tests with short desktop/mobile viewports confirmed auto-scroll activates while playing, fullscreen enters with the game stage filling the viewport, fullscreen exit resets the button label, no horizontal overflow, no console errors, and no failed HTTP responses. No live deploy was run.
- Done locally only: Fixed the standalone `pacman-game.php` movement bug where Pac-Man could feel stuck after the first dot. Root cause was tile-center movement logic: the first pass depended on a loose center threshold and rounded the next tile target too early, causing repeated snap-back near a tile center.
- Done locally only: Reworked `assets/js/pacman-game.js` movement to use direction-aware tile-center crossing (`floor`/`ceil` by direction), exact center snapping, tunnel-safe X normalization, and leftover frame movement so turns and forward movement are smoother. Also set the game board to its native 672px canvas width in `assets/css/pacman-game.css` to avoid non-integer desktop scaling jitter.
- Verified locally only: `node --check assets/js/pacman-game.js`, `C:\xampp\php\php.exe -l pacman-game.php`, and Chrome headless desktop/mobile tests passed. Movement test confirmed score/dot counts keep updating through Left -> Up -> Right -> Down -> Right turns (`00050` to `00190`, dots `220` to `206`), no overlay lock, no horizontal overflow, no console errors, and no failed HTTP responses. No live deploy was run.
- Done locally only: Added `pacman-game.php` plus `assets/css/pacman-game.css` and `assets/js/pacman-game.js` as a full playable retro maze chomp game with pellets, power pellets, chase/scatter ghost behavior, frightened/eaten ghost states, fruit bonus, scoring, high score, lives, levels, pause/reset, sound toggle, palette toggle, speed toggle, keyboard controls, swipe controls, and mobile touch buttons.
- Done locally only: Added a `Full game` link to the existing keyboard Pac-Man progress strip so users can open the standalone game page from the keyboard tester.
- Done locally only: Updated `includes/head-common.php` so local service-worker registration uses the configured base URL (`/kbt/sw.js` locally, `/sw.js` live) and added a page-level AdSense opt-out used by the local noindex game page for clean gameplay/browser validation. No live deploy was run.
- Verified locally only: `pacman-game.php`, `includes/head-common.php`, and `includes/components/keyboard-cat-progress.php` passed PHP lint; `assets/js/pacman-game.js` and `assets/js/keyboard-cat-progress.js` passed `node --check`; Chrome headless tests on desktop and mobile confirmed the canvas renders, Start begins play, score/dot counts update after movement, palette/speed controls work, the mini-strip `Full game` link points to `/kbt/pacman-game.php`, there is no horizontal overflow, and there are no console errors or failed HTTP responses.
- Done locally only: Added `assets/js/localized-keyboard-history.js` and wired it into all 8 localized keyboard pages so the history textarea records the character from the selected language layout instead of relying on the browser/OS `event.key` value. This covers physical key presses and on-screen key clicks.
- Done locally only: Corrected German QWERTZ `Y`/`Z` `data-key` wiring so physical `KeyY` records/highlights `Z` and physical `KeyZ` records/highlights `Y`.
- Verified locally only: Browser tests confirmed localized history output for Arabic (`ض`, `١`), French (`A`, `é`), German (`Z`, `Y`, `ß`), Japanese (`た`, `ぬ`), Korean (`ㅂ`, shifted `ㅃ`/`ㅒ`), Portuguese (`Ç`, `Espaço`), Russian (`Й`, `Б`), and Spanish (`Ñ`, `¡`, shifted `¿`). On-screen key click tests also passed for representative localized keys in all 8 languages. No live deploy was run.
- Done locally only: Corrected localized keyboard legends to use real physical-layout characters instead of ASCII approximations: French AZERTY accents (`É`, `é`, `è`, `ç`, `à`, `ù`), German QWERTZ umlauts/`ß` (`Ä`, `Ö`, `Ü`, `ß`), Portuguese `Ç`/`Espaço`, and Korean Dubeolsik shifted Hangul legends (`ㅃ`, `ㅉ`, `ㄸ`, `ㄲ`, `ㅆ`, `ㅒ`, `ㅖ`).
- Verified locally only: Confirmed exact Unicode legends are present in the source files, all 8 localized keyboard pages return HTTP 200 and include the shared visual CSS, changed pages have no rendered horizontal/text overflow, and `C:\xampp\php\php.exe -l` passed for all 8 localized `languages/*/sections/tool.php` files. No live deploy was run.
- Done locally only: Filled the Japanese JIS empty space between Enter and right Shift by restoring a tall JIS Enter shape, narrowing it to 114px, and shifting it right with a 14px margin so it does not collide with the home-row `}` key.
- Verified locally only: Headless Chrome confirmed zero key overlaps, a normal row gap between Enter and right Shift, and exact right-edge alignment between Enter and right Shift. Reconfirmed all 8 localized keyboard pages return HTTP 200 and include the shared visual CSS. No live deploy was run.
- Verified locally only: `C:\xampp\php\php.exe -l` passed for all 8 localized `languages/*/sections/tool.php` files, and `git diff --check` passed.
- Done locally only: Corrected the follow-up Japanese JIS Enter overlap by removing the tall negative-margin Enter override in `assets/css/localized-keyboard-visual.css`; Enter remains wide for the JIS row but no longer draws over the next row.
- Verified locally only: Headless Chrome overlap check found zero Japanese Enter/key intersections after the fix. Reconfirmed all 8 localized keyboard pages return HTTP 200 and include the shared visual CSS. No live deploy was run.
- Verified locally only: `C:\xampp\php\php.exe -l` passed for all 8 localized `languages/*/sections/tool.php` files, and `git diff --check` passed.
- Done locally only: Fixed the Japanese JIS keyboard layout in `assets/css/localized-keyboard-visual.css` so the shared localized visual theme preserves JIS-specific Enter, right Shift, and Space widths instead of collapsing them to the standard key size.
- Verified locally only: Headless Chrome layout metrics confirmed Japanese number, Q, Shift, and bottom rows now share the same right edge after scaling; a screenshot pass confirmed the tall JIS Enter key renders correctly. Reconfirmed all 8 localized keyboard pages return HTTP 200 and include the shared visual CSS. No live deploy was run.
- Verified locally only: `C:\xampp\php\php.exe -l` passed for all 8 localized `languages/*/sections/tool.php` files, and `git diff --check` passed.
- Done locally only: Updated the shared Pac-Man keyboard progress game so repeated presses of the same key advance Pac-Man. The component now uses total press count for movement, loops back to the start after one full keyboard-length run, clears dots/pellets for the new cycle, and keeps the cumulative score increasing.
- Verified locally only: `node --check` passed for `assets/js/keyboard-cat-progress.js` and `.min.js`; PHP lint passed for English plus all 8 localized keyboard sections; headless Chrome confirmed repeated `KeyA` presses move Pac-Man from 1% to 5%, reach 100% at 103 English presses, then restart at 1% on press 104, with Spanish repeated presses also advancing. No live deploy was run.
- Done locally only: Synced the 8 localized desktop keyboard sections (`languages/*/sections/tool.php`) to the current English dark-key/light-deck visual format by adding shared `assets/css/localized-keyboard-visual.css` and loading it after each language section's inline keyboard CSS.
- Verified locally only: XAMPP routes for all 8 language pages return HTTP 200 and include the new CSS; `C:\xampp\php\php.exe -l` passed for all 8 localized `sections/tool.php` files; headless Chrome checks confirmed all localized keyboards use the English dimensions (`60px` keys, `36px` layout gap, corrected function-row gap, light deck background) and active key colors still render. No live deploy was run.
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
- Done: Follow-up local visual pass replaced the remaining CSS horse silhouette with a compact CSS T-Rex and simplified the progress trail further toward the Chrome offline-game look: plain ground line, sparse dashes, cactus/grass/rock checkpoints, and no cloud decoration.
- Verified locally only: PHP lint, JS syntax check, regenerated `keyboard-cat-progress.min.js`, desktop/mobile Playwright checks, and no horizontal overflow. No live deploy was run.
- Done: Follow-up local visual pass used the user's supplied Chrome Dino screenshot as the dinosaur sprite source (`images/keyboard/chrome-dino-runner.png`) and removed all tree/grass/rock/flag objects from the progress strip. The strip is now black with a pixel ground line, score text, cactus obstacles, and pterodactyl-style obstacles only.
- Verified locally only: PHP lint, JS syntax check, regenerated `keyboard-cat-progress.min.js`, desktop Playwright render check, sprite image loaded, no grass/tree/rock/flag selectors in the active progress component/CSS/JS, no horizontal overflow. No live deploy was run.
- Done: Replaced the rough CSS-drawn Chrome Dino progress objects with real image sprites. Cropped orange dino, cactus, and blue cloud sprites from the user's supplied screenshots into `images/keyboard/dino-game/`; used a clean pterodactyl frame from an open Chrome-dino sprite sheet; removed obsolete `images/keyboard/chrome-dino-runner.png`.
- Verified locally only: PHP lint, JS syntax check, regenerated `keyboard-cat-progress.min.css`, desktop/mobile Playwright checks confirmed the sprite images load, old CSS shape selectors are gone, no failed image requests, and no horizontal overflow. No live deploy was run.
- Done: Replaced the whole rejected Chrome Dino progress concept with a local-only Pac-Man-style arcade maze: yellow chomper, maze rails, score label, dots, power pellets, and colored ghosts. Removed the now-unused `images/keyboard/dino-game/` sprite assets.
- Verified locally only: PHP lint, JS syntax check, regenerated `keyboard-cat-progress.min.css` and `keyboard-cat-progress.min.js`, and desktop/mobile Playwright checks confirmed the chomper, ghosts, pellets, score label, and no old Dino selectors render without horizontal overflow. No live deploy was run.
- Done: Improved the local Pac-Man progress visual with a cleaner yellow chomper, continuous mouth animation, and a progress-driven `--maze-eaten` lane so dots disappear behind the chomper as keys are tested.
- Verified locally only: PHP lint, JS syntax check, regenerated minified CSS/JS, no old Dino selectors in active progress assets, and desktop/mobile Playwright checks confirmed continuous mouth animation, dot clearing, score/dot count updates, and no horizontal overflow. No live deploy was run.
- Done: Added local-only moving arcade enemies to the Pac-Man progress strip. Three colored ghosts now continuously travel right-to-left, their pupils look toward the movement direction, Pac-Man starts clear of the mobile floating menu, and the mouth animation was slowed to feel less frantic.
- Verified locally only: PHP lint, JS syntax check, regenerated minified CSS/JS, desktop Playwright check confirmed enemies animate, pupils animate, Pac-Man stays between the maze rails, dots still clear with progress, and desktop/mobile checks showed no horizontal overflow. No live deploy was run.
- Done: Upgraded the local-only Pac-Man strip from CSS-only enemy drift to JS-controlled dynamic ghosts. Static checkpoint ghosts were removed; moving ghosts now randomly reverse between left/right movement, wrap from one side to the other, update pupil direction by movement direction, get eaten on Pac-Man collision, and respawn by falling back from above.
- Verified locally only: PHP lint, JS syntax check, regenerated minified CSS/JS, desktop Playwright check confirmed 0 static ghosts, 3 dynamic ghosts, direction changes, collision `is-eaten`, respawn `is-respawning` from negative top to lane top, dot progress unchanged, and desktop/mobile no horizontal overflow. No live deploy was run.

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
| Outreach mailbox SMTP | `.env` → `OUTREACH_SMTP_*`, `OUTREACH_FROM`, `OUTREACH_REPLY_TO` | SMTP/IMAP mailbox credentials for `outreach@keyboardtester.click` | Created via cPanel UAPI; use only for approved low-volume outreach |
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
