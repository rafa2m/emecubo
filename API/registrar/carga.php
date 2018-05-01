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
        <div class="row">
        
        <div class="col ml-auto">
        <?php
            include("conexion.php");
                            //(`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
            //$fecha_medida= strftime("Hoy es %A y son las %H:%M");
            $fecha_medida= date('Y-m-d h:m:s');
            $nombre= $_REQUEST ['nombre'];
            $fechaconfigsensor= date('Y-m-d h:m:s');
            $idsensor= $_REQUEST ['idsensor'];
            $tiposensor= $_REQUEST ['tiposensor'];
            $marcasensor= $_REQUEST ['marcasensor'];
            $modelosensor= $_REQUEST ['modelosensor'];
            $idestacion= $_REQUEST ['idestacion'];
            $valor= $_REQUEST ['valor'];
             echo ''.$fecha_medida.','.$nombre.', '.$fechaconfigsensor.', '.$idsensor.','.$tiposensor.', '.$marcasensor.', '.$modelosensor.', '.$idestacion.', '.$valor.'<br>';
             echo "('2018-05-01 02:05:32','sth1','2018-05-01 02:05:32','TH1',1,'AOSONG','DHT22','SCT2',20.000)";

             //echo "fecha =>".date('Y-m-d h:m:s');
            // echo "".$fecha_medida.",'".$nombre."', ".$fechaconfigsensor.", '".$idsensor."', ".$tiposensor.", '".$marcasensor."', '".$modelosensor."', '".$idestacion."', ".$valor.")";
            $consulta="INSERT INTO medidasensor values('2018-05-01 02:05:32','sth1','2018-05-01 02:05:32','TH1',1,'AOSONG','DHT22','SCT2',20.000)";
                       //"VALUES ('".$fecha_medida."','".$nombre."', '".$fechaconfigsensor."', '".$idsensor."', '".$tiposensor."', '".$marcasensor."', '".$modelosensor."', '".$idestacion."', '".$valor."')";
            // insert into medidasensor values ('2018-05-01 01:05:23','sa23','2018-04-15 00:00:00','AN1','2','ANEMO KMS','MODELO - 1','STC1','20.')
            //$consulta="INSERT INTO pruebas values('2018-05-01 02:05:32')";
            $connect = new mysqli($hostname, $username, $password, $dbname);
            $resultado=mysqli_query($connect,$consulta);
            
            if ($resultado) {
                echo "perfil almacenado. <br />";
            }
            else {
                echo "error en la ejecución de la consulta. <br />";
            }
            
            if (mysqli_close($connect)){ 
                echo "desconexion realizada. <br />";
            } 
            else {
                echo "error en la desconexión";
            }
           
            

            //$idSensor=$_GET["idSensor"];
            //echo $idSensor;
            
                //echo "<table class='table table-dark'>";
                echo "<table class='table table-striped'>";
                    
                        // SELECT column_name                  --Seleccionamos el nombre de columna
                        // FROM information_schema.columns     --Desde information_schema.columns
                        // WHERE table_schema = 'public'       --En el esquema que tenemos las tablas en este caso public
                        // AND table_name   = 'tu_tabla'       --El nombre de la tabla especifica de la que deseamos obtener información
                        
                        // TODO ¿por qué no accedo a todos los datos de esta consulta?
                        // $consulta1 = "SELECT column_name FROM information_schema.columns WHERE table_name = 'medidasensor'";
                        // $resultado1 = mysqli_query($mysqli, $consulta1);
                        // $lista1 = mysqli_fetch_array($resultado1);
                        // echo "<br>Tamaño =>> ".sizeof($lista1)."<br>";
                        // echo "<pre>";
                        // echo var_dump($lista1)."<br>";
                        // echo "</pre>";
                        
                        //for($i=0 ;$i<(sizeof($lista1));$i++) {
                                //echo $i;
                                //echo "<td>" . $lista1[$i] . "</td>";
                        //}
                        //echo "---------------------------------------------------";
                        //(`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
        
        
        
                        $consulta = "SELECT * FROM medidasensor";
                        $resultado = mysqli_query($mysqli, $consulta);
                        $lista = mysqli_fetch_array($resultado);
                        // echo "<br>Tamaño =>> ".sizeof($lista)."<br>";
                        // echo "<pre>";
                        // echo var_dump($lista)."<br>";
                        // echo "</pre>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr>";

                            echo "<th scope='col'>#</th>";
                            echo "<th scope='col'> fecha_medida</th>";
                            echo "<th scope='col'> nombre</th>";
                            echo "<th scope='col'> fechaconfigsensor</th>";
                            echo "<th scope='col'> idsensor </th>";
                            echo "<th scope='col'> tiposensor</th>";
                            echo "<th scope='col'> nomarcasensormbre </th>";
                            echo "<th scope='col'> modelosensor</th>";
                            echo "<th scope='col'> idestacion </th>";
                            echo "<th scope='col'> valor </th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $numerofilas = 1;
                        echo "<tr>";
                        echo "<th scope='row'>".$numerofilas."</th>";
                        for($i=0 ;$i<(sizeof($lista));$i++) {
                            
                                echo "<td>" . $lista[$i] . "</td>";
                        }
                        echo "</tr>";
                        echo "</tbody>";
                     
                    
                echo "</table>";

        ?>
        </div>
        
        </div>
    </div>
</body>
</html>