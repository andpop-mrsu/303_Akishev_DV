<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>РЕДАКТИРОВАНИЕ</title>
</head>

<body>

<?php
$pdo = new PDO('sqlite:../data/students.db');
$query1 = "select group_number from group_numbers_directory;";
$statement = $pdo->query($query1);
$rows = $statement->fetchAll();
$groups = $rows;
$statement->closeCursor();

$student_id = $_GET['student_id'];
$query2 = "select students.id, groups.group_on_course, students.surname, students.name, students.patronymic, students.gender, students.birthday from students join groups on students.id = groups.student_id where students.id = {$student_id};";
$statement = $pdo->query($query2);
$rows = $statement->fetchAll();
$student = $rows;
$statement->closeCursor();
?>

<form action="index.php">
        <button type="submit" style="height:40px;width:100px">В меню</button>
</form><br>

<form method="post" action="edit_student.php" enctype="application/x-www-form-urlencoded">
    <fieldset>
    <legend><h2>Информация о студенте</h2></legend>
        <h3>Студенческий билет:
            <select style="width: 200px;" name = "id">
            <?php foreach ($student as $row) { ?>
                <option value= <?= $row['id']  ?>>
                    <?= $row['id'] ?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Группа:
            <select style="width: 200px;" name = "group_number">
            <option value="" disabled selected><?=$student[0]['group_on_course']?>
            </option>
            <?php foreach ($groups as $row) { ?>
                <option value= <?= $row['group_number'] ?>>
                    <?= $row['group_number'] ?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Фамилия:
            <input required class = "text_input" type="text" name="surname" placeholder = <?=$student[0]['surname']?> value=""><br>
        </h3>
        <hr>
        <h3>Имя:
            <input required class = "text_input" type="text" name="name" placeholder = <?=$student[0]['name']?> value=""><br>
        </h3>
        <hr>
        <h3>Отчество:
            <input required class = "text_input" type="text" name="patronymic" placeholder = <?=$student[0]['patronymic']?> value=""><br>
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

    <p><button style="height:60px;width:120px"><h4>Редактировать<h4></button></p>

</form>
</body>
</html>