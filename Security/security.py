import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)

PIR = 5
Buzz = 24
Led = 15
GPIO.setup(PIR, GPIO.IN) #PIR
GPIO.setup(Buzz, GPIO.OUT) #BUzzer
GPIO.setup(Led, GPIO.OUT) #led

try:
    time.sleep(2) # to stabilize sensor
    while True:
        if GPIO.input(PIR):
            GPIO.output(Buzz, True)
            GPIO.output(Led, True)
            time.sleep(0.5) #Buzzer turns on for 0.5 sec
            GPIO.output(Led, False)
            print("Motion Detected...")
            time.sleep(1) #to avoid multiple detection
        else:
            GPIO.output(Buzz, False)
            print("Safe")

        time.sleep(0.1) #loop delay, should be less than detection delay

except:
    GPIO.cleanup()