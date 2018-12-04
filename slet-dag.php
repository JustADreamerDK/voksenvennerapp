<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$day = getDay($id);
$rowDay = mysqli_fetch_assoc($day)
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
    <section class="flex-column p-lr-30">
        <h2 class="m-t-50">Er du sikker på at du vil slette denne dag?</h2>

            <div class="flex between w-100 m-t-10">
                <div>
                    <h3 class="bold"><?php echo $rowDay['overskrift']; ?></h3>
                </div>
                <div class="flex">
                    <h3><?php echo $rowDay['dato']; ?></h3>
                </div>
            </div>
            <div class="flex-column right">
                <ul class="minimenu">
                    <li><a href=""><h3>Download</h3></a></li>
                    <li><a href="rediger-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Rediger</h3></a></li>
                    <li><a href="slet-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Slet</h3></a></li>
                </ul>
            </div>
            <?php $dagId = $rowDay['id'];
            $billederne = getPictures($dagId);
            $rowPic = mysqli_fetch_assoc($billederne);
                ?>
                <img class="w-100 m-t-10 slide" src="img/<?php echo $rowPic['filnavn'] ?>">
            <p><?php echo $rowDay['beskrivelse']; ?></p>

            <div class="flex between m-t-50 w-100">
                <a href="post-slet-dag.php?id=<?php echo $id; ?>"><h2>Ja</h2></a>
                <a href="forside.php"><h2>Nej</h2></a>
            </div>

    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
