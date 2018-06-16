

<!-- Menús -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top navbar navbar-dark bg-dark">
    <div class="container">
      
        <a class="navbar-brand" href="/ ">
            <img id="logo" class="d-inline-block mr-1" alt="Logo" src="./images/icons/Icon-36.png"> 
            <span class="logo">Emecubo</span>
         </a>
        <!-- links toggle -->
        <button class="navbar-toggler ml-auto" type="button" type="button" data-toggle="" data-target="" aria-controls="" aria-expanded="" aria-label=" navigation">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </button>
        
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item humedad">
                    <a class="nav-link" href="humedad.php">Humedad</a>
                </li>
                <li class="nav-item temperatura">
                    <a class="nav-link" href="temperatura.php">Temperatura</a>
                </li>
                <li class="nav-item anemometro">
                    <a class="nav-link" href="anemometro.php">Anemometro</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link veleta" href="veleta.php">Veleta</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link tiempoReal" href="tiempoReal.php">Tiempo Real</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link obtener" href="obtenerDatos.php">Obtener datos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link registrar" href="ingresarDatos.php">Registrar datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link localizacion" href="localizacion.php">Localización</a>
                </li>
            </ul>
        </div>

       

    </div>
</nav>

<div id="menuOverlay" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
            
        <a class="nav-link humedad" href="./humedad.php">Humedad</a>
        <a class="nav-link temperatura" href="./temperatura.php">Temperatura</a>
        <a class="nav-link anemometro" href="./anemometro.php">Anemometro</a>
        <a class="nav-link veleta" href="./veleta.php">Veleta</a>
        <a class="nav-link tiempoReal" href="./tiempReal.php">Tiempo Real</a>
        
        <a class="nav-link obtener" href="./obtenerDatos.php">Obtener datos</a>
        <a class="nav-link registrar" href="./ingresarDatos.php">Registrar datos</a>
        
        <a class="nav-link localizacion" href="localizacion.php"> Localización</a>
  </div>
</div>

<!-- open/close activar seleccionado -->
<script type='text/javascript'>
$(function(){

    switch (window.location.pathname) {
        case '/humedad.php':
        $('.humedad').addClass('current');
        break;
        case '/temperatura.php':
        $('.temperatura').addClass('current');
        break;
        case '/anemometro.php':
        $('.anemometro').addClass('current');
        break;
        case '/veleta.php':
        $('.veleta').addClass('current');
        break;
        case '/tiempoReal.php':
        $('.tiempoReal').addClass('current');
        break;
        case '/obtenerDatos.php':
        $('.obtener').addClass('current');
        break;
        case '/ingresarDatos.php':
        $('.registrar').addClass('current');
        break;
        case '/localizacion.php':
        $('.localizacion').addClass('current');
        break;
    }
})
</script>		
