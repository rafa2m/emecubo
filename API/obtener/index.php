
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

        <h1 class="center">Redirecciones</h1>
    </div>
</div>
<div class="row">
<div class="col ml-auto">   
    <p class="text-center">
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
        <div class="alert alert-danger alert-dismissable text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Oopsss...!</strong> La conexión no falló.
        </div>';
        exit();
        //<div class='alert alert-success'>conexion ko</div>";
    }else {
         echo '
        <div class="alert alert-success alert-dismissable text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Enhorabuena!</strong> Todo ha ido genial.
        </div>';
        //<div class='alert alert-success'>conexion ok</div>";
    }
    ?>
    </p>

    <p>
        <a href="#" onClick="window.open('https://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores','popup', 'width=400px,height=400px')">
            Ver de cada instalación una lista de sensores que tiene 
        </a> o selecciona el detalle a ver de m<sup>3</sup> :
    </p>
    

     <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT nombre FROM tipomedidasensor ";
        $resultado = mysqli_query($mysqli, $consulta);

        echo "<div class='form-group'>";
        echo "<label for='tipomedidasensor' >Obtener tipomedidasensor</label>";
            //cargamos el valor y lo enviamos a la url
            echo "<select id='tipomedidasensor' name='tipomedidasensor' onchange='location = this.value ' class='form-control'>";
            echo "<option> Elija una </option>";
            while ($lista = mysqli_fetch_array($resultado)) {
                echo "<option value='../../API/obtener/sensor/". $lista["nombre"] ."'>" . $lista["nombre"] . "</option>";
            }
            
            echo "</select>";
        echo "</div>";
    ?>
    <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT id FROM configuracionsensor ";
        $resultado = mysqli_query($mysqli, $consulta);

        echo "<div class='form-group'>";
        echo "<label for='configuracionsensor' >Obtener configuracionsensor</label>";
            //cargamos el valor y lo enviamos a la url
            echo "<select id='configuracionsensor' name='configuracionsensor' onchange='location = this.value ' class='form-control'>";
            echo "<option> Elija uno </option>";
            while ($lista = mysqli_fetch_array($resultado)) {
                echo "<option value='../../API/obtener/configsensor/". $lista["id"] ."'>" . $lista["id"] . "</option>";
            }
            
            echo "</select>";
        echo "</div>";
    ?>
    <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT id FROM estacion order by id DESC";
        $resultado = mysqli_query($mysqli, $consulta);

        echo "<div class='form-group'>";
        echo "<label for='estaciones' >Obtener configuración estación</label>";
            //cargamos el valor y lo enviamos a la url
            echo "<select id='estaciones' name='estaciones' onchange='location = this.value ' class='form-control'>";
            echo "<option> Elija una </option>";
            while ($lista = mysqli_fetch_array($resultado)) {
                echo "<option value='../../API/obtener/estacion/". $lista["id"] ."'>" . $lista["id"] . "</option>";
            }
            
            echo "</select>";
        echo "</div>";
    ?>
    <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT email FROM reglaaviso ";
        $resultado = mysqli_query($mysqli, $consulta);

        echo "<div class='form-group'>";
        echo "<label for='reglaaviso' >Obtener regla de aviso</label>";
            //cargamos el valor y lo enviamos a la url
            echo "<select id='reglaaviso' name='reglaaviso' onchange='location = this.value ' class='form-control'>";
            echo "<option> Elija uno </option>";
            while ($lista = mysqli_fetch_array($resultado)) {
                echo "<option value='../../API/obtener/avisos/". $lista["email"] ."'>" . $lista["email"] . "</option>";
            }
            
            echo "</select>";
        echo "</div>";
    ?>
    
    </div>
</div>
</div>
</div>


<div class="container">
<div class="row">
        <div class="col">
            <h3>Gráfica ficticia</h3>
            <div id="myfirstchart" style="height: 250px;"></div>
            <div id="area-example" style="height: 250px;"></div>
            <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                //alert("asdfasdf");
                    
                    // Set another completion function for the request above
                    var url1= "https://final.extremepromotionsproject.xyz/API/obtener/sensor/sa1";
                    var datos1=jsonParseo(url1);
                    //console.log(datos1);
              });
            function jsonParseo(urlEntrada){
                   var datos=[];
                 $.ajax({
                        
                        json: "callback",
                        
                        dataType: "json",
                        url: urlEntrada,
                        crossDomain : true, 
                        //url: "https://graph.facebook.com/v2.12/Javier.Aliaga.Rodriguez?fields=feed{created_time,message,description,picture,permalink_url,full_picture,comments.limit(10)}&access_token=EAACEdEose0cBAFFhdeBQX0kCyQpRF8u5QD3Y0HZAaWs9pw4PbtQRQkyPN28iamHkFPFPDnbNUu4nH7ZCRIPqRrxcZCwCxP3cKLcyNlF8wZCJj0q5w3izW9dYyZBUOFy36OVNqYFseDZAJ3tCmdlxIEJsAJygXZBn5Gi8eB9QdIJuZCwLXCkWKLmFApmDRWp2UzwZD",
                        
                    })
                    .done(function( data, textStatus, jqXHR ) {
                            var datos = [];
                            var conta =0;
                            //console.log(data);
                            // data.forEach(element => {
                            //     var nombre = element.nombre;
                            //     var fecha_medida = element.fecha_medida;
                            //     // console.log("nombre =>" + element.nombre);
                            //     // console.log("fecha medida =>" + element.fecha_medida);
                            //     //datos[conta]={fecha_medida,nombre};
                            //     datos[conta]=element;
                            //     conta++;
                            // });
                            // console.log(datos);
                            pintarGrafica(data);
                            if ( console && console.log ) {
                                console.log( "La solicitud se ha completado correctamente." );
                            }
                    })
                    .fail(function( jqXHR, textStatus, errorThrown ) {
                            if ( console && console.log ) {
                                console.log( "La solicitud a fallado: " +  textStatus);
                            }
                    });
                    return datos;
            }
            function pintarGrafica(datos){

                    
                    var dataSensor = [];
                    
                    
                        
                    // datos.forEach(function(element,index) {
                        
                    //     var tupla = {"y": element.fecha_medida, "a":parseInt(element.valor), " b": parseInt(90)};
                    //     dataSensor.push(tupla);
                        
                        
                    // });
                   
                    var dataEjemplo = [
                        { y: '2018-05-01 15:00:00', a: 100, b: 90 },
                        { y: '2018-05-01 15:10:00', a: 75,  b: 65 },
                        { y: '2018-05-01 15:20:00', a: 50,  b: 40 },
                        { y: '2018-05-01 15:30:00', a: 75,  b: 65 },
                        { y: '2018-05-01 15:40:00', a: 50,  b: 40 },
                        { y: '2018-05-01 15:50:00', a: 75,  b: 65 },
                        { y: '2018-05-01 16:00:00', a: 100, b: 90 }
                    ];
                    Morris.Area({
                    element: 'area-example',
                    data: dataEjemplo,
                    //data: dataSensor,
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Sensor A', 'Sensor B']
                    });
                     
              
                    var grafica=new Morris.Line({
                        // ID of the element in which to draw the chart.
                        element: 'myfirstchart',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: [
                            { year: '2018-05-01 15:00:00', value: 20 },
                            { year: '2018-05-01 15:10:00', value: 10 },
                            { year: '2018-05-01 15:20:00', value: 5 },
                            { year: '2018-05-01 15:30:00', value: 28 },
                            { year: '2018-05-01 15:40:00', value: 20 }
                        ],
                        // The name of the data record attribute that contains x-values.
                        xkey: 'year',
                        // A list of names of data record attributes that contain y-values.
                        ykeys: ['value'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['temperatura']
                        });
                  }            
            </script>

        </div>
    </div>
</div>

</body>
</html>

