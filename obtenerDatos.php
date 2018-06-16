
<?php
    include 'head.php';
?>
</head>
<body>
<?php
    include "menu.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col ml-auto">
            <h1 class="center mt-4">Obtener datos en formato Json</h1>
            <p>
                JSON, acrónimo de JavaScript Object Notation, es un formato de texto ligero para el intercambio de datos. JSON es un subconjunto de la notación literal de objetos de JavaScript aunque hoy, debido a su amplia adopción como alternativa a XML, se considera un formato de lenguaje independiente.
            </p>
            <p>
                Una de las supuestas ventajas de JSON sobre XML como formato de intercambio de datos es que es mucho más sencillo escribir un analizador sintáctico (parser) de JSON. En JavaScript, un texto JSON se puede analizar fácilmente usando la función eval(), lo cual ha sido fundamental para que JSON haya sido aceptado por parte de la comunidad de desarrolladores AJAX, debido a la ubicuidad de JavaScript en casi cualquier navegador web.
            </p>
            <p>
                <a href="#" onClick="window.open('https://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores','popup', 'width=400px,height=400px')">
                    Ver de cada instalación una lista de sensores que tiene
                </a> o selecciona el detalle a ver de m<sup>3</sup> :
            </p>


            <?php
                include "conexion.php";

                /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
                $consulta = "SELECT nombre FROM tipomedidasensor ";
                $resultado = mysqli_query($mysqli, $consulta);

                echo "<div class='form-group'>";
                echo "<label for='tipomedidasensor' >Obtener tipomedidasensor</label>";
                //cargamos el valor y lo enviamos a la url
                echo "<select id='tipomedidasensor' name='tipomedidasensor' onchange='location = this.value ' class='form-control'>";
                echo "<option> Elija una </option>";
                while ($lista = mysqli_fetch_array($resultado)) {
                    echo "<option value='../../API/obtener/sensor/" . $lista["nombre"] . "'>" . $lista["nombre"] . "</option>";
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
                    echo "<option value='../../API/obtener/configsensor/" . $lista["id"] . "'>" . $lista["id"] . "</option>";
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
                    echo "<option value='../../API/obtener/estacion/" . $lista["id"] . "'>" . $lista["id"] . "</option>";
                }

                echo "</select>";
                echo "</div>";
            ?>
            <?php
                /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
                $consulta = "SELECT distinct email FROM reglaaviso ";
                $resultado = mysqli_query($mysqli, $consulta);

                echo "<div class='form-group'>";
                echo "<label for='reglaaviso' >Obtener regla de aviso</label>";
                //cargamos el valor y lo enviamos a la url
                echo "<select id='reglaaviso' name='reglaaviso' onchange='location = this.value ' class='form-control'>";
                echo "<option> Elija uno </option>";
                while ($lista = mysqli_fetch_array($resultado)) {
                    echo "<option value='../../API/obtener/avisos/" . $lista["email"] . "'>" . $lista["email"] . "</option>";
                }

                echo "</select>";
                echo "</div>";
            ?>

            </div>
        </div>
    </div>
</div>



</body>
</html>

