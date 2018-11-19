<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
$bruger = getUserById($id);
$row = mysqli_fetch_assoc($bruger);

$venskabsId = $row['venskab_id'];
$day = getDayById($venskabsId);
$dayTest = getDayById($venskabsId);
$rowDayTest = mysqli_fetch_assoc($dayTest);
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
        <?php if ($rowDayTest['id'] <> ''){ ?>
            <?php while ($rowDay = mysqli_fetch_assoc($day)) {
                ?>
                <div class="special w-80 m-t-50 p-25">
                    <div class="flex between w-100">
                        <div>
                            <h3 class="bold"><?php echo $rowDay['overskrift']; ?></h3>
                        </div>
                        <div class="flex">
                            <h3><?php echo $rowDay['dato']; ?></h3>
                            <h3 class="p-l-30">
                                <a href="">⋮</a>
                            </h3>
                        </div>
                    </div>
                    <img class="w-100 m-t-10" src="img/zoo.jpg">
                    <p><?php echo $rowDay['beskrivelse']; ?></p>
                    <h4 class="m-t-10">
                        <a href="">Læs mere...<a>
                        </h4>
                    </div>
                    <?php
                }
            }else{
                ?>
                <h2 class="m-t-half">Tilføj en dag</h2>
                <img class="m-t-50" src="img/head.png">
            <?php } ?>
            <?php if ($type == 2 || $type == 3) {
                ?>
                <a href="tilfoej-dag.php"><button class="tilfoej">+</button></a>
            <?php } ?>
        </section>
        <script src="javascript/script.js"></script>
    </body>
    </html>
