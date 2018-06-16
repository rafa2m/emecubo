#include "TimerOne.h"          // Timer Interrupt set to 2 second for read sensors
#include <math.h>
#include <Console.h>
#include "DHT.h"


#include <HttpClient.h>
#include <YunClient.h>
#include <YunServer.h>


#define Bucket_Size 0.01   // bucket size to trigger tip count
#define RG11_Pin 3         // digital pin RG11 connected to Pluviometer (green wire)

#define WindSensor_Pin (2)      // The pin location of the anemometer sensor
#define WindVane_Pin A2       // The pin the wind vane sensor is connected to
#define VaneOffset 0        // define the anemometer offset from magnetic north

#define DHTPIN 5     // what pin we're connected to
#define DHTTYPE DHT22   // DHT 22  (AM2302)
#define fan 4

volatile unsigned long tipCount;    // bucket tip counter used in interrupt routine 
volatile unsigned long contactTime; // Timer to manage any contact bounce in interrupt routine 

volatile bool isSampleRequired;       // this is set true every 2.5s. Get wind speed
volatile unsigned int  timerCount;    // used to determine 2.5sec timer count
volatile unsigned long rotations;     // cup rotation counter used in interrupt routine
volatile unsigned long contactBounceTime;  // Timer to avoid contact bounce in interrupt routine
volatile float windSpeed;
volatile float totalRainfall;       // total amount of rainfall detected

bool txState;        // current led state for tx rx led
int vaneValue;       // raw analog value from wind vane
int vaneDirection;   // translated 0 - 360 direction
int calDirection;    // converted value with offset applied
int lastDirValue;    // last recorded direction value 
float hum;
float temp;

int maxHum = 60;
int maxTemp = 40;

DHT dht(DHTPIN, DHTTYPE);

void setup() { 
  pinMode(fan, OUTPUT);
  txState = HIGH;

  // setup rain sensor values
  tipCount = 0;
  totalRainfall = 0; 

  // setup anemometer values
  lastDirValue = 0;
  rotations = 0;
  isSampleRequired = false;

  // setup timer values
  timerCount = 0;
  Bridge.begin();
  Console.begin();
  while (!Console){
    ; // wait for Console port to connect.
  }
  Console.println("Humdity\t\tTemperature\tRainfall\tSpeed\t\tDirection");
  // setup AM 2302 SENSOR
  dht.begin();
  
  // setup Pluviommeter
  pinMode(RG11_Pin, INPUT); 

  // setup wind sensors
  pinMode(WindSensor_Pin, INPUT);
  attachInterrupt(digitalPinToInterrupt(RG11_Pin), isr_rg, FALLING); 
  attachInterrupt(digitalPinToInterrupt(WindSensor_Pin), isr_rotation, FALLING);

  // Setup the timer intterupt for 0.6 second
  Timer1.initialize(6000000);
  Timer1.attachInterrupt(isr_timer);
  
  sei();// Enable Interrupts 
} 

void loop() {

 
  
  if(isSampleRequired) {
    getWindDirection();
    
    Console.print(hum); Console.print(" %\t\t");
    Console.print(temp); Console.print(" ªC\t\t");
    Console.print(totalRainfall); Console.print(" mm\t\t");
    Console.print(windSpeed); Console.print(" Km/h\t");
    Console.print(calDirection); Console.println("*");
    
    readTermoH();
    
    isSampleRequired = false;

    //temporizador para enviar los datos a la BBDD
    sendData(temp);
  }
 
  
}
void sendData(float temp){
   // Initialize the client library
  HttpClient client;
  float t = float(3.14);// dht.readTemperature().dtostrf();
  float h = dht.readHumidity();
  
  String buffer;
  buffer+= "https://final.extremepromotionsproject.xyz/verDatos.php?temperatura=";
  
  buffer+= temp;
  buffer+="&humedad=";
  buffer+=hum;
  buffer+="&agualluvia=";
  buffer+=totalRainfall;
  buffer+="&velocidadViento=";
  buffer+=windSpeed;
  buffer+="&direccionViento=";
  buffer+=calDirection;
  
  
  //char buffer[90];//no se, no he contado
 //sprintf (buffer, "https://final.extremepromotionsproject.xyz/verDatos.php?temperatura=%d&humedad=%d", t,h);
// sprintf (buffer, "https://final.extremepromotionsproject.xyz/verDatos.php?temperatura="+std::t+"&humedad=45.00");
   Console.print(buffer); Console.println("");
  
   
  client.get(buffer);
  

  // Make a HTTP request:
  //client.get("https://final.extremepromotionsproject.xyz/verDatos.php?temperatura=t&humedad=h");    
    
  //Serial.flush();
  //enviar las medidas a la BBDD

    
    
  //  client.get("localhost/insert.php?sensor1=20&&sensor2=21");
}
void readTermoH(){
  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  hum = dht.readHumidity();
  // Read temperature as Celsius
  temp = dht.readTemperature();
  
  // Check if any reads failed and exit early (to try again).
  if (isnan(hum) || isnan(temp)) {
    Console.println("Failed to read from DHT sensor!");
    return;
  }
  
  if(hum > maxHum || temp > maxTemp) {
     digitalWrite(fan, HIGH);
  } else {
     digitalWrite(fan, LOW); 
  }
}

// isr routine for timer interrupt
void isr_timer() {
  
  timerCount++;
  
  if(timerCount == 5) {
    // convert to mp/h using the formula V=P(2.25/T)
    // V = P(2.25/2.5) = P * 0.9
    windSpeed = rotations * 0.9*1.0609;
    rotations = 0;
    txState = !txState;         // toggle the led state
    isSampleRequired = true;
    timerCount = 0;
  }
  
}

// interrupt handler to increment the rotation count for wind speed
void isr_rotation ()   {

  if ((millis() - contactBounceTime) > 15 ) {  // debounce the switch contact.
    rotations++;
    contactBounceTime = millis();
  }
}

// Interrupt handler routine that is triggered when the rg-11 detects rain
void isr_rg() {

  if((millis() - contactTime) > 15 ) { // debounce of sensor signal
    tipCount++;
    totalRainfall = tipCount * Bucket_Size;
    contactTime = millis();
  }
}

// Get Wind Direction
void getWindDirection() {
 
   vaneValue = analogRead(WindVane_Pin);
   vaneDirection = map(vaneValue, 0, 1023, 0, 360);
   calDirection = vaneDirection + VaneOffset;
   
   if(calDirection > 360)
     calDirection = calDirection - 360;
     
   if(calDirection < 0)
     calDirection = calDirection + 360;
}
