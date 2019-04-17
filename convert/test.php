<?php

$img = new \Imagick();
$img->setResolution(300, 300);
$img->readImage($_SERVER['DOCUMENT_ROOT'] . '/test/index.pdf');
$num_pages = $img->getNumberImages();
$img->setImageCompressionQuality(100);

for ($i = 0; $i < $num_pages; $i++) {
    $img->setIteratorIndex($i);
    $img->setImageFormat('jpeg');
    $img->writeImage(__DIR__."/save/img/".($i+1).'-'.rand().'.jpg');
}

$img->destroy();
?>