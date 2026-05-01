# Microsoft Store PWA Submission Kit

Generated: 2026-05-01

## Decision

Do not rebuild KeyboardTester.click as a native Windows app for the first Microsoft Store submission.

Microsoft's current PWA path supports publishing an existing PWA by reserving an app in Partner Center, packaging the live site with PWABuilder, and uploading the generated Windows packages. The site already has the core PWA pieces needed for that route:

- Live HTTPS site: `https://keyboardtester.click`
- Web app manifest: `https://keyboardtester.click/manifest.webmanifest`
- Service worker: `https://keyboardtester.click/sw.js`
- Offline page: `https://keyboardtester.click/offline.html`
- App icon: `https://keyboardtester.click/navigation.png`

## Current Preflight

| Check | Result | Evidence |
|---|---:|---|
| Manifest reachable | Pass | `manifest.webmanifest` returns HTTP 200 and parses as JSON |
| Service worker reachable | Pass | `sw.js` returns HTTP 200 as JavaScript |
| Offline fallback reachable | Pass | `offline.html` returns HTTP 200 |
| 512 icon reachable | Pass | `navigation.png` returns HTTP 200 and is 512 x 512 |
| Desktop screenshots prepared | Pass | See `microsoft-store/screenshots/` |
| Final Store package generated | Pass | Generated locally under `microsoft-store/package/` |

## Store Package

Generated package archive:

`microsoft-store/package/KeyboardTester-click-pwabuilder-package.zip`

Extracted upload files:

- `microsoft-store/package/extracted/KeyboardTester.click.msixbundle`
- `microsoft-store/package/extracted/KeyboardTester.click.classic.appxbundle`

Do not upload `KeyboardTester.click.sideload.msix` to Partner Center. That file is only for local sideload testing.

Identity verified inside both generated package manifests:

- Package ID: `KeyboardTester.Click.KeyboardTester.click`
- Publisher ID: `CN=1DE207C4-E7E1-4A04-A664-AEAD22613CAE`
- Publisher display name: `KeyboardTester.Click`

## Recommended Store Name

Primary reservation target:

`KeyboardTester.click`

Fallback reservation targets if unavailable:

- `Keyboard Tester Online`
- `KeyboardTester Tools`
- `Keyboard Tester Hardware Tools`

## Packaging Steps

1. Open Partner Center: `https://partner.microsoft.com/dashboard`
2. Go to Apps and games.
3. Create New product > MSIX or PWA app.
4. Reserve the app name.
5. Open Product management > Product Identity.
6. Copy Package ID, Publisher ID, and Publisher display name.
7. Package has already been generated through the PWABuilder Windows packaging service.
8. In Partner Center, start submission and upload:
    - `.msixbundle`
    - `.classic.appxbundle`
9. Complete pricing, age rating, store listing, screenshots, privacy policy, and final submission.

## Store Screenshots

Generated desktop screenshots are in:

`microsoft-store/screenshots/`

They are 1366 x 768 PNG files, which meets the Microsoft desktop screenshot minimum.

Suggested upload order:

1. `01-home-keyboard-tester.png`
2. `02-all-tools.png`
3. `03-language-tools.png`
4. `04-pacman-game.png`

## Official References

- Publish a PWA to Microsoft Store: `https://learn.microsoft.com/en-us/microsoft-edge/progressive-web-apps/how-to/microsoft-store`
- PWA package requirements: `https://learn.microsoft.com/en-us/windows/apps/publish/publish-your-app/pwa/app-package-requirements`
- Store listing text and screenshot requirements: `https://learn.microsoft.com/en-us/windows/apps/publish/publish-your-app/msix/add-and-edit-store-listing-info`
- Screenshots and images: `https://learn.microsoft.com/en-us/windows/apps/publish/publish-your-app/msix/screenshots-and-images`
