<?php
include('libs/FileData.php');
include('config.php');

$file = new FileData();
$data = $file->getRow(path);
$getStringFromFile = $file->readStringFile(path,5);
$getCurrentDigit = $file->getByDigit(path,5,8);
$stringChange = $file->changeStringFile(path,5,'Build responsive, mobile-first projects on the web with the ');
$symbolChange = $file->changeDigitInFileByStringNumber(path,5,22,'###');
$showFileByString = $file->showByStringData(path);
$showFileByDigits  = $file->showByDigitsData(path);
$file->save(path);

include('template/index.php');
?>