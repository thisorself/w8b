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
    $realestate_path = "../real_estate.json";
    $realestate_content = file_get_contents($realestate_path);
    $realestate_json = json_decode($realestate_content, true)["realestate"];

    $estate = $realestate_json[$index];

    $estate['type'] = $type;
    $estate['location'] = $location;
    $estate['price'] = $price;

    $realestate_json[$index] = $estate;
    $updated_content = json_encode($realestate_json);
    file_put_contents($realestate_path, $updated_content);

    echo "Змiни успiшно збережно!";
}

?>