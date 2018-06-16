
/* comentado pero funciona */
/*
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');

firebase.initializeApp({
  'messagingSenderId': '707587662647'
});
*/

// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-messaging.js');

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
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // customizar la notificaciones de background
  const notificationTitle = payload.data.title;
  const notificationOptions={
    body : payload.data.body,
    icon : './notificacionesFirebase/img/icon180.png',//payload.data.icon,
    image : 'https://pwa.desarrollando-web.es/notificacionesFirebase/img/imgBackground.png',//payload.data.image,
    eventTime :2000
};

  return self.registration.showNotification(notificationTitle,notificationOptions);
});
// [END background_handler]