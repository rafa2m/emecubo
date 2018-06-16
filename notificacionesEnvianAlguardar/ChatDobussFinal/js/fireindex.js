  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBNhe8Q8Kw2nE-sCkTossGpfG_U1fv79K0",
    authDomain: "dobchat-4256f.firebaseapp.com",
    databaseURL: "https://dobchat-4256f.firebaseio.com",
    projectId: "dobchat-4256f",
    storageBucket: "dobchat-4256f.appspot.com",
    messagingSenderId: "341278776635"
  };
  firebase.initializeApp(config);


function login(){
  var userEmail = document.getElementById("email_field").value;
  var userPass = document.getElementById("password_field").value;

  firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
  .then(function() {
    return firebase.auth().signInWithEmailAndPassword(userEmail, userPass);
  })
  .catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    window.alert("Error !!!!!!!!!!!: " + errorMessage);
  });

  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      var user = firebase.auth().currentUser;
      if(user != null){
       document.getElementById("mostrarContenido").style.display="block";
       document.getElementById("capaLogin").style.display="none";
        document.getElementById("estamosDentro").style.display="none";
        document.getElementById("estamosDentro").style.display="block";
       document.getElementById("estamosDentro").innerHTML="<p class='text-center h4 alert alert-success alert-dismissable text-center'>Hola "+userEmail+"</p>";

      }
    }
  });
}

function logout(){
  firebase.auth().signOut();
    firebase.auth().onAuthStateChanged(function(user) {
      if (!user) {
         location.href ="https://pwa.desarrollando-web.es/ChatDobussFinal/cerrarSes.php";
        }
      });
}

function getLogState(){
  firebase.auth().onAuthStateChanged(function(user) {
    var name;
    if (user) {
      var user = firebase.auth().currentUser;
      if(user != null){
      name=user.displayName;
      window.alert(name);
      }
    }
  });
}

function mostrarTabla(){
  console.log("estamos en tabla");
  var chatUl=document.getElementById("id123");
  var idAux;
  var nomAux;

  firebase.app().database().ref("usuarios").on('value',(function (snap) {
    console.log("estamos en base de datos");
    var html="";

    snap.forEach(function(e){
      var referencia=e.key;
      var referenciaValor=e.val();
      var nombre3;
      firebase.database().ref("usuarios").child(referencia).on('value',function(o){
        o.forEach(function(y){
          var element=y.val();
          var id3=element.id;
          nombre3=element.name;
          var fecha=element.date;

        });
      });
      html+=abrir(referencia);

    });
    chatUl.innerHTML=html;
  }));
}

var ruta
var a;
function abrir(referencia){
  return html='<a href="#" onclick="chatAdmin(\''+referencia+'\')"><p>'+referencia+'</p></a>';
}
var refActual;
function chatAdmin(referencia){
  refActual=referencia;
  // $("#contenedorUnique").show("fast");
  document.getElementById("contenedorUnique").style.display="block";

  var chatUl=document.getElementById("chatUl");
  var nomAdm=document.getElementById("nombre").value;
//------------identificacion

//-------------pintamos datos en html

  firebase.database().ref("usuarios").child(referencia).on('value',function(snapshot){
    var html="";
    console.log("hola2?"+referencia);
    snapshot.forEach(function(e){
      var element=e.val();
      var nombre=element.name;
      var mensaje=element.message;

      html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";

    });

    chatUl.innerHTML=html;
  });

// //-------------enviamos mensajes del admin
//   var txtNombre=document.getElementById("nombre");
//   var txtMensaje=document.getElementById("mensaje");
//   var btnEnviar=document.getElementById("btnEnviar");
//
//   // btnEnviar.addEventListener("click", function(){
//     var nombre=txtNombre.value;
//     var mensaje=txtMensaje.value;
//     // firebase.database().ref("usuarios").child(referencia).push({
//     //   name: nombre,
//     //   message: mensaje
//     //
//     // });
//
//   // });
//   $("#btnEnviar").on("click",function(){
//     escribirDatos(nombre,mensaje,referencia);
//
//   });
}
$("#btnEnviar").on("click", function(){
  referencia=refActual;
  var txtNombre=document.getElementById("nombre");
  var txtMensaje=document.getElementById("mensaje");
  var btnEnviar=document.getElementById("btnEnviar");

  var nombre=txtNombre.value;
  var mensaje=txtMensaje.value;
  firebase.database().ref("usuarios").child(referencia).push({
    name: nombre,
    message: mensaje

  });

});
