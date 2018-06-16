<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php  echo $_REQUEST['referencia'];?></title>
    <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="style.css">


    <title>AdminChat</title>

    <!-- App css -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script> -->

  </head>
  <body>
    <input type="hidden" id="nom" value="<?= $_REQUEST['referencia']?>">

    <div id="contenedorUnique">


      <div id="chatUl">

      </div>
      <div id="chatAdmin">
        <form class="" action="" method="post">
          <div class="">
            <input type="hidden" id="nombre" value="admin">
            <input id="clientId" name="Id" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">

          </div>
          <div class="">
            <label for="mensaje">Mensaje</label>
            <br>
            <textarea  id="mensaje" rows="3" cols="30"></textarea>
          </div>
          <button type="button" id ="btnEnviar">Enviar</button>
        </form>
      </div>
    </div>
    <script>
      // Initialize Firebase
      // var nom=<?= $_REQUEST['nombre']?>;
      // var id=<?php $_REQUEST['id']?>;
      var chatUl=document.getElementById("chatUl");
      var nomComp=document.getElementById("nom").value;
      var nomAdm=document.getElementById("nombre").value;
//------------identificacion
      var config = {
        apiKey: "AIzaSyBNhe8Q8Kw2nE-sCkTossGpfG_U1fv79K0",
        authDomain: "dobchat-4256f.firebaseapp.com",
        databaseURL: "https://dobchat-4256f.firebaseio.com",
        projectId: "dobchat-4256f",
        storageBucket: "dobchat-4256f.appspot.com",
        messagingSenderId: "341278776635"
      };
      firebase.initializeApp(config);

      firebase.auth().onAuthStateChanged(function(user) {
        var name, email, photoUrl;

        if (user) {
          var user = firebase.auth().currentUser;
          if(user != null){
            name = user.displayName;
            email = user.email;
            photoUrl = user.photoURL;

          window.alert(name+email+photoUrl);
          }
        }
      });

//-------------pintamos datos en html

      firebase.database().ref(nomComp)
      .on('value',function(snapshot){
        var html="";
        snapshot.forEach(function(e){
          var element=e.val();
          var nombre=element.name;
          var mensaje=element.message;
          var nm="admin"+nomComp;
          // if(nomComp==nombre){
          //
          //   html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";
          // }else if (nombre==nm) {
          //   html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";
          //
          // }
          html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";

        //   if(nomAdm.includes(nombre)){
        //    html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";
        //   //alert(nomAdm+" si "+nombre);
        // }
        });
        chatUl.innerHTML=html;
      });

//-------------enviamos mensajes del admin
      var txtNombre=document.getElementById("nombre");
      var txtMensaje=document.getElementById("mensaje");
      var txtClientId=document.getElementById("clientId");
      var btnEnviar=document.getElementById("btnEnviar");

      btnEnviar.addEventListener("click", function(){
        var nombre=txtNombre.value;
        var mensaje=txtMensaje.value;
        var idad=txtClientId.value;

        firebase.database().ref(nomComp).push({
          name: nombre,
          message: mensaje,
          id:idad
        });

      });

    </script>
    <!-- jQuery  -->
    <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script> -->

    <!-- App js -->
    <!-- <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script> -->

    <!-- Firebase -->
    <script src="js/fireindex.js"></script>
  </body>
</html>
