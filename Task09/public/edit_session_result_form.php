<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>РЕДАКТИРОВАНИЕ</title>
</head>

<body>

<?php
$pdo = new PDO('sqlite:../data/students.db');
$res_id = $_GET['res_id'];
$query1 = "select session_results.id, subjects.subject from session_results join subjects on session_results.subject_id = subjects.id where session_results.id = {$res_id};";
$statement = $pdo->query($query1);
$rows = $statement->fetchAll();
$subjects = $rows;
$statement->closeCursor();
?>

<form action="index.php">
        <button type="submit" style="height:40px;width:100px">В меню</button>
</form><br>

<form method="post" action="edit_session_result.php" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <h3>Дисциплина:
            <select style="width: 200px;" name = "id">
            <?php foreach ($subjects as $row) { ?>
                <option value= <?= $row['id']." ".$row['subject']  ?>>
                    <?= $row['id']." ".$row['subject']  ?>
                </option>
            <?php } ?>
            </select>
        </h3>
        <hr>
        <h3>Балл:
            <input type="number" min="0" max="100" name="point" value=""><br>
        </h3>
    </fieldset>

    <p><button style="height:60px;width:120px"><h4>Редактировать<h4></button></p>

</form>
</body>
</html>