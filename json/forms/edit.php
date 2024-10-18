<?php
    $realestate_path = "../real_estate.json";
    $realestate_content = file_get_contents($realestate_path);
    $realestate_json = json_decode($realestate_content, true)["realestate"];

$index = $_GET['index'];
$estate = $realestate_json[$index];
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <title>Каталог рієлтора</title>
</head>

<body>
    <form action="../handlers/edit.php?index=<?php echo $index?>" method="POST">
        Тип нерухомостi : <input type="text" name="type" value="<?php echo $estate['type'] ?>" required><br>
        Мiсцезнаходження: <input type="text" name="location" value="<?php echo $estate['location'] ?>" required><br>
        Цiна: <input type="number" name="price" value="<?php echo $estate['price'] ?>" required><br>
        <input type="submit" value="Зберегти змiну">
    </form>

    <a href="add.php">Додати в JSON</a>
    <a href="../../index.php">Повернутися</a>
</body>

</html>