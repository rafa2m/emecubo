<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chat usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/firebasejs/5.0.3/firebase.js"></script>

        <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
        $time=strtotime("now");
        date_default_timezone_set('Europe/Madrid');
        $fecha=date("F j, Y, g:i a");
        $nombreCliente=$_REQUEST['nombre'];
    ?>
    <div id="contenedorUnique" class="container">
        <div id="chatUl" class="cajaChat mt-3 mb-3">
            <ul class="striped-list">
                <li><span class="nombre">Javier </span> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor N. del T.lorem</li>
                <li><span class="nombre">Ihor </span> Mensaje </li>
                <li><span class="nombre">Javier </span> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor N. del T.lorem</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombreCliente ?>">
                <form class="" action="" method="post">
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
                    <button type="button" id="btnEnviar2" class="btn btn-info float-right mb-2">Enviar</button>
                </form>
            </div>
        </div>

    </div>
    <script src="js/fireindex.js"></script>

  </body>
</html>
