<!-- Format of Data Output
c000s000g000t086r000p000h53b10020 
It outputs 37 bytes per second, including the end CR/LF.

Data Parser:

c000：air direction, degree
s000：air speed(1 minute), 0.1 miles per hour
g000：air speed(5 minutes), 0.1 miles per hour
t086：temperature, Fahrenheit
r000：rainfall(1 hour), 0.01 inches
p000：rainfall(24 hours), 0.01 inches
h53：humidity,% (00％= 100)
b10020：atmosphere,0.1 hpa -->
<?php
include '../../head.php';
?>
<body>
<?php
include "../../menu.php";
?>

<div class="container">
<div class="row ">
    <div class="col-12 page-header">
        <h1 class="center text-center">Insercción medidas de Sensores </h1>
    </div>
</div>
<div class="row">
    
    <div class="col-md-12  md-auto">   
        <p>
        <?php

       include("conexion.php");

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
    
        <p>
            <a href="#" onClick="window.open('http://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores','popup', 'width=400px,height=400px')">
                Ver de cada instalación m<sup>3</sup> una lista de sensores en cada una
            </a> o selecciona manualmente la configuración de la medida a registrar :
        </p>
        <form action="carga.php" method="GET">
            <div class="form-group">
                <label for="fecha_medida" >Fecha toma de medida</label>
                <?php //Establecer la información local en castellano de España
                    setlocale(LC_TIME,"es_ES");
                   // echo strftime("Hoy es %A y son las %H:%M");
                ?>
                <input type="text" name="fecha_medida" value="<?php echo strftime("Hoy es %A y son las %H:%M"); ?>" class="form-control" disabled />
                <small id="emailHelp" class="form-text text-muted text-center">Es la hora actual del sistema que guarda en BBDD</small>
            </div>
            <div class="row">
                <div class="col-md-4">
                <label for="id" >ID estación </label>
                <?php 
                    
                    //if you're looking to store the current time just use MYSQL's functions.
                    // mysql_query("INSERT INTO `table` (`dateposted`) VALUES (now())");
                    //If you need to use PHP to do it, the format it Y-m-d H:i:s so try

                    
                    //mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");
                    /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
                    $consulta = "SELECT id FROM estacion";
                    $resultado = mysqli_query($mysqli, $consulta);

                    echo "<div class='form-group'>";
                        //cargamos el valor y lo enviamos a la url
                        echo "<select id='idestacion' name='idestacion' class='form-control'>";
                        while ($lista = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $lista["id"] . "'>" . $lista["id"] . "</option>";
                        }
                        
                        echo "</select>";
                    echo "</div>";
                ?>
                <small id="emailHelp" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                
    <!-- (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`)  -->
            
                    
                    <div class="form-group">
                        <label for="nombre" >Nombre</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT nombre FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='nombre' name='nombre' class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["nombre"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="emailHelp" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre" >Tipo Sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT id FROM sensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='sensores'  class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["id"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="emailHelp" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                </div>
                <div class="col-md-4">
                
                    <div class="form-group">
                        <label for="fechaconfigsensor" >Fecha configuración sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT fechaconfigsensor FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='fechaconfigsensor'  class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["fechaconfigsensor"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="fechaconfigsensor" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                    <div class="form-group">
                        <label for="idsensor" >ID sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT idsensor FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='fechaconfigsensor' name='idsensor' class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["idsensor"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="idsensor" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                    <div class="form-group">
                        <label for="idtiposensor" >Tipo sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT idtiposensor FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='idtiposensor' name='tiposensor' class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["idtiposensor"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="tiposensor" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="marcasensor" >Marca sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT marcasensor FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='fechaconfigsensor' name='marcasensor'  class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["marcasensor"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="marcasensor" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                    <div class="form-group">
                        <label for="modelosensor" >Modelo sensor</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT modelosensor FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='modelosensor' name='modelosensor' class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option >" . $lista["modelosensor"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="modelosensor" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                    <div class="form-group">
                        <label for="idestacion" >ID estación</label>
                        <?php //Imprimimos los sensores que hay
                            $consulta = "SELECT idestacion FROM tipomedidasensor";
                            $resultado = mysqli_query($mysqli, $consulta);
                            echo "<select id='fechaconfigsensor' name='fechaconfigsensor' class='form-control'>";
                                while ($lista = mysqli_fetch_array($resultado)) {
                                    echo "<option>" . $lista["idestacion"] . "</option>";
                                }
                            echo "</select>";
                        ?>
                        
                        <small id="idestacion" class="form-text text-muted text-center">Por ser clave foranea de la tabla sensor ha de existir.</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="valor" ><span class="text-bold h2">Valor</span></label>
                <input type="numeric" name="valor"  class="form-control" placeholder="ejemplo de valor: 21.00" required/>
                
            </div>
            <div class="row">
                
                <div class="col-md-12 text-right" >
                    <input type="submit" value="Guardar medida" class="btn btn-primary mb-5" >

                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>


 <!-- <select id="animales">
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
</script> -->
</body>
</html>

<!--
    http://emecubo.extremepromotionsproject.xyz/API/obtener/
uno seria el metodo load. rescata datos generados por, en este caso, generaHTML.php y lo asigna a un div (divSelDias).


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