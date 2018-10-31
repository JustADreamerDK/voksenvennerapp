<?php
$kode = $_POST['venskabskode'];
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
            if ($kode <> '') {
                ?>
                <h3 class="w-80 m-10">Så mangler du bare den sidste del, inden du kan få adgang til jeres venskabs kommende billedbank</h3>
                <form  class="w-100 flex-column center" action="post-opret-bruger.php" method="post" class="flex-column">
                    <input class="m-10 w-80" type="text" name="fornavn" placeholder="Fornavn"></input>
                    <input class="m-10 w-80" type="text" name="efternavn" placeholder="Efternavn"></input>
                    <input class="m-10 w-80" type="number" name="tlf" placeholder="Telefon nummer"></input>
                    <input class="m-10 w-80" type="email" name="email" placeholder="Email"></input>
                    <input class="m-10 w-80" type="text" name="brugernavn" placeholder="Brugernavn"></input>
                    <input class="m-10 w-80" type="password" name="password" placeholder="Password"></input>
                    <select class="m-10 w-80" name="brugertype">
                        <option value="">Hvad type bruger er du?</option>
                        <option value="2">Voksenven</option>
                        <option value="3">Forældre</option>
                    </select>
                    <input class="m-10 w-80" type="submit" value="Opret bruger"></input>
                </form>
                <?php
            }else{
                ?>
                <h3>Denne venskabskode findes ikke i systemet</h3>
                <h3>Test om du har skrevet den rigtigt og prøv igen</h3>
                <h3 class="m-10"><a href="index.php">Tilbage</a></h3>
                <?php
            }
            ?>
        </h3>
    </section>
</body>
</html>
