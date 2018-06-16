 <!--
 ▄▄▄       ██▓     ██▓ ▄▄▄        ▄████  ▄▄▄      
▒████▄    ▓██▒    ▓██▒▒████▄     ██▒ ▀█▒▒████▄    
▒██  ▀█▄  ▒██░    ▒██▒▒██  ▀█▄  ▒██░▄▄▄░▒██  ▀█▄  
░██▄▄▄▄██ ▒██░    ░██░░██▄▄▄▄██ ░▓█  ██▓░██▄▄▄▄██ 
 ▓█   ▓██▒░██████▒░██░ ▓█   ▓██▒░▒▓███▀▒ ▓█   ▓██▒
 ▒▒   ▓▒█░░ ▒░▓  ░░▓   ▒▒   ▓▒█░ ░▒   ▒  ▒▒   ▓▒█░
  ▒   ▒▒ ░░ ░ ▒  ░ ▒ ░  ▒   ▒▒ ░  ░   ░   ▒   ▒▒ ░
  ░   ▒     ░ ░    ▒ ░  ░   ▒   ░ ░   ░   ░   ▒   
      ░  ░    ░  ░ ░        ░  ░      ░       ░  ░
                                                   
                                                   -->
                                                  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    
     <!-- añade a la homescreen paraChrome sobre Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/icons/icon-1922.png">

    <!-- añade a la homescreen para Safari sobre iOS -->
    <meta name="apple-mobile-web-app-title" content="Push Messaging and Notifications Dobuss">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon-precomposed" href="images/icons/apple-icon-precomposed.png">

    <!-- tile icono para Win10 (144x144 + titulo color) -->
    <meta name="msapplication-TileImage" content="images/icons/icon-144.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <title>EMECUBO - Microestación Meterológica Móvil </title>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyCHG9ERhArWsRxniRteeXE2WIw-n6twRK4",
	    authDomain: "fluted-sentry-141618.firebaseapp.com",
	    databaseURL: "https://fluted-sentry-141618.firebaseio.com",
	    projectId: "fluted-sentry-141618",
	    storageBucket: "fluted-sentry-141618.appspot.com",
	    messagingSenderId: "707587662647"
	  };
  firebase.initializeApp(config);

	//----localizacion
	var lat;
	var lon;
	function getLocation() {
	        if (navigator.geolocation) {
	            navigator.geolocation.getCurrentPosition(showPosition);
	            console.log("entra getLocation");
	        }
	}
	function showPosition(position) {
	        lat=position.coords.latitude;
	        lon=position.coords.longitude;
	        console.log("asignamos variables"+" lat "+lat+ "lon "+lon);
	}
	 getLocation();
	 //----localizacion


	// Retrieve Firebase Messaging object.
	const messaging = firebase.messaging();
	messaging.requestPermission()
	.then(function() {

 		 console.log('Permiso de notificación otorgado!!. '+  isTokenSentToServer());
      // TODO(developer): Retrieve an Instance ID token for use with FCM.

	    if(isTokenSentToServer()){
			console.log("el token ya se ha guardado en el servidor");

		}else {
			getRegToken();
    }
       // getRegToken();
	}).catch(function(err) {
	  console.log('Unable to get permission to notify.', err);
	});

	function getRegToken(argument){
          messaging.getToken()
			  .then(function(currentToken) {
			    if (currentToken) {
                  //updateUIForPushEnabled(currentToken);
                  saveToken(currentToken);
			      console.log(currentToken);
			      setTokenSentToServer(true);
			    } else {
			      console.log('No hay token de ID de instancia disponible. Solicitar permiso para generar uno.');
			      setTokenSentToServer(false);
			    }
			  }).catch(function(err) {
			    console.log('Ha ocurrido un erro mientras recibiamos el token. ', err);
			    //showToken('Error retrieving Instance ID token. ', err);
			    setTokenSentToServer(false);
			  });
			}
	function setTokenSentToServer(sent) {
		if(sent=="true"){
			console.log("hola");

		}
	    window.localStorage.setItem('sentToServer', sent ? 1 : 0);
    }

	function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') === '1';
    }
    function saveToken(currentToken){
        console.log('vamos a action php');
				console.log(currentToken+" latitude "+lat+" longitude "+lon);

        $.ajax({
            url : './adminNotificaciones/action.php',
            method:'POST',
            //data: 'token='  + currentToken
						data: {token: currentToken, latitude: lat, longitude:lon}
        }).done(function(result){
            console.log(result);
        })
    }
    // cuando se recibe el mensaje el contenido que se muestra
    messaging.onMessage(function(payload){
       
		 console.log("Message Received " , payload);
        notificactionTitle= payload.data.title;
        notificationOptions={
            body : payload.data.body,
            icon : payload.data.icon,
            image : payload.data.image
						
        };
        // enlace para notificacion
        var notification = new Notification(notificactionTitle,notificationOptions);
        notification.onclick = function(event) {
           event.preventDefault(); // evitar que el navegador enfoque la pestaña de Notificación
           window.open(payload.data.click_action , '_blank');
           notification.close();
       }
    });


	</script>
    <meta name="theme-color" content="#fff">
    
    <link rel="shortcut icon" href="./images/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/icons/favicon.ico" type="image/x-icon">

    <script src="./js/jquery-1.12.4.js" ></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css" >

    <link rel="stylesheet" href="./css/styles.css"> 
    <link rel="manifest" href="./manifest.json"></link>
    <script src="./js/app.js"></script>
    <script src="./js/config.js"></script>
    
<!-- dejamos el head abierto para poder incluir algún js especifico para unas páginas en concreto y ahorrar peticiones !-->