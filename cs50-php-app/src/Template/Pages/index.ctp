<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('slideshow.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <h1 class="text-center">CS50 Internet of Things Sensor Data Project</h1>
    <h3 class="text-center">Basic Concept</h3>
    <div class="slideshow">
        <p> For my CS50 final project, I created a very simple Internet of Things (IoT) Platform that can read in data
            from embedded devices such as Arduino and Raspberry Pi as well as mobile devices such as an iPhone.</p>
    </div>
    <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <?= $this->Html->image('arduino-ethernet.jpg', ['class' => 'width100pct'])?>
          <div class="text">Arduino UNO with Ethernet Shield</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <?= $this->Html->image('raspberrypi-wifi.jpg', ['class' => 'width100pct'])?>
          <div class="text">Raspberry Pi B with WiFi Dongle</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <?= $this->Html->image('EdisonAndDragonboard.jpg', ['class' => 'width100pct'])?>
          <div class="text">Intel Edison and Dragonboard 410c</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    
    <?= $this->Html->script('slideshow'); ?>
    <h3 class="text-center">Next Steps</h3>
        <div class="slideshow">
            <p> The site currently is able to log data from sensors via embedded development boards such as the Arduino UNO and Raspberry as well as simulated data from iOS devices. The site, however, is far from complete. The major tasks still remaining are:</p>
            <ul class="left-list-style">
                <li>Additional Embedded Devices and Sensors</li>
                    <p class="slideshow">The current setup utilizes a temperature sensor and a photoresistor which measures the temperature (obviously) and the ambient light. Other sensors such as humidity, ambient noise (microphone), vibration, and hall effect to name a few would be useful to have readily available.</p>
                <li>Device Authentication</li>
                    <p class="slideshow">The code on the embedded devices currently just send data to the site's RESTFUL API with no authentication. Users need to be authenticated to login to the the site but the data sent has no verification. I was thinking about using JWTs to achieve this but could not figure out how to do this in time. There is also no user information resident on the embedded development boards so user and device identifiers are manually hardcoded which could lead to problems.</p>
                <li>Rules and Triggers</li>
                    <p class="slideshow">The data from the sensors is stored in a MySQL database and visualized on the site but there are no rules or triggers that does something based on that data. For example, if a temperature value is greater than a threshold, send a text message.</p>
            </ul>
        </div>
</body>
</html>
