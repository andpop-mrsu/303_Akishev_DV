<?php
$pdo = new PDO('sqlite:../data/students.db');

$query = "insert into session_results(student_id, subject_id, point) values(:student_id, :subject_id, :point);";
$ins = $pdo->prepare($query);
    $ins->execute([
        ':student_id'=> $_POST["id"],
        ':subject_id' => $_POST["s_id"],
        ':point' => $_POST["point"],
    ]);
?>

<!DOCTYPE html>
<html lang="en">
    <body align="center"><br><br>
        <h2>РЕЗУЛЬТАТ СЕССИИ ДОБАВЛЕН<h2><br>
        <form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
            <p><button style="height:100px;width:200px"><h2>В меню</h2></button></p>
        </form>
    </body>
</html>