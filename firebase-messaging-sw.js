
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
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // customizar la notificaciones de background
  const notificationTitle = payload.data.title;
  const notificationOptions={
    body : payload.data.body,
    icon : payload.data.icon,//'./notificacionesFirebase/img/icon180.png',//payload.data.icon,
    image : payload.data.image,//'https://pwa.desarrollando-web.es/notificacionesFirebase/img/imgBackground.png'//payload.data.image,
    click_action : payload.data.click_action

    };

  return self.registration.showNotification(notificationTitle,notificationOptions);
});
