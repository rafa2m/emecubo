<?php

    include "head.php";

?>

<!-- ------------------------ -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


</head>
<body>
<?php

    include "menu.php";
    include "conexion.php";

?>
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">

            <h1 class="mt-4">Veleta</h1>
            <p>
                La veleta indica la dirección en que sopla el viento.
                Internamente en la veleta hay ocho interruptores, cada uno con su propia resistencia única.
            </p>
            <p class="text-center">
                <img src="./images/WindVane_Switches.jpg" class="img-fluid" alt="circuito de una velta">
                
            </p>
            <p class="text-center">
                <small class="font-italic">
                    Esquema interno de la veleta.
                </small>
            </p>
            
            <p>
                A medida que gira la veleta, un imán cierra los interruptores de láminas, y puede cerrar dos a la vez debido a su proximidad entre sí. Con el uso de una resistencia externa, se puede crear un divisor de voltaje. La medición de la salida de voltaje con un convertidor analógico a digital en su microcontrolador le permite determinar la dirección a la que apunta la veleta.
            </p>

            
            <hr>            
            <div id="container" class="mt-2" ></div>
        </div>
    </div>
</div>


<div style="display:block" class="container">
<div class="row">
<div class="col-md-12">
  <!-- Source: http://or.water.usgs.gov/cgi-bin/grapher/graph_windrose.pl -->
  <table id="freq" class="table table-striped" border="0" cellspacing="0" cellpadding="0">
    <thead class="thead-dark">
    <tr nowrap bgcolor="#CCCCFF">

      <th colspan="9" class="hdr text-center">Tabla de frecuencias (porcentajes) </th>
    </tr>
    <tr nowrap bgcolor="#CCCCFF">
      <th class="freq">Direction</th>
      <th class="freq">&lt; 0.5 km/h</th>
      <th class="freq">0.5-2 km/h</th>
      <th class="freq">2-4 km/h</th>
      <th class="freq">4-6 km/h</th>
      <th class="freq">6-8 km/h</th>
      <th class="freq">8-10 km/h</th>
      <th class="freq">&gt; 10 km/h</th>
      <th class="freq">Total</th>
    </tr>
    </thead>
    <tr nowrap id="norte3">
      <td class="dir">N</td>
      <td class="data">1.81</td>
      <td class="data">1.78</td>
      <td class="data">0.16</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">3.75</td>
    </tr>    
    <tr nowrap bgcolor="#DDDDDD" id="noroeste">
      <td class="dir">NNE</td>
      <td class="data">0.62</td>
      <td class="data">1.09</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">1.71</td>
    </tr>
    <tr nowrap>
      <td class="dir">NE</td>
      <td class="data">0.82</td>
      <td class="data">0.82</td>
      <td class="data">0.07</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">1.71</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD">
      <td class="dir">ENE</td>
      <td class="data">0.59</td>
      <td class="data">1.22</td>
      <td class="data">0.07</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">1.88</td>
    </tr>
    <tr nowrap id="este">
      <td class="dir">E</td>
      <td class="data">0.62</td>
      <td class="data">2.20</td>
      <td class="data">0.49</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">3.32</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD">
      <td class="dir">ESE</td>
      <td class="data">1.22</td>
      <td class="data">2.01</td>
      <td class="data">1.55</td>
      <td class="data">0.30</td>
      <td class="data">0.13</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">5.20</td>
    </tr>
    <tr nowrap id="suroeste">
      <td class="dir" >SE</td>
      <td class="data">1.61</td>
      <td class="data">3.06</td>
      <td class="data">2.37</td>
      <td class="data">2.14</td>
      <td class="data">1.74</td>
      <td class="data">0.39</td>
      <td class="data">0.13</td>
      <td class="data">11.45</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD" >
      <td class="dir">SSE</td>
      <td class="data">2.04</td>
      <td class="data">3.42</td>
      <td class="data">1.97</td>
      <td class="data">0.86</td>
      <td class="data">0.53</td>
      <td class="data">0.49</td>
      <td class="data">0.00</td>
      <td class="data">9.31</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD"  id="sur">
      <td class="dir">S</td>
      <td class="data">2.66</td>
      <td class="data">4.74</td>
      <td class="data">0.43</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">7.83</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD" id="suroeste">
      <td class="dir">SSW</td>
      <td class="data">2.96</td>
      <td class="data">4.14</td>
      <td class="data">0.26</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">7.37</td>
    </tr>
    <tr nowrap id="suroeste">
      <td class="dir">SW</td>
      <td class="data">2.53</td>
      <td class="data">4.01</td>
      <td class="data">1.22</td>
      <td class="data">0.49</td>
      <td class="data">0.13</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">8.39</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD">
      <td class="dir">WSW</td>
      <td class="data">1.97</td>
      <td class="data">2.66</td>
      <td class="data">1.97</td>
      <td class="data">0.79</td>
      <td class="data">0.30</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">7.70</td>
    </tr>
    <tr nowrap>
      <td class="dir">W</td>
      <td class="data">1.64</td>
      <td class="data">1.71</td>
      <td class="data">0.92</td>
      <td class="data">1.45</td>
      <td class="data">0.26</td>
      <td class="data">0.10</td>
      <td class="data">0.00</td>
      <td class="data">6.09</td>
    </tr>
    <tr nowrap bgcolor="#DDDDDD">
      <td class="dir">WNW</td>
      <td class="data">1.32</td>
      <td class="data">2.40</td>
      <td class="data">0.99</td>
      <td class="data">1.61</td>
      <td class="data">0.33</td>
      <td class="data">0.00</td>
      <td class="data">0.00</td>
      <td class="data">6.64</td>
    </tr>
    <tr nowrap>
      <td class="dir">NW</td>
      <td class="data">1.58</td>
      <td class="data">4.28</td>
      <td class="data">1.28</td>
      <td class="data">0.76</td>
      <td class="data">0.66</td>
      <td class="data">0.69</td>
      <td class="data">0.03</td>
      <td class="data">9.28</td>
    </tr>    
    <tr nowrap bgcolor="#DDDDDD">
      <td class="dir">NNW</td>
      <td class="data">1.51</td>
      <td class="data">5.00</td>
      <td class="data">1.32</td>
      <td class="data">0.13</td>
      <td class="data">0.23</td>
      <td class="data">0.13</td>
      <td class="data">0.07</td>
      <td class="data">8.39</td>
    </tr>
    
  </table>

<?php 
   

    
    // $min =(float) $mysqli->query("select MIN(valor) FROM medidasensor where nombre ='A' ");
    // $max =(float) $mysqli->query("select MAX(valor) FROM medidasensor where nombre ='A' ");
    // $res = $mysqli->query("select s1.valor as anemometro, s2.valor as veleta,s1.fecha_medida as fecha from (SELECT fecha_medida,valor FROM medidasensor where nombre ='A' ) s1 LEFT JOIN (SELECT fecha_medida,valor FROM medidasensor where nombre ='V') s2 ON s1.fecha_medida=s2.fecha_medida Order by s2.fecha_medida asc");
    // // $res = $mysqli->query("SELECT fecha_medida,nombre,fechaconfigsensor,idsensor,tiposensor,marcasensor,modelosensor,idestacion,valor from medidasensor ");
    // //echo "<h3>Data</h3>"  ;
    // $contador=0;
    // while($row = $res->fetch_object()){
    //     $contador++;
    //     $todosLasEstaciones[] = $row;
    //     $direccionVeleta = floatval($row->veleta);
    //     $valorAnemometro = floatval($row->anemometro);
    //    // echo "<p>DIRECCION => ".$direccionVeleta." VALOR => ".$valorAnemometro."</p><br>"; // 122.34343
    //    // printf ("%s (%s)\n", $row->anemometro, $row->veleta,$row->fecha);
    //     if($valorAnemometro>0 && $direccionVeleta < 90 && $direccionVeleta > 0 ){
            
    //         ?>
             <script language="javascript" type="text/javascript" >
    //        // alert("entra en NORTE");
    //             var dato=<?php echo $valorAnemometro;  ?>;
    //             if (dato>0)
    //                 $('#norte').append("<td class='data'>"+dato+"</td>");
    //         </script>
           <?php
    //     }
    //     else if($valorAnemometro>0 && $direccionVeleta < 180  && $direccionVeleta > 90){
    //         ?>
             <script language="javascript" type="text/javascript" >
    //             //alert("entra en OESTE");
    //             var dato=<?php echo $valorAnemometro;  ?>;
    //             if (dato>0)
    //             $('#oeste').prepend("<td class='data'>"+dato+"</td>");
    //         </script>
           <?php
    //     }
    //     else if($valorAnemometro>0 && $direccionVeleta < 270  && $direccionVeleta > 180){
    //         ?>
             <script language="javascript" type="text/javascript" >
    //             //alert("entra en SUR");
    //             var dato=<?php echo $valorAnemometro;  ?>;
    //             if (dato>0)
    //             $('#sur').prepend("<td class='data'>"+dato+"</td>");
    //         </script>
           <?php
    //     }
    //     else if($valorAnemometro>0 && $direccionVeleta < 360  && $direccionVeleta > 270){
    //         ?>
             <script language="javascript" type="text/javascript" >
    //            // alert("entra en ESTE");
    //             var dato=<?php echo $valorAnemometro;  ?>;
    //             if (dato>0)
    //             $('#este').prepend("<td class='data'>"+dato+"</td>");
    //         </script>
           <?php
    //     }
       
    // }
   // echo "<h5>".$contador."</h5>";
    ?>
    <pre>
        <?php
       // var_dump($todosLasEstaciones);
        ?>
    </pre>
    <?php
?>
</table>
</div>
</div>
</div>
<?php
    // echo "<h5 >Total de datos : <span id=''>" . $contador . "</span></h5>";
    // echo "<h5>valor Mínimo : " . $min . "</h5>";
    // echo "<h5>valor Máximo : " . $max . "</h5>";

?>

<script>
    $(document).ready(function(){
        console.log( parseFloat( $("#total").text()));
    //alert($("#total").val());
    });
    // Parse the data from an inline table using the Highcharts Data plugin
    Highcharts.chart('container', {
    data: {
        table: 'freq',
        startRow: 1,
        //analizamos el maxximo de resultados posibles
        endRow: parseFloat( $("#total").text()),
        endColumn: 7
    },

    chart: {
        polar: true,
        type: 'column'
    },

    title: {
        text: 'Rosa de los vientos para Estación Meteorológica, SCT1'
    },

    subtitle: {
        text: 'Datos: emecubo SCT1'
    },

    pane: {
        size: '85%'
    },

    legend: {
        align: 'right',
        verticalAlign: 'top',
        y: 100,
        layout: 'vertical'
    },

    xAxis: {
        tickmarkPlacement: 'on'
    },

    yAxis: {
        min: 0,
        endOnTick: false,
        showLastLabel: true,
        title: {
        text: 'Frecuencia (%)'
        },
        labels: {
        formatter: function () {
            return this.value + '%';
        }
        },
        reversedStacks: false
    },

    tooltip: {
        valueSuffix: '%'
    },

    plotOptions: {
        series: {
        stacking: 'normal',
        shadow: false,
        groupPadding: 0,
        pointPlacement: 'on'
        }
    }
    });
    $('.highcharts-credits').hide('fast');
</script>


</body>
</html>