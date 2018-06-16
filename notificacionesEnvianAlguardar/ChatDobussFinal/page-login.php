<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Login</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

        <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.php" class="logo"><span>Dobuss<span>to</span></span></a>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Login</h4>
                </div>
                <div class="p-20">
                    <!-- <form class="form-horizontal m-t-20" > -->
                        <div id="estamosDentro">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="email" required="" placeholder="Email..." id="email_field">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" required=""  placeholder="Password..." id="password_field">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12" id="capaLogin">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" onclick="login()">Go</button>
                                <!-- <button class=""  onclick="login()">prueba</button> -->
                            </div>
                        </div>

                          <form class="form-horizontal m-t-20" action="index.php" method="post">
                            <div id="mostrarContenido" style="display: none">
                              <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" name="valor" value="true">Enter</button>
                            </div>
                          </form>
                    <!-- </form> -->
                </div>
            </div>
            <!-- end card-box-->
        </div>
        <!-- end wrapper page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- Firebase -->
        <script src="js/fireindex.js"></script>
	</body>
</html>
