<?php
    include "head.php"
?>
</head>
<body>
    <?php
        include "menu.php"
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center mb-1 mt-sm-5 mt-4"> 
                <img src="images/logo.png" class="img-fluid logo" alt="emecubo logotipo">
                <h1 ><a href="tiempoReal.php"><span class="logo-black ">EMECUBO</span></a></h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mt-5">
                <p>
                    <span class="realizado">  Realizado por:</span> <span class="autor"> Javier Aliaga Rodríguez</span>
                </p>
            </div>
        </div>
    </div>                
    <div class="container">
            <div class="row mt-5">
                <div class="col-md-12  mt-5">
                    <h2 class="underline text-lg-right">Introducción</h2>
                    <p class="text-intro">Las estaciones meteorológicas albergan un conjunto de instrumentos destinados a medir y registrar regularmente diversas variables meteorológicas como la temperatura del aire, la presión atmosférica, las precipitaciones, la humedad relativa del aire o la velocidad y dirección del viento, entre otras, para diferentes usos entre los que destacan la elaboración de predicciones meteorológicas y el estudio del clima.</p>

                    <p class="text-intro">En Andalucía la mayor parte de las estaciones meteorológicas son manuales, requiriendo la consulta in situ de la información registrada por su instrumental. Su pronta implantación en territorio andaluz (la primera de ellas se ubicó a finales del siglo XIX en San Fernando para observar las condiciones meteorológicas que pudieran afectar a la navegación marítima), han posibilitado la existencia de un dilatado registro meteorológico de carácter numérico.</p>

                    <img src="images/home1.jpg" class="img-fluid mb-3" alt="emecubo circuito">
                    <p class="text-intro">También existe un importante número de observatorios meteorológicos automáticos. A pesar del elevado coste de estos dispositivos, la cantidad y calidad de la información generada, así como la inmediatez con que puede consultarse ésta, rentabilizan la observación meteorológica mediante estas estaciones.</p>

                    <p class="text-intro">En la actualidad existen una gran variedad de sensores y desde Micro-estación Meteorológica Móvil nos vamos a centrar en los siguientes, sensor de presión del aire y altitud, sensor de temperatura y humedad del aire , sensor de velocidad del viento, sensor de concentración CO2 y sensor de radiación solar, para realizar una estación meteorológica móvil a un precio muy reducido.</p>
                </div>
            </div> 
            <div class="row mt-5">
                <div class="col-md-12  mt-5">
                    <h2 class="underline">Objetivos</h2>
                    <p class="text-intro">Se quiere conseguir que el gran público pueda poseer una estación meteorológica a muy bajo coste, que dicha estación sea autónoma y no tenga problemas de comunicación, consolidar todos los conocimientos y aprendizaje de mis años cursados en el Ciclo Superior de Aplicaciones multiplataforma y ampliación de algunos módulos. </p>

                    <p class="text-intro">Que las medidas recogidas por emecubo se mandarán a un controlador que las irá registrando en una base de datos para que el usuario las pueda visualizar un histórico desglosado por los distintos sensores. Esta consulta se realizará a través de una aplicación que se realizará en Android, diseñando una interfaz sencilla e intuitiva.</p>
                    <div class="text-center">
                        <img src="images/comofuncionaemecubo.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12  mt-5">
                    <h2 class="underline">Galeria</h2>
                    <div class="gal">
                         	<img src="./images/creandoVaquelita.jpg" alt="img-fluid">
	                    	<img src="./images/vaquelita.jpg" alt="img-fluid">
	                    	<img src="./images/arduinoyunDTH22.jpg" alt="img-fluid">
	                    	<img src="./images/dth22comprobando.jpg" alt="img-fluid">
	                    	<img src="./images/lumix.jpg" alt="img-fluid">
	                    	<img src="./images/comienzos.jpg" alt="img-fluid">
	                    	
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12  mt-5">
                    <h2 class="underline">Conclusiones y mejoras</h2>
                    <p class="text-intro">En líneas generales los objetivos del proyecto han sido cumplidos, se ha conseguido que nuestra aplicación reciba datos captados por Arduino de distintos tipos de sensores y se muestren en un dispositivo móvil, siendo guardados dichos datos en una base datos.</p>
                    <p class="text-intro">Dichos datos ponen de manifiesto una semejanza estadística entre Emecubo y registros de  AEMET. Esto refuerza la calidad de los datos al tener registros similares.</p>
                    <p class="text-intro">Este proyecto se cogió en buena parte por aprender nuevos lenguajes de programación y el conocimiento tipo de microcontroladores. Se puede decir que el objetivo se ha cumplido, he aprendido a programar desde cero en C++, lenguaje de Arduino apoyándome en un proyecto real y avanzado en mi conocimientos de sobre PHP. </p>
                    <p class="text-intro">Todo esto me ayudara en un futuro a realizar este tipo de proyectos con una cierta base y experiencia.</p>
                    <p class="text-intro">En conclusión, la realización del Trabajo de final de grado ha sido una experiencia positiva que me ha permitido aprender y mejorar como profesional.</p>
                    
                </div>
            </div>
        
    </div>

</body>
</html>