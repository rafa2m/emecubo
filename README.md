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
## 3- Obtener medidas (app)
## 4- Obtener configuración sensor (app) (Reglas incluidas)
## 5- Obtener configuración estación (app)
## 6- Obtener configuración sensores (app)
## 7- Obtener avisos incidencias
