<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../libs/connect.php');

mysqli_set_charset($link, "utf8");

header('Location: ../accouting/extradition.php');


$data = @$_POST['data'];
$type = @$_POST['type'];
$quality = @$_POST['quality'];
$quality = -$quality;
$source = @$_POST['source'];
$local = @$_POST['local'];
$query = "
INSERT INTO `roba` SET
`data` = '$data',
`type` = '$type',
`quality` = '$quality',
`source` = '$source',
`local` = '$local'";



if (mysqli_query($link, $query)) {
echo 'Добавлено';

} else {
echo 'not Ok';
}



?>
