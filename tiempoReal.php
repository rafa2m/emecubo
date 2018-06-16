
<?php

    // creamos una variable de sesion para pasar la fecha actual desde la cual queremos hacer la consulta
    session_start();
    
    $_SESSION["fechaDeEntrada"] = date("H:i:s");

    include 'head.php';

?> 

<!-- incluimos la libreria que vamos a utilizar para pintar sobre canvas en tiempo real -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
    <?php

        include 'menu.php';

    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4  ">Datos en tiempo Real</h1>
                <p>
                    A continuación se muestran los datos en tiempo real desde que se ha abierto la página, siendo la hora registrada <?php echo  $_SESSION["fechaDeEntrada"] ?>.
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
	    
	    /*********************************  HUMEDAD  ************************************************/

 
        window.onload = function () {

            var dataPointsHumedad = [];
            

            var chart = new CanvasJS.Chart("chartContainerHumedad", {
                
                zoomEnabled: true,
                
                axisY:{
                    prefix: "% ",
                    includeZero: false
                }, 
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor:"pointer",
                    verticalAlign: "top",
                    fontSize: 22,
                    fontColor: "dimGrey",
                    itemclick : toggleDataSeries
                },
                data: [{ 
                    type: "line",
                    xValueType: "dateTime",
                    yValueFormatString: "##,##%",
                    xValueFormatString: "hh:mm:ss TT",
                    showInLegend: true,
                    name: "Sensor DHTh",
                    dataPoints: dataPointsHumedad
                    } ]
            });

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            var updateInterval = 3000;
            // initial value
            var yValue1 = 0; 
            var yValue2 = 30;

            //inicializamos la grafica con el valor de la variable de session 
            var time = new Date(<?php $_SESSION['fechaDeEntrada'] ?>);

            function updateChartHumedad(count) {
                count = count || 1;
                var deltaY1;
                for (var i = 0; i < count; i++) {
                    time.setTime(time.getTime()+ updateInterval);
                    deltaY1 = .5 + Math.random() *(-.5-.5);
                
                }

                //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                let humedad = $.ajax({
                    
                    dataType: 'text',//indicamos que es de tipo texto plano
                    url: 'lib/humedadTiempoReal.php', //indicamos la ruta donde se genera la hora
                    async: false     //ponemos el parámetro asyn a falso
                
                }).responseText;
                
                
                // introducimos los nuevos valores
                dataPointsHumedad.push({
                    x: time.getTime()+ updateInterval,
                    y: parseFloat(humedad)
                });
                
                    
                // actualizar texto de leyenda con Valor
                chart.options.data[0].legendText = " DHT22 Humedad " + humedad;
                
                chart.render();
            }
            // genera el primer conjunto de dataPoints
            updateChartHumedad(1);	

            
            
            
            /*********************************  TEMPERATURA  ********************************************/

            var dataPointsTemperatura = [];
            

            var chartTemperatura = new CanvasJS.Chart("chartContainerTemperatura", {
                
                zoomEnabled: true,
               
                axisY:{
                    prefix: "º ",
                    includeZero: false
                }, 
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor:"pointer",
                    verticalAlign: "top",
                    fontSize: 22,
                    fontColor: "dimGrey",
                    itemclick : toggleDataSeries
                },
                data: [{ 
                    type: "line",
                    xValueType: "dateTime",
                    yValueFormatString: "##,##º",
                    xValueFormatString: "hh:mm:ss TT",
                    showInLegend: true,
                    name: "Sensor DHTt",
                    dataPoints: dataPointsTemperatura
                    } ]
            });

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chartTemperatura.render();
            }

            var updateInterval = 3000;
            // initial value
            var yValue1 = 0; 
            var yValue2 = 30;

            //inicializamos la grafica con el valor de la variable de session 
            var time = new Date(<?php $_SESSION['fechaDeEntrada'] ?>);

            function updateChartTemperatura(count) {
                count = count || 1;
                var deltaY1;
                for (var i = 0; i < count; i++) {
                    time.setTime(time.getTime()+ updateInterval);
                    deltaY1 = .5 + Math.random() *(-.5-.5);
                
                }

                //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                let temperatura = $.ajax({
                    
                    dataType: 'text',//indicamos que es de tipo texto plano
                    url: 'lib/temperaturaTiempoReal.php', //indicamos la ruta donde se genera la hora
                    async: false     //ponemos el parámetro asyn a falso
                
                }).responseText;
                
                console.log( parseFloat(temperatura));
                // introducimos los nuevos valores
                dataPointsTemperatura.push({
                    x: time.getTime()+ updateInterval,
                    y: parseFloat(temperatura)
                    
                    
                });
                
                    
                // actualizar texto de leyenda con Valor
                chartTemperatura.options.data[0].legendText = " DHT22 Temperatura " +  parseFloat(temperatura);
                
                chartTemperatura.render();
            }
            // genera el primer conjunto de dataPoints
            updateChartTemperatura(1);

            /*********************************  Anemometro  ********************************************/

            var dataPointsAnemometro = [];
            

            var chartAnemometro = new CanvasJS.Chart("chartContainerAnemometro", {
                
                zoomEnabled: true,
               
                axisY:{
                    prefix: "km/h ",
                    includeZero: false
                }, 
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor:"pointer",
                    verticalAlign: "top",
                    fontSize: 22,
                    fontColor: "dimGrey",
                    itemclick : toggleDataSeries
                },
                data: [{ 
                    type: "line",
                    xValueType: "dateTime",
                    yValueFormatString: "##,##km/h",
                    xValueFormatString: "hh:mm:ss TT",
                    showInLegend: true,
                    name: "Anemometro SEN-08942",
                    dataPoints: dataPointsAnemometro
                    } ]
            });

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chartAnemometro.render();
            }

            var updateInterval = 3000;
            // initial value
            var yValue1 = 0; 
            var yValue2 = 30;

            //inicializamos la grafica con el valor de la variable de session 
            var time = new Date(<?php $_SESSION['fechaDeEntrada'] ?>);

            function updateChartAnemometro(count) {
                count = count || 1;
                var deltaY1;
                for (var i = 0; i < count; i++) {
                    time.setTime(time.getTime()+ updateInterval);
                    deltaY1 = .5 + Math.random() *(-.5-.5);
                
                }

                //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                let anemometro = $.ajax({
                    
                    dataType: 'text',//indicamos que es de tipo texto plano
                    url: 'lib/anemometroTiempoReal.php', //indicamos la ruta donde se genera la hora
                    async: false     //ponemos el parámetro asyn a falso
                
                }).responseText;
                
                
                // introducimos los nuevos valores
                dataPointsAnemometro.push({
                    x: time.getTime()+ updateInterval,
                    y: parseFloat(anemometro)
                });
                
                    
                // actualizar texto de leyenda con Valor
                chartAnemometro.options.data[0].legendText = "SEN-08942 Anemometro" + anemometro;
                
                chartAnemometro.render();
            }
            // genera el primer conjunto de dataPoints
            updateChartAnemometro(1);	
            
            /*********************************  Veleta  ********************************************/

            var dataPointsVeleta = [];
            

            var chartVeleta = new CanvasJS.Chart("chartContainerVeleta", {
                
                zoomEnabled: true,
                
                axisY:{
                    prefix: "º ",
                    includeZero: false
                }, 
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor:"pointer",
                    verticalAlign: "top",
                    fontSize: 22,
                    fontColor: "dimGrey",
                    itemclick : toggleDataSeries
                },
                data: [{ 
                    type: "line",
                    xValueType: "dateTime",
                    yValueFormatString: "####º",
                    xValueFormatString: "hh:mm:ss TT",
                    showInLegend: true,
                    name: "Veleta SEN-08942",
                    dataPoints: dataPointsVeleta
                    } ]
            });

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chartVeleta.render();
            }

            var updateInterval = 3000;
            // initial value
            var yValue1 = 0; 
            var yValue2 = 30;

            //inicializamos la grafica con el valor de la variable de session 
            var time = new Date(<?php $_SESSION['fechaDeEntrada'] ?>);

            function updateChartVeleta(count) {
                count = count || 1;
                var deltaY1;
                for (var i = 0; i < count; i++) {
                    time.setTime(time.getTime()+ updateInterval);
                    deltaY1 = .5 + Math.random() *(-.5-.5);
                
                }

                //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                let veleta = $.ajax({
                    
                    dataType: 'text',//indicamos que es de tipo texto plano
                    url: 'lib/veletaTiempoReal.php', //indicamos la ruta donde se genera la hora
                    async: false     //ponemos el parámetro asyn a falso
                
                }).responseText;
                
                
                // introducimos los nuevos valores
                dataPointsVeleta.push({
                    x: time.getTime()+ updateInterval,
                    y: parseFloat(veleta)
                });
                
                    
                // actualizar texto de leyenda con Valor
                chartVeleta.options.data[0].legendText = "SEN-08942 Veleta" + veleta;
                
                chartVeleta.render();
            }
            // genera el primer conjunto de dataPoints
            updateChartVeleta(1);	

            // ejecutamos para para hacer update de los datos de la grafica con el tiempo asignado updateInterval
            setInterval(function(){updateChartTemperatura();updateChartHumedad(); updateChartAnemometro(); updateChartVeleta();}, updateInterval);
            // ejecutamos para para hacer update de los datos de la grafica con el tiempo asignado updateInterval
            
            

            function getTimeAJAX() {

                // GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

                var time = $.ajax({
                    type: 'JSON',
                    dataType: 'text',//indicamos que es de tipo texto plano
                    url: 'lib/traerDatoDesdeHastaTiempoReal.php', //indicamos la ruta donde se genera la hora
                    async: false     //ponemos el parámetro asyn a falso

                }).responseText;
                
                // actualizamos el div que nos mostrará la hora actual
                document.getElementById("mensaje").innerHTML = "<div class='text-center p-2'>La fecha y hora actual que hemos obtenido de datos es: <p><strong>"+time+"</strong></p></div>";
            }

            // con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
            setInterval(getTimeAJAX,1000);

            $('.canvasjs-chart-credit').hide('fast');

        }
</script>

    <div id="chartContainerHumedad" class="mb-5" style="height: 370px; width: 100%;"></div>

    <div id="chartContainerTemperatura" class="mb-5" style="height: 370px; width: 100%;"></div>

    <div id="chartContainerAnemometro" class="mb-5" style="height: 370px; width: 100%;"></div>

    <div id="chartContainerVeleta" class="mb-5"  style="height: 370px; width: 100%;"></div>
    
	
</body>
</html>