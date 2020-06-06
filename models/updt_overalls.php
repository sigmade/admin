<?php
//error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../libs/connect.php');

header('Location: ../overalls/view.php');

?>
<?php

$name = $_POST['name'];
$id = $_POST['id'];

$query = "
UPDATE `nomenclature` SET
`name` = '$name'
WHERE `id` = '$id' ";



if (mysqli_query($link, $query)) {
echo 'Добавлено';
echo mysqli_error($link);

} else {
  echo mysqli_error($link);
echo 'not Ok';
}



?>
