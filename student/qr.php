<?php
header('Content-Type: image/png');
//use Endroid\QrCode\QrCode;
require_once 'vendor/autoload.php';

if(isset($_GET['text'])) {
	$size = isset($_GET['size'])? $_GET['size'] : 200;
	$padding = isset($_GET['padding'])? $_GET['padding'] : 10;

$qrc = new Endroid\QrCode\QrCode();

//$qrc->setText("Bolade");
//$qrc->setText("Bode");
$qrc->setText($_GET['text']);
$qrc->setSize($size);
$qrc->setPadding($padding);
$qrc->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
$qrc->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
//$qrCode->setRoundBlockSize(true);

$qrc->render();

}
?>