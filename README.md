![Emergency Email Server Logo](https://github.com/km4ack/EES-LITE/blob/master/ees-lite-logo1.png)
# Emergency Email Server Lite 

Winlink Emergency Email Server Lite for Raspberry Pi

## If you find this code useful, consider donating https://www.paypal.me/km4ack

Once installed, this code will allow anyone with a wireless device and in range to connect to your raspberry pi and compose an email. Once composed and submitted, the email is moved to your Pat Winlink Outbox where it can be reviewed before being sent over RF using either packet or ARDOP. If you choose to allow replies back into the system, you will be able to post those replies to a webpage where the end user can search/view their replies.

### Requirements:

apache web server - Covered in the installation video

php7 - Covered in the installation video

Pat Winlink https://www.youtube.com/playlist?list=PL1QTYT4Qo9cY98NFmxrTvtGyWI9pgxtFq

Pi Hotspot https://youtu.be/QZtAOLcY5dY

### Recommended Additions

Progagating Prediction https://youtu.be/jye6JkIPYY0

Finding ARDOP Stations https://youtu.be/Xdp3iovC8ws

### Demo Video - https://youtu.be/XC9vdAnolO0

### Install Video - https://youtu.be/KaEeCq50Mno

## Splash Screen-Optional (added 20190406)
If you installed the EES before April 6, 2019 and would like to add a splash screen for your visitors, run each of the commands below.

    cd /var/www/html
    sudo wget https://raw.githubusercontent.com/km4ack/EES-LITE/master/index.php
    sudo wget https://raw.githubusercontent.com/km4ack/EES-LITE/master/splash.txt
    sudo mv index.html index.html.org
    
If you downloaded on or after April 6, 2019 and would like a splash screen then run each command below.

    cd /var/www/html
    sudo mv index.html index.html.org

After installing the splash screen, if you want to change the splash screen welcome message, edit splash.txt

    sudo nano splash.txt
    
After installing the splash screen, your visitor will see it when they visit your EES at http://pi-ip-addy

## Other Info
default user - admin

default passwd - admin

User webpage - pi-ip-addy/email.php
  
Operator webpage - pi-ip-addy/reply-input.php

#### This code has only been confirmed to install correctly on Stretch. It should work on other distros but the install may differ from the instruction presented in the install video.

73, KM4ACK
