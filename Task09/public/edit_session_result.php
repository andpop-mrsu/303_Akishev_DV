<?php
$pdo = new PDO('sqlite:../data/students.db');

$query = "update session_results set point = :point where id = :id;";
$ins = $pdo->prepare($query);
$ins->execute([
    ':point' => $_POST["point"],
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