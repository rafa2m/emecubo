# emecubo
<img src="http://emecubo.extremepromotionsproject.xyz/API/img/estacionCompleta.jpg" />


## 1- obtener configuracion desde arduino, 3#T,H-4#V-6
Canal = 3 <br>
Medida 1 = T <br>
Medida 2 = H <br>

Canal 4 = 4 <br>
Medida 1 = V <br>

      
## 2- Registrar medidas

	/1/3#20;60  <br>
	T H <br>
	#	
	Estación = 1   } <br>
	Canal    = 3   }   <br>
	? BD => ConfigSensor <br>
	    id =12345  <br>
	    Tipo =TH <br>
	    Modelo = DHT22 <br>
	    Marca = ----- <br>
	    Fechaconfig = 01/04/2018 20:00 <br>
	    FechaFin = null <br>

	Tipos de medida canal 3
	Nombre = T 
	Valor = Temperatura 
	Nombre = H 
	Valor = Humendad 
	Tipos de medida canal 4
	Nombre = V
	Valor = Velocidad
#
    http://emecubo.extremepromotionsproject.xyz/API/registrar/
#	
	
	http://emecubo.extremepromotionsproject.xyz/API/registrar/STC1/sa1/2018-04-15%2000:00:00/AN1/2/ANEMO%20KMS/MODELO%20-%201/STC1/20.000
## 3- Obtener medidas (app)
	http://emecubo.extremepromotionsproject.xyz/API/obtener/	
## 4- Obtener configuración sensor (app) (Reglas incluidas)
	http://emecubo.extremepromotionsproject.xyz/API/obtener/configsensor_regla/AN1	
## 5- Obtener configuración estación (app)
	http://emecubo.extremepromotionsproject.xyz/API/obtener/configestacion/STC1
#### Información de las estaciones posibles	
	http://emecubo.extremepromotionsproject.xyz/API/estacion/
## 6- Obtener configuración sensores (app)
	http://emecubo.extremepromotionsproject.xyz/API/obtener/configsensor/AN1  
#### Para ver los sensores posibles
	http://emecubo.extremepromotionsproject.xyz/API/sensor/
## 7- Obtener avisos incidencias
	http://emecubo.extremepromotionsproject.xyz/API/obtener/avisos/javiealiaga@gmail.com
