<?php

include "head.php";

?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>
<body>
<?php

include "menu.php";

?>
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">

            <h1 class="mt-4">Sensor de Temperatura</h1>
            <p>Los sensores de temperatura se utilizan para eso, para medir la temperatura del entorno. Aunque todos ellos funcionan de una manera similar, hay pequeños detalles que los hacen diferentes. Precisamente esa va a ser la base para poder elegir uno u otro, esas pequeñas diferencias nos harán escoger el mejor sensor de temperatura para nuestros proyectos con Arduino o cualquier otro microcontrolador.
            <p>Sensor temperatura Arduino</p>
            <p>Las aplicaciones de este tipo de sensores son muchas, desde una simple estación meteorológica hasta un sistema de alarma capaz de detectar la presencia de un ser vivo. Voy a clasificar los diferentes sensores en tres tipos dependiendo de a quien va dirigido.</p>
            <ul class="ml-5">
                <li>Sensores para aficionados</li>
                <li>Sensores para automatizaciones</li>
                <li>Sensores con características especiales</li>
            </ul>
            <p>No hay que decir que según vamos subiendo en prestaciones y funcionalidades, el coste crece exponencialmente. Aunque hablaré de todos los tipos según su clasificación, me voy a centrar en los más usados que son los sensores para aficionados.</p>
<?php
                include "conexion.php";

                /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
                $consulta = "SELECT nombre FROM tipomedidasensor ";
                $resultado = mysqli_query($mysqli, $consulta);

                echo "<div class='form-group'>";
                echo "<label for='diasMedidas'><strong>Seleccionar día deseado para ver las medidas</strong></label>";
                //cargamos el valor y lo enviamos a la url
                echo "<select id='diasMedidas' name='diasMedidas' onchange='this.value ' class='form-control'>";
                echo "<option>2018-06-09</option>";
                echo "<option>2018-06-10</option>";
                echo "</select>";
                echo "</div>";
            ?>
            <div id="temperaturaChart" style="height: 250px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {

            var dataPointsTemperatura = [];

            function addData(data) {
                //volcamos los datos recogidos en la respuesta de la API, un JSON
                for (var i = 0; i < data.length; i++) {
                    dataPointsTemperatura.push({
                        year: data[i].fecha_medida,
                        value: data[i].valor
                    });
                }
                
                var grafica = new Morris.Area({
                    // ID del elemento en el que se dibuja el gráfico.
                    element: 'temperaturaChart',
                    data: dataPointsTemperatura,
                    // El nombre del atributo de registro de datos que contiene valores de x.
                    xkey: 'year',
                    // Una lista de nombres de atributos de registro de datos que contienen valores y.
                    ykeys: ['value'],
                    // Etiquetas para las ykeys: se mostrarán cuando pases el cursor sobre la tabla.
                    labels: ['temperatura'],
                    resize: true,
                    fillOpacity: 0.6,
                    hideHover: 'auto',
                    behaveLikeLine: true,
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors: ['black'],
                    lineColors: ['red', 'gray']
                });

            }
            var select = document.getElementById('diasMedidas');
            select.addEventListener('change',
            function(){
                var selectedOption = this.options[select.selectedIndex];
                //console.log(selectedOption.value + ': ' + selectedOption.text);
                if(selectedOption.value=='2018-06-09'){
                    console.log("2018-06-09 entramos");
                    $('#temperaturaChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-09&sensor=T", addData);
                    
                }
                if(selectedOption.value=='2018-06-10'){
                    console.log("2018-06-10 entramos");
                    $('#temperaturaChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-10&sensor=T", addData);
                    
                }
                
            });

        }
</script>

</body>
</html>