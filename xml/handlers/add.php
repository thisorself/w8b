<?php

include '../../table.php';

$errors = [];

$type = $_POST['type'];
if (empty($type)) {
    $errors[] = "Поле 'Тип нерухомостi' не може бути пустим!<br>";
}

$location = $_POST['location'];
if (empty($location)) {
    $errors[] = "Поле 'Мiсцезнаходження' не може бути пустим!<br>";
}

$price = $_POST['price'];
if (empty($price)) {
    $errors[] = "Поле 'Цiна' не може бути пустим!<br>";
}
if ($price < 0) {
    $errors[] = "Поле 'Цiна' не може бути вiд'емним!<br>";
}

if ($errors) {
    foreach ($errors as $error) {
        echo $error;
    }
}
else {
    $dom_xml = new DOMDocument();
    $dom_xml->load('../real_estate.xml');

    $new_estate = $dom_xml->createElement('estate');
    $new_estate->appendChild($dom_xml->createElement('type', $type));
    $new_estate->appendChild($dom_xml->createElement('location', $location));
    $new_estate->appendChild($dom_xml->createElement('price', $price));

    $realestate = $dom_xml->getElementsByTagName('realestate')->item(0);
    $realestate->appendChild($new_estate);

    $dom_xml->save('../real_estate.xml');
    echo "Данi про нерухомiсть успiшно доданi!";
}

?>