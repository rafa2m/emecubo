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
         
        $.ajax({
            url : 'action.php',
            method:'POST',
            data: 'token='  + currentToken
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
            image : payload.data.image
        };
        var notification = new Notification(notificactionTitle,notificationOptions);
        //console.log('Message Received ' + payload);
    });

    
	</script>
</head>

<body>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, aliquid! Veniam, qui reprehenderit fuga atque nobis, sed nemo commodi reiciendis facere et repellendus. Nemo ratione, tempora eos doloremque inventore veritatis?</p>
</body>
</html>