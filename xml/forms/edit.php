<?php
$dom_xml = new DOMDocument();
$dom_xml->load('../real_estate.xml');

$index = $_GET['index'];
$estate = $dom_xml->getElementsByTagName('estate')[$index];
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <title>Каталог рієлтора</title>
</head>

<body>
    <form action="../handlers/edit.php?index=<?php echo $index?>" method="POST">
        Тип нерухомостi : <input type="text" name="type" value="<?php echo $estate->getElementsByTagName('type')[0]->nodeValue ?>" required><br>
        Мiсцезнаходження: <input type="text" name="location" value="<?php echo $estate->getElementsByTagName('location')[0]->nodeValue ?>" required><br>
        Цiна: <input type="number" name="price" value="<?php echo $estate->getElementsByTagName('price')[0]->nodeValue ?>" required><br>
        <input type="submit" value="Зберегти змiну">
    </form>

    <a href="add.php">Додати в XML</a>
    <a href="../../index.php">Повернутися</a>
</body>

</html>