import network   #import des fonction lier au wifi
import urequests	#import des fonction lier au requetes http
import utime	#import des fonction lier au temps
import ujson	#import des fonction lier aà la convertion en Json
from set_color import *
from dict_tag import *

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'ORBI86'
password = 'grandvase860'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://localhost/Site/IOT/getTweet.php"
url2 = "http://localhost/Site/IOT/postTweet.php"

Pin_Boutton = Pin(17, mode=Pin.IN, pull=Pin.PULL_UP)

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

print("GET")
r = urequests.get(url) # lance une requete sur l'url
answer = r.json()["tweet_tag"]
print(answer) # traite sa reponse en Json
for w in tag :
    while answer ==  w :
        set_color(tag[w][0], tag[w][1], tag[w][2])
        
r.close() # ferme la demande
utime.sleep(1)

while True: 
    if(Pin_Boutton.value() == 0 and appuie == 1): 
        r = urequests.get(url2)
    appuie = Pin_Boutton.value()

    r.close() # ferme la demande
    utime.sleep(1)



