<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    <link rel="manifest" href="manifest.json">
	<script src="js/jquery-3.2.1.min.js"></script>
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
            url : 'adminNotificaciones/action.php',
            method:'POST',
            //data: 'token='  + currentToken
						data: {token: currentToken, latitude: lat, longitude:lon}
        }).done(function(result){
            console.log(result);
        })
    }
    messaging.onMessage(function(payload){
        console.log("hola ");

        console.log("Message Received " , payload);
        notificactionTitle= payload.data.title;
        notificationOptions={
            body : payload.data.body,
            icon : payload.data.icon,
            image : payload.data.image,
						click_action : payload.data.click_action
        };
        var notification = new Notification(notificactionTitle,notificationOptions);
        //console.log('Message Received ' + payload);
    });


	</script>
</head>

<body>

    <!-- <h2>cURL Command to Send Push</h2>
    <p>
        <button class="js-push-button" disabled>
          Habilitar Notificaciones Push
        </button>
    </p>
    <div class="js-curl-command"></div>
    <div class="id-subscription-div"></div>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, aliquid! Veniam, qui reprehenderit fuga atque nobis, sed nemo commodi reiciendis facere et repellendus. Nemo ratione, tempora eos doloremque inventore veritatis?</p> -->

	  <script src="js/config.js"></script>
    <!-- <script src="demo.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
</body>
</html>
