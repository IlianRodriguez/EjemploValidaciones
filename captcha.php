<?php
//captcha.php
session_start();

$random_number = bin2hex(random_bytes(4));
$_SESSION['captcha_code'] = $random_number;

header("Content-type: image/png");
$image = imagecreatetruecolor(80,  30);
$background_color = imagecolorallocate($image, 255, 255, 255); 
$text_color = imagecolorallocate($image, 0, 0, 0); 
$font_size =  14;
$font_file = 'arial.ttf';
$width = ImageFontWidth($font_size) * strlen($random_number);
$height = ImageFontHeight($font_size);
$image_width = 80;
$image_height = 30;
$text_color = imagecolorallocate($image, 0, 0, 0);
$x = ceil(($image_width - $width)/2);
$y = ceil(($image_height - $height)/2);
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $background_color);
ImageString($image, $font_size, $x, $y, $random_number, $text_color);
ImagePNG($image);
ImageDestroy($image);
?>