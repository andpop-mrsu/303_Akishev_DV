<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ДОБАВЛЕНИЕ НОВОГО РЕЗУЛЬТАТА СЕССИИ</title>
</head>

<body>

<?php
$pdo = new PDO('sqlite:../data/students.db');
$query = "select distinct group_on_course from groups join admission on admission.student_id = groups.student_id where cast(round((julianday('now') - julianday(admission.date))/360 + 1) as integer) < 5;";
$statement = $pdo->query($query);
$rows = $statement->fetchAll();
$groups = $rows;
$statement->closeCursor();
?>

<form action="index.php">
        <button type="submit" style="height:40px;width:100px">В меню</button>
</form><br>

<form method="post" action="new_session_result_form_student_and_course.php" enctype="application/x-www-form-urlencoded">
    <fieldset>
    <legend><h2>Группа</h2></legend>
        <h3>Группа:
            <select style="width: 200px;" name = "group_on_course">
            <?php foreach ($groups as $row) { ?>
                <option value= <?= $row['group_on_course'] ?>>
                    <?= $row['group_on_course'] ?>
                </option>
            <?php } ?>
            </select>
        </h3>
    </fieldset>

    <p><button style="height:60px;width:100px"><h4>Выбрать<h4></button></p>

</form>
</body>
</html>