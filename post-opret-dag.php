<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
include "phpcode/file-upload.php";
$id = $_SESSION['id'];
$bruger = getUserById($id);
$row = mysqli_fetch_assoc($bruger);
$dato = $_POST['dato'];
$sted = $_POST['sted'];
$overskrift = $_POST['overskrift'];
$billed = $_REQUEST['image'];
// $billed = str_replace(" ", "_", $billed);
// $billed = str_replace("æ", "ae", $billed);
// $billed = str_replace("ø", "oe", $billed);
// $billed = str_replace("å", "aa", $billed);
// $billed = strtolower("$billed");
$om = $_POST['om'];
$venskab_id = $row['venskab_id'];
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
        <h2>
        <?php
        echo $dato . '-';
        echo $sted . '-';
        echo $overskrift . '-';
        echo $billed . '-';
        echo $om . $venskab_id;

        createDay($dato, $sted, $overskrift, $om, $venskab_id);
         ?>
     </h2>

<?php


                 /*
                   Ved fil upload benyttes en anden Super global variabel
                   denne hedder $_FILES

                   Som ved GET og POST er denne ligeledes et associative array

                   Ved $_FILES arbejder vi stadigvæk ud fra, at det vi angiver
                   i "name" attributten i formen,
                   er den "key" vi får i vores associative array, på PHP siden.

                   Den adskiller sig fra $_GET og $_POST, hvor vi kender til at disses keys
                   peger på den værdi der står i feltet for de enkelte felter i formen.

                   Ved $_FILES er værdien endnu et associative array, som opbygges af PHP for os.

                   Vi vil her få:

                   ['key angivet i name attribut'] => [
                   ['name'] => ['den uploadede fils navn'],
                   ['type'] => ['den uploadede fils type'],
                   ['tmp_name] => ['filens midlertidige placering på vores server'],
                   ['error'] => ['er der sket nogen fejl ved overførslen'],
                   ['size'] => ['filens størrelse'],
                   ]
                  */

                 /*
                   Vi kan se på hvad der bliver sendt med formen
                   igennem denne var_dump
                  */

                  // echo '<pre>';
                  //  var_dump($_FILES);
                  //  echo '</pre>';
                  //  die();

                 /*
                   Vi skaber en konfiguration til vores image uploder

                   Her angiver vi først vores upload mappe

                   Dernæst skaber vi et associative array.
                   Vi benytter keyen i dette associative array, til at
                   angive et prefix til vores billede

                   Et prefix er et ord/navn man sætter foran noget.
                   I dette tilfælde vil vi gerne benytte det til at
                   adskille vores billedstørrelser i filnavnene,
                   således at thumbnails, får dette ord foran i filnavnet

                   Efterfølgende fortælle vi den nye vidde på billedet.

                   !! Bemærk at vi i dette tilfælde kun angiver vidden, således
                   at højden sættes igennem scriptet så vi beholder vores aspect ratio !!

                  */

                 $pathToFileFolder = 'img/';

                 $size = [
                     'picture' => 1000,
                 ];

                 /*
                   Vi er nu klar til at gemme og resize filen vi har modtaget, til de størrelser
                   vi har angivet i vores sizes array.

                   Vi giver functionen den præcise fil, altså den vi har modtaget igennem name = image
                   fra formen, i den første parameter.

                   Vi angiver hvor vi vil have vores billeder til at blive gemt, i anden parameter

                   Vi angiver vores sizes array i den sidste parameter

                   Vores uploadAndResizeImage function returnerer et array,
                   med stierne til de forskellige størrelser angivet i vores
                   sizes associative array, således at vi efterfølgende kan bruge
                   disse i vores database.

                   Vi smider resultatet i en variabel og udskriver dette i en print_r
                   for at se om resultatet er som det skal være
                  */

                 $uploadedFilePaths = uploadAndResizeImage($_FILES['image'], $pathToFileFolder, $size);

     //        if (count($uploadedFilePaths) > 0) {
     //            echo "<pre>";
     //
     //            print_r($uploadedFilePaths);
     //
     //            echo "<pre>";
     //        }

                 $picture = array_values($uploadedFilePaths)[0];
                 $explode_picture = explode("/", $picture);

                 $picturen = $explode_picture[1];



                 // break;
         ?>




    </section>
</body>
</html>
