from machine import Pin, PWM

red = PWM(Pin(17,mode=Pin.OUT))
green = PWM(Pin(18,mode=Pin.OUT))
blue = PWM(Pin(19,mode=Pin.OUT)) 
red.freq(1_000)
green.freq(1_000)
blue.freq(1_000)

def set_color (r, g, b) :
    red.duty_u16(r*(65535/255))
    green.duty_u16(g*(65535/255))
    blue.duty_u16(b*(65535/255))