<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ДОБАВЛЕНИЕ НОВОГО СТУДЕНТА</title>
</head>

<body>

<?php
$pdo = new PDO('sqlite:../data/students.db');
$query = "select group_number from group_numbers_directory;";
$statement = $pdo->query($query);
$rows = $statement->fetchAll();
$groups = $rows;
$statement->closeCursor();
?>

<form action="index.php">
        <button type="submit" style="height:40px;width:100px">В меню</button>
</form><br>

<form method="post" action="new_student.php" enctype="application/x-www-form-urlencoded">
    <fieldset>
    <legend><h2>Информация о студенте</h2></legend>
        <h3>Группа:
            <select style="width: 200px;" name = "group_number">
            <?php foreach ($groups as $row) { ?>
                <option value= <?= $row['group_number'] ?>>
                    <?= $row['group_number'] ?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Фамилия:
            <input required class = "text_input" type="text" name="surname" value=""><br>
        </h3>
        <hr>
        <h3>Имя:
            <input required class = "text_input" type="text" name="name" value=""><br>
        </h3>
        <hr>
        <h3>Отчество:
            <input required class = "text_input" type="text" name="patronymic" value=""><br>
        </h3>
        <hr>
        <h3>Пол:
            <li><input required class="radio_b" type="radio" name="gender" value="male"> Мужской</li>
            <li><input required class="radio_b" type="radio" name="gender" value="female"> Женский</li>
        </h3>
        <hr>
        <h3>Дата рождения:
            <input required class = "date_birth" type="date" name="birthday" value=""><br>
        </h3>
    </fieldset>

    <p><button style="height:60px;width:100px"><h4>Добавить<h4></button></p>

</form>
</body>
</html>