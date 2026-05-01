# Microsoft Store Submission Checklist

## Ready

- [x] Existing PWA confirmed as the correct app base.
- [x] Live manifest checked.
- [x] Live service worker checked.
- [x] Live offline page checked.
- [x] Live 512 x 512 icon checked.
- [x] Store screenshots generated locally.
- [x] Store listing draft prepared.

## User Required

- [ ] Sign in to Microsoft Partner Center.
- [ ] Make sure the account is enrolled in the Windows Developer Program.
- [ ] Reserve product name as `KeyboardTester.click` or a fallback.
- [ ] Copy Product Identity values:
  - [ ] Package ID
  - [ ] Publisher ID
  - [ ] Publisher display name

## Codex Can Do After Identity Values Are Available

- [ ] Generate the Windows PWA package in PWABuilder.
- [ ] Check package contents.
- [ ] Confirm package files ready for upload:
  - [ ] `.msixbundle`
  - [ ] `.classic.appxbundle`
- [ ] Walk through Partner Center upload fields.
- [ ] Prepare final submission text.

## Partner Center Upload Fields

- Product name: `KeyboardTester.click`
- Pricing: Free
- Category: Utilities and tools
- Privacy policy: `https://keyboardtester.click/privacy.php`
- Support URL: `https://keyboardtester.click/about-us.php`
- Screenshots: upload PNGs from `microsoft-store/screenshots/`
- Description: use `microsoft-store/store-listing.md`

## Notes

Do not generate the final package with guessed Publisher values. Package identity mismatch is a common upload failure and wastes a submission cycle.
