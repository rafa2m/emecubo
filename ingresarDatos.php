
<?php
    include 'head.php';
?>
</head>
<body>
<?php
    include "menu.php";
?>

<div class="container">

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
                                <strong>¡Oopsss...!</strong> La conexión falló.
                            </div>';
                            exit();
                            
                        }else {
                            echo ' 
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>¡Enhorabuena!</strong> Todo ha ido genial.
                            </div>';
                            
                        }
                ?>
                </p>
                <h1 class="mt-4 ">Insercción medidas de Sensores </h1>
                <p>
                    <a href="#" onClick="window.open('http://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores','popup', 'width=400px,height=400px')">
                        Ver de cada instalación m<sup>3</sup> una lista de sensores en cada una
                    </a> o selecciona manualmente la configuración de la medida a registrar :
                </p>
                <form action="carga.php" method="GET">
                    <div class="form-group">
                        <label for="fecha_medida" >Fecha que se toma para la medida</label>
                        <?php 
                        //Establecer la información local en castellano de España
                            setlocale(LC_TIME,"es_ES");
                        // echo strftime("Hoy es %A y son las %H:%M");
                        ?>
                        <input type="text" name="fecha_medida" value="<?php echo strftime(" %d de %b de %Y y son las %H:%M"); ?>" class="form-control" disabled />
                        <small id="emailHelp" class="form-text text-muted text-center">Es la hora actual del sistema que guardamos en BBDD</small>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <label for="id" >ID estación </label>
                        <?php 
                            
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
                            
                        </div>
                            
                        </div>
                        <div class="col-md-4">
                        
                            <div class="form-group">
                                <label for="fechaconfigsensor" >Fecha configuración sensor</label>
                                <?php //Imprimimos los sensores que hay
                                    $consulta = "SELECT fechaconfigsensor FROM tipomedidasensor";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    echo "<select id='fechaconfigsensor' name='fechaconfigsensor' class='form-control'>";
                                        while ($lista = mysqli_fetch_array($resultado)) {
                                            echo "<option>" . $lista["fechaconfigsensor"] . "</option>";
                                        }
                                    echo "</select>";
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="idsensor" >ID sensor</label>
                                <?php //Imprimimos los sensores que hay
                                    $consulta = "SELECT idsensor FROM tipomedidasensor";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    echo "<select id='idsensor' name='idsensor' class='form-control'>";
                                        while ($lista = mysqli_fetch_array($resultado)) {
                                            echo "<option>" . $lista["idsensor"] . "</option>";
                                        }
                                    echo "</select>";
                                ?>
                                
                                
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
                                
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marcasensor" >Marca sensor</label>
                                <?php //Imprimimos los sensores que hay
                                    $consulta = "SELECT DISTINCT  marcasensor FROM tipomedidasensor";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    echo "<select id='fechaconfigsensor' name='marcasensor'  class='form-control'>";
                                        while ($lista = mysqli_fetch_array($resultado)) {
                                            echo "<option>" . $lista["marcasensor"] . "</option>";
                                        }
                                    echo "</select>";
                                ?>
                                
                                
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



</body>
</html>