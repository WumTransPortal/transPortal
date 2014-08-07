import urllib2,subprocess, string, sys, os, qrscan, signal
import RPi.GPIO as gpio
from time import sleep
from random import choice

gpio.setmode(gpio.BCM)

#red LED
gpio.setup(28, gpio.OUT)
#green LED
gpio.setup(30, gpio.OUT)
#button
gpio.setup(31, gpio.IN, pull_up_down = gpio.PUD_DOWN)


#several helper-functions for basic utility

#turn red LED on or off
def red(val):
  gpio.output(28, val)

#turn green LED on of off
def green(val):
  gpio.output(30, val)

#turn device on
def on(device):
  urllib2.urlopen("http://localhost:8083/fhem?cmd=set%20"+device+"_Sw%20on")

#turn device off, not needed right now
#def off(device):
#  urllib2.urlopen("http://localhost:8083/fhem?cmd=set%20"+device+"_Sw%20off")

#let the red LED blink amount-times with delay seconds between each on/off
def blinkRed(amount, delay):
  for i in range(0, amount):
    sleep(delay)
    red(1)
    sleep(delay)
    red(0)

#same as blinkRed
def blinkGreen(amount, delay):
  for i in range(0, amount):
    sleep(delay)
    green(1)
    sleep(delay)
    green(0)

#same as blinkRed, but both LEDs will blink
def blinkBoth(amount, delay):
  for i in range(0, amount):
    sleep(delay)
    red(1)
    green(1)
    sleep(delay)
    green(0)
    red(0)

#handler-function for the qr-code reading with a timeout
def signal_handler(signum, frame):
  raise Exception("Timed out!")


def main():
  #the try-block is used to properly shut down this program if a user interrupts it
  try:
    #turn on the green LED and turn off the red LED - turning off the red LED was 
    #necessary due to a bug where both LEDs would turn on at the start
    green(0)
    red(0)

    #main loop 
    while 1:
      
      #a permanently on green LED signals the system is running and ready to use
      green(1)


      #if the button is pressed...
      if(gpio.input(31)):
        #...blink green thrice...
        blinkGreen(3, 0.2)
	#...and start reading the qr-code
	print("Reading QR-Code")
	
	#a timeout handler so the program isn't soft locked in the reading-action
	#reading the qr-code conumses unnecessary amounts of energy as the RPi cpu 
	#is at almost 100% during a read and the webcam is turned on as well
	signal.signal(signal.SIGALRM, signal_handler)
	signal.alarm(10)
	
	#try reading the qr-code within 10 seconds
	try:
	  #if the read is successful the returned string will be stripped off 
	  #of all whitespaces at the start and beginning and will be split 
	  #at whitespace-characters
	  qr = qrscan.read().strip().split()

	
	except Exception, msg:
	  #if the read is not successful the zbarcam process will be killed
	  #and the user will be notified by a blinking red LED
	  #afterwards the program returns to looping into infinity
	  p = subprocess.Popen(['ps', '-A'], stdout=subprocess.PIPE)
	  out, err = p.communicate()
	  for line in out.splitlines():
	    if 'zbarcam' in line:
	      pid = int(line.split(None, 1)[0])
	      os.kill(pid, signal.SIGKILL)
	  print(msg)
	  blinkRed(3, 0.2)
	  continue

	finally:
	  #if the QR-code is read successfully the alarm will be turned off
	  signal.alarm(0)
	
	print(qr)

        #if the QR-code does not conist of three parts the program will return to
	#its while loop
	if len(qr) != 3:
	  blinkRed(1, 3)
	  sleep(3)
          continue


	#####
	#####
	##### TODO!
	#####
	#####
	#reply = urllib2.urlopen("<url>"string.replace(r, " ", "&"))
	reply = choice(["bla","true", "false", "old"])
	
	#if the user is allowed to use the requsted device and the QR-code
	#did not time out the device will be turned on the user wlil be notified 
	#by the green LED being on for 3s
	if reply == "true":
	  #on(qr[1])
	  blinkGreen(1,3)
	  sleep(3)

	#if the user is not allowed to use the device he will be notified by 
	#the red LED being on for 3s
	elif reply == "false":
	  blinkRed(1,3)
	  sleep(3)

	#if the user is allowed to use the requested device but the QR-code timed out
	#the user will be notified by both LEDs being on for 3s
	elif reply == "old":
	  blinkBoth(1,3)
	  sleep(3)
	
	#if the reply from the server doesn't match one of the three options above
	#something went wrong and both LEDs will blink 10 times
	else:
	  blinkBoth(10, 0.2)
	  sleep(3)
	  

  #controlled shutdown of the program
  except (KeyboardInterrupt, SystemExit):
    print("Stopping now...")
    gpio.cleanup()
    sys.exit()



main()
