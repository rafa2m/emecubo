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


// ---------soloUserChat
function anonymLogin(){
  firebase.auth().signInAnonymously().then(function(){
  }).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
});
onAuState();
}

function onAuState(){

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    var isAnonymous = user.isAnonymous;
    localStorage.setItem('uidAnon',user.uid);
    // var uid = user.uid;
    // alert(isAnonymous+" "+localStorage.getItem('uidAnon'))
    $("#containerLog").hide("fast");
    $("#containerChat").show("fast");
    // ...
  } else {
    $("#containerChat").hide("fast");
    $("#containerLog").show("fast");
    // User is signed out.
    // ...
  }
  // ...
});
}


function chatuser(){
var txtNombre=document.getElementById("nombre");
var txtMensaje=document.getElementById("mensaje");
var txtClientId=document.getElementById("clientId");
// var btnEnviar=document.getElementById("btnEnviar");
var chatUl=document.getElementById("chatUl");
var miRef=document.getElementById("IdTime").value;
var nombre=document.getElementById("nombre").value;
var fechaf=document.getElementById("fecha");

var refFinal;
var trp=true;
if(trp){
  refFinal=nombre+"chat"+miRef;
  trp=false;
}

if(nombre!=""){
  // $("#btnEnviar").on("click", function(){
    var nombre=txtNombre.value;
    var mensaje=txtMensaje.value;
    var idcl=txtClientId.value;
    var fecha=fechaf.value;
    var userIdStorage=localStorage.getItem('uidAnon');
    firebase.database().ref("usuarios").child(userIdStorage).push({
      name: nombre,
      message: mensaje,
      id: idcl,
      date: fecha
    });

  // });
}
// imprimirChat();
mostrarChat();


}

function mostrarChat(){

// var userChild=localStorage.getItem('uidAnon');
firebase.database().ref("usuarios").child(localStorage.getItem('uidAnon')).on('value',function(snapshot){
  var html="";
  snapshot.forEach(function(e){
    var element=e.val();
    var nombre=element.name;
    var mensaje=element.message;
    // alert(nombreUsr+" "+nombre);
    // if(nombreUsr==nombre){
    //   html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";
    // }
    // else if (nombre==nm) {
    //   html+="<ul><li><b>"+nombre+": </b>"+mensaje+"</li></ul>";
    // }
    html+="<li>"+nombre+" : "+mensaje+"</li>";

  });
  chatUl.innerHTML=html;
});
}
