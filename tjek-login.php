<?php
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
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
    <section class="flex-column center">
        <img class="m-100 w-80" src="img/logo.png">
        <h3>
            <?php
            if ($brugernavn <> '' && $password <> '') {
                header("location:forside.php");
            }else{
                ?>
                <h3 class="w-80">Brugeren findes ikke, tjek om du har skrevet dit brugernavn og password korrekt</h3>
                <h3 class="m-10"><a href="login.php">Tilbage</a></h3>s
<?php
            }
            ?>
        </h3>
    </section>
</body>
</html>
