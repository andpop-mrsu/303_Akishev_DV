<?php
$pdo = new PDO('sqlite:../data/students.db');

$query1 = "update students set surname = :surname, name = :name, patronymic = :patronymic, gender = :gender, birthday = :birthday where id = :id;";
$ins1 = $pdo->prepare($query1);
$ins1->execute([
    ':surname' => $_POST["surname"],
    ':name' => $_POST["name"],
    ':patronymic' => $_POST["patronymic"],
    ':gender' => $_POST["gender"],
    ':birthday' => $_POST["birthday"],
    ':id' => $_POST["id"],
]);

$query2 = "update groups set group_on_course = :group_number where student_id = :id;";
$ins2 = $pdo->prepare($query2);
$ins2->execute([
    ':group_number' => $_POST["group_number"],
    ':id' => $_POST["id"],
]);
?>

<!DOCTYPE html>
<html lang="en">
    <body align="center"><br><br>
        <h2>Изменено<h2><br>
        <form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
            <p><button style="height:100px;width:200px"><h2>В меню</h2></button></p>
        </form>
    </body>
</html>