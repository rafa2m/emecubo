<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/firebasejs/5.0.3/firebase.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
    <title>Chat usuario</title>

  </head>
  <body>
    <div class="container">

      <div class="containerLog" id="containerLog">
          <div class="row">
              <div class="col-12">

                <h1 class="text-center mb-5">Bienvenido al DobChat</h1>

                <div class="" id="nomIdCl">
                    <label for="nombre" class="">Introduzca nombre identificativo:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="">
                </div>
                <button type="submit" name="button1" class="btn btn-success mt-3 btn-block" onclick="anonymLogin()">Enviar</button>

            </div>
          </div>
      </div>
      <div class="containerChat" id="containerChat" style="display:none">
        <?php
        $time=strtotime("now");
        date_default_timezone_set('Europe/Madrid');
        $fecha=date("F j, Y, g:i a");
        ?>
        <div id="chatUl" class="cajaChat mt-3 mb-3">
            <ul class="striped-list">
                <!-- <li><span class="nombre">Javier </span> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor N. del T.lorem</li>
                <li><span class="nombre">Ihor </span> Mensaje </li>
                <li><span class="nombre">Javier </span> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor N. del T.lorem</li> -->
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    <!-- <label for="nombre">Nombre</label> -->
                    <input id="clientId" name="Id" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
                    <input id="IdTime" type="hidden" value="<?php echo $time?>">
                    <input id="fecha" type="hidden" value="<?php echo $fecha?>">
                </div>
                <div class="mb-2 mt-1">
                    <label for="mensaje" class="block ">Escriba mensaje:</label>
                    <textarea  id="mensaje" rows="3" cols="20"></textarea>
                </div>
                    <button type="button" id="btnEnviar" class="btn btn-info float-right mb-2" onclick="chatuser()">Enviar</button>
            </div>
        </div>
      </div>
    </div>

      <script src="js/fireindexUser.js"></script>

  </body>
</html>
