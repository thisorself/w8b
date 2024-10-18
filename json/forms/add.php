<!DOCTYPE html>
<html lang="uk">

<head>
    <title>Каталог рієлтора</title>
</head>


<body>
    <form action="../handlers/add.php" method="POST">
        Тип нерухомостi : <input type="text" name="type" required><br>
        Мiсцезнаходження: <input type="text" name="location" required><br>
        Цiна: <input type="number" name="price" required><br>
        <input type="submit" value="Додати">
    </form>
    <a href="edit.php?index=0">Редагувати JSON</a>
    <a href="read.php">Читати JSON</a>
    <a href="../../index.php">Повернутися</a>
</body>

</html>