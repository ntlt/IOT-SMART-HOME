import Adafruit_DHT
import time
import RPi.GPIO as GPIO
import mysql.connector
mydb = mysql.connector.connect( host='localhost', user='root', passwd='new_password', database='temp')

GPIO.setmode(GPIO.BCM)
sensor = Adafruit_DHT.DHT11
DHT = 16
Led = 15
Buzz = 24
while True:
    humidity, temperature = Adafruit_DHT.read_retry(sensor, DHT)
    print('Temp:{0:0.1f}*c  Humidity:{1:0.2f}%'.format(temperature, humidity))

    if temperature>34:
            GPIO.output(Buzz, True)
            GPIO.output(Led, True)
            time.sleep(0.5) #Buzzer turns on for 0.5 sec
            GPIO.output(Led, False)
            con = "Fire Detected..."
            print(con)
            time.sleep(1) #to avoid multiple detection
    else:
            GPIO.output(Buzz, False)
            con = "Safe"
            print(con)

    mycursor = mydb.cursor()
    sql = "INSERT INTO temp (temperature, humidity, con) VALUES (%s, %s, %s)"
    val =(temperature, humidity, con)
    mycursor.execute(sql, val)
    mydb.commit()

    time.sleep(0.1) #loop delay, should be less than detection delay