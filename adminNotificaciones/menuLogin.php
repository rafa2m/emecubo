<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="#">Admin de Notificaciones </a>
        <!-- <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar"  aria-label="Toggle navigation">
            &#9776;
        </button> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            
                
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary" onclick="logout()" >Logout </button>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script type="text/javascript">
        function logout(){
            location.href ="./cerrarSession.php";
        }
</script>