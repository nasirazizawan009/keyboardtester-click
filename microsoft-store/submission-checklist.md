# Microsoft Store Submission Checklist

## Ready

- [x] Existing PWA confirmed as the correct app base.
- [x] Live manifest checked.
- [x] Live service worker checked.
- [x] Live offline page checked.
- [x] Live 512 x 512 icon checked.
- [x] Store screenshots generated locally.
- [x] Store listing draft prepared.
- [x] Windows PWA package generated.
- [x] Package identity checked inside generated manifests.

## User Required In Partner Center

- [x] Product name reserved.
- [x] Product Identity values copied.
- [ ] Start app submission.
- [ ] Upload generated packages:
  - [ ] `microsoft-store/package/extracted/KeyboardTester.click.msixbundle`
  - [ ] `microsoft-store/package/extracted/KeyboardTester.click.classic.appxbundle`
- [ ] Complete pricing.
- [ ] Complete age rating.
- [ ] Complete store listing.
- [ ] Upload screenshots from `microsoft-store/screenshots/`.
- [ ] Submit for certification.

## Generated Package Files

- Upload to Partner Center: `KeyboardTester.click.msixbundle`
- Upload to Partner Center: `KeyboardTester.click.classic.appxbundle`
- Do not upload: `KeyboardTester.click.sideload.msix`

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
