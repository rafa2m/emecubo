# emecubo



## 1- obtener configuracion desde arduino, 3#T,H-4#V-6#D
Canal = 3
Medida 1 = T
Medida 2 = H

Canal 4 = 4
Medida 1 = V

      
## 2- Registrar medidas

/1/3#20;60
      T H
Estación = 1   }
Canal    = 3   }  ? BD => ConfigSensor
                            id =12345 
                            Tipo =TH
                            Modelo = DHT22
                            Marca = -----
                            Fechaconfig = 01/04/2018 20:00
                            FechaFin = null

                            Tipos de medida
                            Nombre = T
                            Nombre = Temperatura
                            Nombre = H
                            Nombre = Humendad
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
