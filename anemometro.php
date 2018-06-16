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

            <h1 class="mt-4">Anemómetro</h1>
            <p>
                El anemómetro o anemógrafo es un aparato meteorológico utilizado para medir la velocidad del viento y así ayudar en la predicción del clima. Es también uno de los instrumentos básicos en el vuelo de aeronaves más pesadas que el aire.
            </p>
            <p>
                En meteorología, se usan principalmente los anemómetros de cazoletas o de molinete, especie de diminuto molino de tres aspas con cazoletas sobre las cuales actúa la fuerza del viento; el número de vueltas puede ser leído directamente en un contador o registrado sobre una banda de papel (anemograma), en cuyo caso el aparato se denomina anemógrafo. Aunque también los hay de tipo electrónicos.
            </p>
            <p>Para medir los cambios repentinos de la velocidad del viento, especialmente en las turbulencias, se recurre al anemómetro de filamento caliente, que consiste en un hilo de platino o níquel calentado eléctricamente: la acción del viento tiene por efecto enfriarlo y hace variar así su resistencia; por consiguiente, la corriente que atraviesa el hilo es proporcional a la velocidad del viento.</p>

            
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
            <div id="anemometroChart" style="height: 250px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {

            var dataPointsAnemometro = [];

            function addData(data) {
                //volcamos los datos recogidos en la respuesta de la API, un JSON
                for (var i = 0; i < data.length; i++) {
                    dataPointsAnemometro.push({
                        year: data[i].fecha_medida,
                        value: data[i].valor
                    });
                }
                
                var grafica = new Morris.Area({
                    // ID del elemento en el que se dibuja el gráfico.
                    element: 'anemometroChart',
                    data: dataPointsAnemometro,
                    // El nombre del atributo de registro de datos que contiene valores de x.
                    xkey: 'year',
                    // Una lista de nombres de atributos de registro de datos que contienen valores y.
                    ykeys: ['value'],
                    // Etiquetas para las ykeys: se mostrarán cuando pases el cursor sobre la tabla.
                    labels: ['anemometro'],
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
                    $('#anemometroChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-09&sensor=A", addData);
                    
                }
                if(selectedOption.value=='2018-06-10'){
                    console.log("2018-06-10 entramos");
                    $('#anemometroChart').html("");
                    $.getJSON("./lib/mostrarDatosSegunFecha.php?fechaMedida=2018-06-10&sensor=A", addData);
                    
                }
                
            });

        }
</script>


</body>
</html>