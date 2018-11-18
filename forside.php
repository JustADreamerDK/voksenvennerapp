<?php
session_start();
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Børns Voksenvenner</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body>
    <?php
    include "include/header.php";
    ?>
    <section class="flex-column center">
        <h2 class="m-t-half">Tilføj en dag</h2>

        <img class="m-t-50" src="img/head.png">
        <a href="tilfoej-dag.php"><button class="tilfoej">+</button></a>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
