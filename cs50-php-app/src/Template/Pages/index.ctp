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

</body>
</html>
