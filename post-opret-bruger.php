<?php
$fornavn = $_POST['fornavn'];
$efternavn = $_POST['efternavn'];
$nummer = $_POST['tlf'];
$email = $_POST['email'];
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
$brugertype = $_POST['brugertype'];
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
<body class="special">
    <section class="flex-column center">
        <img class="m-100 w-80" src="img/logo.png">
        <h3>
            <?php
            echo $fornavn ."<br>". $efternavn ."<br>". $nummer ."<br>". $email ."<br>". $brugernavn ."<br>". $password ."<br>". $brugertype;
            ?>
        </h3>
    </section>
</body>
</html>
