import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(29,GPIO.OUT)
print ("LED on")
GPIO.output(29,GPIO.HIGH)
time.sleep(3)
print ("LED off")
GPIO.output(29,GPIO.LOW)
