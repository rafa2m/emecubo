<?php 
    include "head.php";
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qGCBBrDRhzz5HMllAZR5IFPLg5zt52g" async defer></script>
</head>    
<body>
    <?php 
        include "menu.php";
        
        include "conexion.php";

        $consulta ="SELECT * FROM `estacion`";
        

        if ($resultado = $mysqli->query($consulta)) {
            
            /* obtener un array asociativo */
            while ($fila = $resultado->fetch_assoc()) {
                
                $longitud = $fila["longitud"];
                $latitud = $fila["latitud"];
                $altura = $fila["altura"];
                $altitud = $fila["altitud"];
                $id = $fila["id"];
                $fecha = $fila["fecha"];
                $observacion = $fila["observacion"];
                $idlogger = $fila["idlogger"];
                
            }

            /* liberar el conjunto de resultados */
            $resultado->free();
        }

        /* cerrar la conexión */
        $mysqli->close();
      ?>
    <div id="map"></div>
    <script>
        $(document).ready(function($){
            var ventana_ancho = $(window).width();
            var ventana_alto = $(window).height();
            console.log(ventana_ancho);
            console.log(ventana_alto);
            $("#map").css("height", ventana_alto);
        }); 

        var map;
        var altura;
        var latitud;
        var longitud;
        var marker;
        
        $(document).ready(function() {
            /*Cuando cargue la página, cargamos nuestra posición*/   
            localizame(); 
            
        });
        
        function localizame() {
            if (navigator.geolocation) { /* Si el navegador tiene geolocalizacion */
                navigator.geolocation.getCurrentPosition(coordenadas, errores);
            }else{
                alert('Oops! Tu navegador no soporta geolocalización. Bájate Chrome, que es gratis!');
            }
        }
         function errores(err) {
            /*Controlamos los posibles errores */
            if (err.code == 0) {
              alert("Oops! Algo ha salido mal");
            }
            if (err.code == 1) {
              alert("Oops! No has aceptado compartir tu posición");
            }
            if (err.code == 2) {
              alert("Oops! No se puede obtener la posición actual");
            }
            if (err.code == 3) {
              alert("Oops! Hemos superado el tiempo de espera");
            }
        }
        function coordenadas(position) {
            latitud = position.coords.latitude; /*Guardamos nuestra latitud*/
            longitud = position.coords.longitude; /*Guardamos nuestra longitud*/
            cargarMapa(latitud,longitud);
        }

      function cargarMapa(latitud,longitud) {
          console.log(latitud+","+longitud);
          
        var ourLocation = {lat: latitud, lng: longitud};
        var latlon_station = {lat: <?= $latitud?>, lng: <?= $longitud?>};
       
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlon_station,
          zoom: 16
        });

        var directionsDisplay = new google.maps.DirectionsRenderer({
          map: map
        });

        var image = {
          url: './images/32-icon.png', 
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(42, 43),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
         var marker = new google.maps.Marker({
            position: latlon_station,
            draggable: false,
            map: map,
            icon: image,
            title: 'Hello World!'
        });
        // marker.addListener('click', toggleBounce);
        
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
        var contentInformacion = function(){
            $.ajax({
                data: {"parametro1" : "valor1", "parametro2" : "valor2"},
                type: "POST",
                dataType: "json",
                url: "https://emecubo.extremepromotionsproject.xyz/API/obtener/estacion/STC1",
            })
            .done(function( data, textStatus, jqXHR ) {
                if ( console && console.log ) {
                    console.log( "La solicitud se ha completado correctamente." );
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                }
            });
        }
        var contentString = '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h1 id="firstHeading" class="firstHeading">Estación <?php echo $id ?></h1>'+
                            '<div id="bodyContent">'+
                            '<ul>'+
                                '<li><strong> longitud :</strong><?php echo $longitud ?></li>'+
                                '<li><strong> latitud :</strong><?php echo $latitud  ?></li>'+
                                '<li><strong> altura :</strong><?php echo $altura  ?></li>'+
                                '<li><strong> altitud :</strong><?php echo $altitud  ?></li>'+
                                '<li><strong> id :</strong><?php echo $id  ?></li>'+
                                '<li><strong> fecha :</strong><?php echo $fecha  ?></li>'+
                                // '<li><strong> observacion :</strong><?php echo $observacion ?></li>'+
                                '<li><strong> idlogger :</strong><?php echo $idlogger ?></li>'+
                            '</ul>'+
                            '</div>'+
                            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        
        
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        
       
      }
    
    </script>
   
</body>

</html>