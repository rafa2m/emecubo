<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Operaciones con sensores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>
<div class="container">
<div class="row ">
    <div class="col-12 page-header">

        <h1 class="center">Prueba de redirección Sensores </h1>
    </div>
</div>
<div class="row">
<div class="col-md-4 .ml-auto">   
    <p>
    <?php

    $username = "dbo732013555";
    $password = "Pa56word";
    $hostname = "db732013555.db.1and1.com";
    $dbname = "db732013555";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);
    $mysqli->set_charset("utf8");

    /* comprobamos la conexión */
    if ($mysqli->connect_errno) {
        echo '
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Oopsss...!</strong> La conexión no falló.
        </div>';
        exit();
        //<div class='alert alert-success'>conexion ko</div>";
    }else {
         echo '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Enhorabuena!</strong> Todo ha ido genial.
        </div>';
        //<div class='alert alert-success'>conexion ok</div>";
    }
    ?>
    </p>
</div>
<div class="col-md-6 .md-auto">
    <p>
        <a href="#" onClick="window.open('http://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores','popup', 'width=400px,height=400px')">
            Ver de cada instalación una lista de sensores en cada 
        </a> o selecciona elige una estacion m3 a ver:
    </p>
    <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT id FROM estacion";
        $resultado = mysqli_query($mysqli, $consulta);

        echo "<div class='form-group'>";
            //cargamos el valor y lo enviamos a la url
            echo "<select id='sensores' onchange='location = this.value ' class='form-control'>";
            while ($lista = mysqli_fetch_array($resultado)) {
                echo "<option>" . $lista["id"] . "</option>";
            }
            
            echo "</select>";
        echo "</div>";
    ?>
    
    </div>
</div>
</div>
</div>


 <select id="animales">
  <option value="1" data-type="perro">Caniche</option>
  <option value="2" data-type="gato">Siamés</option>
  <option value="3" data-type="gato">Persa</option>
  <option value="3" data-type="perro">Pastor alemán</option>
</select>
<select id="fruta">
 <option value="1" data-type="perro">Caniche</option>
</select>
<script>

$(function(){
    $('#animales').change(function(){
        
       var seleccionado = $(this).find('option:selected');
       
       // 'type' es lo que va a continuación del guión en data-type
       var animal = seleccionado.data('type');
       
       console.log(animal);
       if(animal=='perro'){
           //alert("adsf");
           console.log("perro");
           $('#fruta').html( "<option>All new content. <em>You bet!</em></option>" );

       }else {
           console.log("gato");
           $('#fruta').html( "<option>-------------</option>" );
       }
       
    });
});
var animales = document.getElementById('animales');
var seleccionado = animales.options[animales.selectedIndex];
var animal = seleccionado.getAttribute('data-type');
</script>
</body>
</html>

<!--
    http://emecubo.extremepromotionsproject.xyz/API/obtener/
uno seria el metodo load. rescata datos generados por, en este caso, generaHTML.php y lo asigna a un div (divSelDias).

Código javascript:
Ver original
<script type="text/javascript">
 $(document).ready(function(){ //así es como se crean las funciones jQuery. solo cree
  $("#selMeses").change(function(){ //se ejecuta con el evento onChange
   var varMes = $(this).val()  //Devuelve el valor del campo, en este caso el select estatico
   $("#divSelDias").load("generaHTML.php", {paramTipo : 1, paramMes : varMes}, 
      function(responseText, textStatus, XMLHttpRequest){
      /*tu función*/
      }); 
      //paramTipo es el parametro pasado por metodo POST
  });//change
});//ready
</script>
 

que te parece.

Exito.
__________________
tutoriales xajax, jQuery, PHP y otros en mi blog

    -->