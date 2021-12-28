<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ДОБАВЛЕНИЕ НОВОГО РЕЗУЛЬТАТА СЕССИИ</title>
</head>

<body>

<?php
$pdo = new PDO('sqlite:../data/students.db');

$course = array();
for($i = 1; $i <= $_POST['group_on_course'][0]; $i++ ) {
    array_push($course, $i);
}
$query = "select students.id, students.surname, students.name from students join groups on students.id = groups.student_id where groups.group_on_course = :number;";
$students = $pdo->prepare($query);
$students->execute([
    ':number'=> $_POST["group_on_course"],
]);
?>

<form action="index.php">
        <button type="submit" style="height:40px;width:100px">В меню</button>
</form><br>

<form method="post" action="new_session_result_form_subject.php" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <h3>Студент:
            <select style="width: 200px;" name = "id">
            <?php foreach ($students as $row) { ?>
                <option value= <?= $row['id']." ".$row['surname']." ".$row['name'] ?>>
                    <?= $row['id']." ".$row['surname']." ".$row['name'] ?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Курс:
            <select style="width: 200px;" name = "course">
            <?php foreach ($course as $row) { ?>
                <option value= <?= $row ?>>
                    <?= $row?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Семестр:
            <li><input required class="radio_b" type="radio" name="semester" value="1"> 1</li>
            <li><input required class="radio_b" type="radio" name="semester" value="2"> 2</li>
        </h3>
    </fieldset>

    <p><button style="height:60px;width:100px"><h4>Выбрать<h4></button></p>

</form>
</body>
</html>