# Arduino Sample Code
Sample code for demonstrating simple data logging from DS18B20 Temperature Sensor and Analog photoresistor

Arduino UNO has both digital and analog input pins so we can just connect the sensors appropriate without any additional ADCs.

**Libraries** - This directory contains the necessary libraries for interfacing with the sensors

Place Arduino OneWire and dtc Library Folders in <your-path-to-Arduino-Directory>\libraries directory

**ArduinoSensorCodeDBEthnt** - This Arduino sketch sends HTTP GET requests to the Simple IoT platform via the RESTful API.

## Configure Server and IP Address
```C
har server[] = "cs50-final.mikevartanian.me";
byte mac[] = {  0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 };

// Note that this value needs to be set each time the router assigns a different address via DHCP
IPAddress ip(192,168,1,75);
```
Note that the IP address is dependant on the users address given via DHCP

# Arduino UNO R3 Hardware Setup

![alt text](Arduino-Images/ArduinoUNOR3-lighttempsensor-bb.png "Fritzing drawing of the Arduino UNO R3 connected to breadboard with light and temperature sensors")
![alt text](Arduino-Images/ArduinoUNOR3-lighttempsensor-photo.png "Photo of the Arduino UNO R3 connected to breadboard with light and temperature sensors")

# Tools / Software Used

For these examples, I was using an Arduino UNO R3 with an Ethernet shield with Arduino IDE 1.6.7 from https://www.arduino.cc/en/main/software running on a Windows 10 64 bit Dell Inspiron 13 7000 Series
