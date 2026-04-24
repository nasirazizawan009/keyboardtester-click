// KeyboardTester.click — Service Worker
// Network-first for HTML (so new content is always tried first),
// stale-while-revalidate for CSS/JS/images, offline fallback page.

const VERSION = 'kbt-sw-v1';
const STATIC_CACHE = `${VERSION}-static`;
const RUNTIME_CACHE = `${VERSION}-runtime`;

const PRECACHE_URLS = [
    '/',
    '/offline.html',
    '/manifest.webmanifest',
    '/navigation.png',
    '/assets/css/global.min.css?v=2.7',
];

self.addEventListener('install', (event) => {
    event.waitUntil((async () => {
        const cache = await caches.open(STATIC_CACHE);
        try { await cache.addAll(PRECACHE_URLS); } catch (_) { /* offline fresh install */ }
        self.skipWaiting();
    })());
});

self.addEventListener('activate', (event) => {
    event.waitUntil((async () => {
        const keys = await caches.keys();
        await Promise.all(keys.filter(k => !k.startsWith(VERSION)).map(k => caches.delete(k)));
        await self.clients.claim();
    })());
});

// Skip non-GET and cross-origin beyond our site
self.addEventListener('fetch', (event) => {
    const req = event.request;
    if (req.method !== 'GET') return;

    const url = new URL(req.url);
    if (url.origin !== self.location.origin) return; // let browser handle 3rd-party

    const isHTML = req.headers.get('accept')?.includes('text/html');
    const isAsset = /\.(?:css|js|png|jpg|jpeg|svg|webp|woff2?)$/i.test(url.pathname);

    if (isHTML) {
        // Network-first for HTML
        event.respondWith((async () => {
            try {
                const resp = await fetch(req);
                const cache = await caches.open(RUNTIME_CACHE);
                cache.put(req, resp.clone());
                return resp;
            } catch (_) {
                const cache = await caches.open(RUNTIME_CACHE);
                const cached = await cache.match(req);
                if (cached) return cached;
                return await caches.match('/offline.html');
            }
        })());
        return;
    }

    if (isAsset) {
        // Stale-while-revalidate
        event.respondWith((async () => {
            const cache = await caches.open(RUNTIME_CACHE);
            const cached = await cache.match(req);
            const networkPromise = fetch(req).then((resp) => {
                if (resp && resp.status === 200) cache.put(req, resp.clone());
                return resp;
            }).catch(() => null);
            return cached || (await networkPromise) || Response.error();
        })());
    }
});
