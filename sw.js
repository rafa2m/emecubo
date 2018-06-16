const staticAssets = [

    '/',
    './css/styles.css',
    './js/app.js',
    './fallback.json',
    './manifest.json',
    './index.php',
    './images/dobuss.jpg'

];

self.addEventListener('install', async function(event) {
    // aqui se cachean pero aún no están disponibles
    const cache = await caches.open('news-static');
    cache.addAll(staticAssets);
    console.log('Service Worker installing.');
    
});

self.addEventListener('activate', async function(event) {
    console.log('Service Worker activating.');
});


self.addEventListener('fetch', function(event) {
    event.respondWith(
        // Try the cache
        caches.match(event.request).then(function(response) {
            if (response) {
                return response;
            }
            return fetch(event.request).then(function(response) {
                if (response.status === 404) {
                    return caches.match('/404.html');
                }
                return response
            });
        }).catch(function() {
    
            return caches.match('/offline.html');
        })
    );
});
self.addEventListener('fetch', event => {
    
    const req = event.request;
    const url = new URL(req.url);
    if (url.origin === location.origin) {
        event.respondWith(cacheFirst(req));
    } else {
        event.respondWith(networkFirst(req));
    }

}, { mode: 'cors' });

async function cacheFirst(req) {
    const cachedResponse = await caches.match(req)
    return cachedResponse || fetch(req);
}
async function networkFirst(req) {
    const cache = await caches.open('news-dynamic');
    try {
        const res = await fetch(req);
        cache.put(req, res.clone());
        return res;
    } catch (error) {
        const cachedResponse = await cache.match(req);
        return cachedResponse || caches.match('./fallback.json');
    }

}

// importamos las librerias necesarias
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-messaging.js');

// validamos la sesion e inicializamos la conexion
var config = {
    apiKey: "AIzaSyCHG9ERhArWsRxniRteeXE2WIw-n6twRK4",
    authDomain: "fluted-sentry-141618.firebaseapp.com",
    databaseURL: "https://fluted-sentry-141618.firebaseio.com",
    projectId: "fluted-sentry-141618",
    storageBucket: "",
    messagingSenderId: "707587662647"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();

// preparamos el mensaje que si está en background se ejecutará
// pasamos la información que
messaging.setBackgroundMessageHandler(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // customizar la notificaciones de background
    const notificationTitle = payload.data.title;
    const notificationOptions = {
        body: payload.data.body,
        icon: payload.data.icon, //'./notificacionesFirebase/img/icon180.png',//payload.data.icon,
        image: payload.data.image, //'https://pwa.desarrollando-web.es/notificacionesFirebase/img/imgBackground.png'//payload.data.image,
        click_action: payload.data.click_action

    };

    return self.registration.showNotification(notificationTitle, notificationOptions);
});

