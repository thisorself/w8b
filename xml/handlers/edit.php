<?php
$errors = [];

$index = $_GET['index'];

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

    $estate = $dom_xml->getElementsByTagName('estate')[$index];

    $estate->getElementsByTagName('type')[0]->nodeValue = $type;
    $estate->getElementsByTagName('location')[0]->nodeValue = $location;
    $estate->getElementsByTagName('price')[0]->nodeValue = $price;

    $dom_xml->save('../real_estate.xml');

    echo "Змiни успiшно збережно!";
}

?>