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
        <?php if ($rowDayTest['id'] <> '' && $type == '2' OR $type =='3'){ ?>
            <?php while ($rowDay = mysqli_fetch_assoc($day)) {
                ?>
                <div class="special w-80 m-t-50 p-25">
                    <div class="flex between w-100">
                        <div>
                            <h3 class="bold"><?php echo $rowDay['overskrift']; ?></h3>
                        </div>
                        <div class="flex">
                            <h3><?php echo $rowDay['dato']; ?></h3>
                            <h3 class="p-l-30" id="aaben">⋮</h3>
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
                    ?>
                    <?php
                    // while (
                        $rowPic = mysqli_fetch_assoc($billederne);
                    // ) {
                        ?>
                        <img class="w-100 m-t-10 " src="img/<?php echo $rowPic['filnavn'] ?>">
                        <?php
                    // }
                    ?>
                    <!-- <div class="button">
                        <button class="slidebutton" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="slidebutton" onclick="plusDivs(1)">&#10095;</button>
                    </div> -->
                    <?php
                    $beskrivelse = mb_substr($rowDay['beskrivelse'], 0, 120, 'UTF-8');
                    $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                    $beskrivelse = mb_substr($rowDay['beskrivelse'], 0, $tal, 'UTF-8');
                    ?>
                    <p><?php echo $beskrivelse . '...' ?></p>
                    <h4 class="m-t-10">
                        <a href="">Læs mere<a>
                        </h4>
                    </div>
                    <?php
                }
            }if ($rowDayTest['id'] == '' && $type == '2' OR $type =='3'){
                        ?>
                        <h2 class="m-t-half">Tilføj en dag</h2>
                        <img class="m-t-50" src="img/head.png">
                    <?php } ?>
                    <?php if ($type == 2 || $type == 3) {
                        ?>
                        <a href="tilfoej-dag.php"><button class="tilfoej">+</button></a>
                    <?php }if($type == '1'){
                        $days = getDays();
                        while ($rowDays = mysqli_fetch_assoc($days)) {
                            ?>
                            <div class="special w-80 m-t-50 p-25">
                                <div class="flex between w-100">
                                    <div>
                                        <h3 class="bold"><?php echo $rowDays['overskrift']; ?></h3>
                                    </div>
                                    <div class="flex">
                                        <h3><?php echo $rowDays['dato']; ?></h3>
                                    </div>
                                </div>
                                <?php $dagsId = $rowDays['id'];
                                $billedernes = getPictures($dagsId);
                                ?>
                                <?php while ($rowPics = mysqli_fetch_assoc($billedernes)) {
                                    ?>
                                    <img class="w-100 m-t-10 slide fade" src="img/<?php echo $rowPics['filnavn'] ?>">
                                    <?php
                                }
                                ?>
                                <div class="button">
                                    <button class="slidebutton" onclick="plusDivs(-1)">&#10094;</button>
                                    <button class="slidebutton" onclick="plusDivs(1)">&#10095;</button>
                                </div>

                                <?php
                                $beskrivelse = mb_substr($rowDays['beskrivelse'], 0, 120, 'UTF-8');
                                $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                                $beskrivelse = mb_substr($rowDays['beskrivelse'], 0, $tal, 'UTF-8');
                                ?>
                                <p><?php echo $beskrivelse . '...' ?></p>
                                <h4 class="m-t-10">
                                    <a href="">Læs mere<a>
                                    </h4>
                                </div>
                                <?php
                            }}
?>
                </section>
                <script src="javascript/script.js"></script>
            </body>
            </html>
