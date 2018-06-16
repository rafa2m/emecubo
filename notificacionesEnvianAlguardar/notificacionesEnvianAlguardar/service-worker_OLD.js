'use strict';

self.addEventListener('push', function(event) {
  //ajax puro
  // function ajax() {
  //   // De esta forma se obtiene la instancia del objeto XMLHttpRequest
  //   if(window.XMLHttpRequest) {
  //     connection = new XMLHttpRequest();
  //   }
  //   else if(window.ActiveXObject) {
  //     connection = new ActiveXObject("Microsoft.XMLHTTP");
  //   }
  //
  //   var param = "Esto es una prueba AJAX sin jQuery";
  //
  //   // Preparando la función de respuesta
  //   connection.onreadystatechange = response;
  //
  //   // Realizando la petición HTTP con método POST
  //   connection.open('POST', 'test.php');
  //   connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //   connection.send("param=" + param + "&nocache=" + Math.random());
  // }
  //
  // function response() {
  //   if(connection.readyState == 4) {
  //     alert(connection.responseText);
  //   }
  // }
  //
  // ajax();
    console.log("!!!!!!!!!!!!entramos....sw");
    //ajax recoger informacion
    // $.ajax({
    //     url:   'leerMensaje.php',
    //     method:"POST",
    //     data:
    //     {
    //     },
    //     dataType:"json",
    //     success:  function (data) {
    //         console.log("finalizado =>"+data.mensaje);
    //         console.log("finalizado =>"+data.titulo);

    //     }
    // });
    //console.log("evento de serviceworker"+event);

//     var title = 'porque';
//     var body = 'Esto no es un mensaje';
//     var icon = 'images/icons/android-icon-192x192.png';
//     var tag = 'simple-push-demo-notification-tag';
//    var image ='images/521m.jpg';
//     var badge = 'images/icons/android-icon-96x96.png';

    event.waitUntil(
        self.registration.showNotification(title, {
            body: body,
            icon: icon,
            badge: badge,
            image: image,
            //vibrate: [300, 100, 400], // Vibrate 300ms, pause 100ms, then vibrate 400ms
            tag: tag
        }).then(function(NotificationEvent) {  console.log("se ha enviado la notification")})
    );
    console.log('Received a push message', event);
});

self.addEventListener('notificationclick', function(event) {
  console.log('Click sobre la notificacion: ', event.notification.tag);
  // Android doesn’t close the notification when you click on it
  // See: http://crbug.com/463146
  event.notification.close();

  // This looks to see if the current is already open and
  // focuses if it is
  event.waitUntil(clients.matchAll({
    type: 'window'
  }).then(function(clientList) {
    for (var i = 0; i < clientList.length; i++) {
      var client = clientList[i];
      if (client.url === '/' && 'focus' in client) {
        return client.focus();
      }
    }
    if (clients.openWindow) {
      return clients.openWindow('/');
    }
  }));
});
