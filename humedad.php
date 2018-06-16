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

            <h1 class="mt-4">Sensor de Humedad</h1>
            <p>
                El sensor de humedad se usa siempre que sea necesario detectar la humedad del aire. El sensor de humedad se usa cada vez más en el sector de la técnica de calefacción, ventilación y climatización, así como en los procesos de producción que requieren un control de la humedad. Con frecuencia, además de medir la humedad, también es necesario medir la temperatura. 
            </p>
            <p>
                Algunos sensores de humedad ofrecen una medición combinada de temperatura y humedad integrado en el mismo sensor de humedad. Normalmente se conecta el sensor de humedad a una unidad de control separada. Esta convierte la magnitud física de la humedad del aire en una señal eléctrica normalizada, que se envía a la unidad de control. Esto permite por ejemplo activar una alarma al sobrepasar un valor límite, o activar o desactivar un ventilador. 
            </p>
            <?php
                include "conexion.php";

                /* realizamoms el select para mostrar en el select y pasarlos como parametro*/
                $consulta = "SELECT nombre FROM tipomedidasensor ";
                $resultado = mysqli_query($mysqli, $consulta);

                echo "<div class='form-group'>";
                echo "<label for='diasMedidas' ><strong>Seleccionar día deseado para ver las medidas</strong></label>";
                //cargamos el valor y lo enviamos a la url
                echo "<select id='diasMedidas' name='diasMedidas' onchange='this.value ' class='form-control'>";
                echo "<option>2018-06-09</option>";
                echo "<option>2018-06-10</option>";
                echo "</select>";
                echo "</div>";
            ?>
            <div id="humedadChart" style="height: 250px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {

            var dataPointsHumedad = [];

            function addData(data) {
                //volcamos los datos recogidos en la respuesta de la API, un JSON
                for (var i = 0; i < data.length; i++) {
                    dataPointsHumedad.push({
                        year: data[i].fecha_medida,
                        value: data[i].valor
                    });
                }
                
                var grafica = new Morris.Area({
                    // ID del elemento en el que se dibuja el gráfico.
                    element: 'humedadChart',
                    data: dataPointsHumedad,
                    // El nombre del atributo de registro de datos que contiene valores de x.
                    xkey: 'year',
                    // Una lista de nombres de atributos de registro de datos que contienen valores y.
                    ykeys: ['value'],
                    // Etiquetas para las ykeys: se mostrarán cuando pases el cursor sobre la tabla.
                    labels: ['humedad'],
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
                    $('#humedadChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-09&sensor=H", addData);
                    
                }
                if(selectedOption.value=='2018-06-10'){
                    console.log("2018-06-10 entramos");
                    $('#humedadChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-10&sensor=H", addData);
                    
                }
                
            });

        }
</script>


</body>
</html>