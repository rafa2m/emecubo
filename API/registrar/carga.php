<?php
include "./../../head.php"
?>
<body>
  <?php
    include "./../../menu.php"
    ?>  
    <div class="container">
        <div class="row">
        
        <div class="col ml-auto">
        <?php
           
            include("./../../conexion.php");
                            //(`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
            //$fecha_medida= strftime("Hoy es %A y son las %H:%M");
            $fecha_medida= date('Y-m-d h:m:s');
            $nombre= $_REQUEST ['nombre'];
            $fechaconfigsensor= $_REQUEST['fechaconfigsensor'];
            $idsensor= $_REQUEST ['idsensor'];
            $tiposensor= $_REQUEST ['tiposensor'];
            $marcasensor= $_REQUEST ['marcasensor'];
            $modelosensor= $_REQUEST ['modelosensor'];
            $idestacion= $_REQUEST ['idestacion'];
            $valor= $_REQUEST ['valor'];
             echo $fecha_medida.','.$nombre.', '.$fechaconfigsensor.', '.$idsensor.','.$tiposensor.', '.$marcasensor.', '.$modelosensor.', '.$idestacion.', '.$valor.'<br>';
             //cho "('2018-05-01 02:05:32','sth1','2018-05-01 02:05:32','TH1',1,'AOSONG','DHT22','SCT2',20.000)";

            // echo "fecha =>".date('Y-m-d h:m:s');
            // echo "".$fecha_medida.",'".$nombre."', ".$fechaconfigsensor.", '".$idsensor."', ".$tiposensor.", '".$marcasensor."', '".$modelosensor."', '".$idestacion."', ".$valor.")";
            // $consulta="INSERT INTO medidasensor values('2018-05-01 02:05:32','sth1','2018-05-01 02:05:32','TH1',1,'AOSONG','DHT22','SCT2',20.000)";
            $consulta="INSERT INTO medidasensor VALUES ('".$fecha_medida."','".$nombre."', '".$fechaconfigsensor."', '".$idsensor."', '".$tiposensor."', '".$marcasensor."', '".$modelosensor."', '".$idestacion."', '".$valor."')";
            //$consulta= "insert into medidasensor values ('2018-05-03 01:05:25','sa23','2018-04-15 00:00:00','AN1',2,'ANEMO KMS','MODELO - 1','STC1',70)";

            //$consulta="INSERT INTO pruebas values('2018-05-01 02:05:32')";
            //$connect = new mysqli($hostname, $username, $password, $dbname);
            $resultado=mysqli_query($mysqli,$consulta);

            if ($resultado) {
                echo "perfil almacenado. <br />";
            }
            else {
                echo "error en la ejecución de la consulta. <br /> =>>".$consulta;
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
        
        
        
                        $consulta = "SELECT `fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor` FROM medidasensor";
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
                        for($i=0 ;$i<(sizeof($lista)/2);$i++) {
                            
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