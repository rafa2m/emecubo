<?php 
        include "menuLogin.php";
        $error = $_REQUEST['er'];
        if(isset($error) and $error!=""){
            
        }else {

        }

?>
    
    <div class="container mt-5 mb-5">
        <div class="row">
    <?php 
        if(isset($_REQUEST['er']) and $_REQUEST['er']==7){
        echo '
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success mt-5  text-center alert-dismissible fade show" role="alert">
                        <p><strong>Todo ha salido genial</strong>, ¡se han enviado las notificaciones!.</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>';
        }
    ?>
            <div class="col-12 mt-4">
                <div class="center">
                </div>
    <form action="../lib/guardarMensaje.php" id="" method="post" enctype="multipart/form-data" >
                <nav aria-label="breadcrumb mt-5">
                
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"> <span class="circle">1</span> Audiencia</li>
                    </ol>
                </nav>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="audienciaRadios" id="audienciaRadios1" value="option1" checked >
                    <label class="form-check-label" for="audienciaRadios1" >
                        Enviar a todos
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="audienciaRadios" id="audienciaRadios2" value="option2">
                    <label class="form-check-label" for="audienciaRadios2">
                        Enviar a un segmentro en concreto 
                        
                    </label>
                    <div class="options" style="display:none">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">computer
                                </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="">phone
                                </label>
                                </div>
                                <div class="form-check ">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="" >tablet
                                </label>
                                </div>
                     </div>
                </div>
                    <div class="form-check ">
                    <input class="form-check-input" type="radio" name="audienciaRadios" id="audienciaRadios3" value="option3" >
                    <label class="form-check-label block" for="example3">
                        Enviar a dispositivo de test

                        <div class="regIdEspecifico col-12" style="display:none">
                            <div class="form-group">
                                <label for="usr"><strong>Clave de registro específico:</strong></label>
                                <input type="text" class="form-control " id="usr">
                            </div>
                        </div>

                    </label>
                </div>

                <!-- terminamos la audiencia  -->
                <!-- comenzamos el mensaje   -->
               
                
                    <nav aria-label="breadcrumb" class="mt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> <span class="circle">2</span> Mensaje</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control required" name ="titulo" id="titulo" maxlength="50" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="mensaje">Mensaje:</label>
                                <textarea class="form-control required" rows="5" name="mensaje" id="mensaje" maxlength="250" required></textarea>
                            </div>
                        </div>
                    </div>
                

                <!-- terminamos el mensaje -->
                <!-- comenzamos la customizacion -->
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"> <span class="circle">3</span> Opciones</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="usr">Imagen:</label>
                            <input type='file' onchange="readURL(this);" name="user_image" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                            <img id="blah" src="https://placehold.it/180" alt="your image" />
                            <script>
                                 function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#blah')
                                                .attr('src', e.target.result);
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-5 text-center">
                                
                                <input class="btn btn-warning btn-lg" type="submit" value="Guardar en bbdd y enviar notificaciones">
                                <div id="resultado"></div>
                                
                                <script>
                                    // $(document).ready(function() {
 
                                    //     $('#titulo,#mensaje').on('keyup',function(){
                                    //         $(this).val()!='' ? $("#resultado").show() : $("#resultado").hide();
                                    //     })

                                    // })

                                    function validarFormulario(){
                                        
                                        var titulo = $("#titulo").val();
                                        var mensaje = $("#mensaje").val();
                                         var parametros = {
                                                "titulo" : titulo,
                                                "mensaje" : mensaje
                                        };
                                        if($("#titulo").val() != ""  && $("#mensaje").val() != ""){
                                            console.log("enviamos....");
                                            $.ajax({
                                                    data:parametros,
                                                    url:   'guardarMensaje.php',
                                                    type:  'post',
                                                    beforeSend: function () {
                                                            console.log("Procesando, espere por favor...");
                                                            $("#resultado").html("Procesando, espere por favor...");
                                                    },
                                                    success:  function (response) {
                                                        console.log("finalizado"+response);
                                                            $("#resultado").html(response);
                                                    }
                                            });
                                            
                                        } else {
                                            console.log("dame los datos obligatorios");                                            
                                             
                                        }
                                    }

                                    // function realizaProceso(){
                                    //     let titulo = $('#titulo').val();
                                    //     let mensaje = $('#mensaje').val();
                                    //     console.log(titulo);
                                    //     console.log(mensaje);
                                    //     // $.ajax({
                                    //     //         data:
                                    //     //         url:   'guardarMensaje.php',
                                    //     //         type:  'post',
                                    //     //         beforeSend: function () {
                                    //     //                 $("#resultado").html("Procesando, espere por favor...");
                                    //     //         },
                                    //     //         success:  function (response) {
                                    //     //                 $("#resultado").html(response);
                                    //     //         }
                                    //     // });

                                    //     // $.ajax({
                                    //     //         url:   'curl.php',
                                    //     //         type:  'post',
                                    //     //         beforeSend: function () {
                                    //     //                 $("#resultado").html("Procesando, espere por favor...");
                                    //     //         },
                                    //     //         success:  function (response) {
                                    //     //                 $("#resultado").html(response);
                                    //     //         }
                                    //     // });
                                    // }
                                </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </form>
     <script>
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")!="option2"){
                $(".options").hide('slow');
            }
            if($(this).attr("value")=="option2"){
                $(".options").show('slow');

            }

            if($(this).attr("value")!="option3"){
                $(".regIdEspecifico").hide('slow');
            }
            if($(this).attr("value")=="option3"){
                $(".regIdEspecifico").show('slow');

            }            
        });
        
       
    </script>
</body>
</html>

