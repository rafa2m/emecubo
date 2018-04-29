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
        <a href="#" onClick="window.open('http://emecubo.extremepromotionsproject.xyz/API/sensor/lista','popup', 'width=400px,height=400px')">
            Pulsar para ver un popup con la lista de sensores 
        </a> o selecciona uno del desplegable siguiente:
    </p>
    <?php
        /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
        $consulta = "SELECT id FROM sensor";
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
    <script>
    //recogemos el valor del option y cambiamos la url del navegador con el mismo valor
    var select = document.getElementById('sensores');
        select.addEventListener('change',
            function(){
            var selectedOption = this.options[select.selectedIndex];
            console.log(selectedOption.value + ': ' + selectedOption.text);
        });
    </script>
    </div>
</div>
</div>
</div>
</body>
</html>