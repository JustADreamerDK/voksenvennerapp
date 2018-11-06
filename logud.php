<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        header('location:index.php');
        ?>
    </body>
</html>
