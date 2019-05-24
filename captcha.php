<?php

session_start();

$random = rand(1000, 9999);
$_SESSION['random_check'] = md5($random);

$img = imagecreatetruecolor(702, 40);
$text_color = imagecolorallocate($img, 233, 14, 91);
imagestring($img, 5, 20, 10,  $random, $text_color);

header('Content-Type: image/png');

imagepng($img);

imagedestroy($img);