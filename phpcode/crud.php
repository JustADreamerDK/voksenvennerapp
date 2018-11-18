<?php

function getFriendships(){
    global $objCon;
    $sql = "SELECT `id`, `venskabs_key` FROM `venskab`";
    $result = $objCon->query($sql);
    return $result;
}

function getFriendshipByCode($code){
    global $objCon;
    $sql = "SELECT `id`, `venskabs_key` FROM `venskab` WHERE `venskabs_key` = '$code'";
    $result = $objCon->query($sql);
    return $result;
}

function getUser($brugernavn){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `brugernavn` = '$brugernavn'";
    $result = $objCon->query($sql);
    return $result;
}

function getUserById($id){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getKidById($id){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `fodselsdag`, `bruger_id` FROM `barn` WHERE `bruger_id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getMother($venskabsId){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `venskab_id` = '$venskabsId' AND `brugertype_id` = '3'";
    $result = $objCon->query($sql);
    return $result;
}

function getVen($venskabsId, $type){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `venskab_id` = '$venskabsId' AND `brugertype_id` <> $type";
    $result = $objCon->query($sql);
    return $result;
}

function createUser($fornavn, $efternavn, $telefonnr, $mail, $brugernavn, $password, $brugertype_id, $venskab_id){
    global $objCon;
    $sql = "INSERT INTO `bruger`(`fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id`) VALUES ('$fornavn', '$efternavn', '$telefonnr', '$mail', '$brugernavn', '$password', '$brugertype_id', '$venskab_id')";
    $result = $objCon->query($sql);
    return $result;
}

function createVenskab($venskabsId){
    global $objCon;
    $sql = "INSERT INTO `venskab`(`venskabs_key`) VALUES ('$venskabsId')";
    $result = $objCon->query($sql);
    return $result;
}

?>
