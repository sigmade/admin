<?php
//error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../libs/connect.php');
header('Location: ../users/view.php');


?>
<?php
$id = $_POST['id'];


$query = "
DELETE FROM `user`
WHERE `id` = '$id'";

echo mysqli_error($link);
if (mysqli_query($link, $query)) {
echo 'Добавлено';
echo mysqli_error($link);
//    $date=date('d.m.Y h:i:s');
//  $file=fopen("x.csv", "a+t");
//    fwrite($file, "$date; $type; $size; $quality; $source; $local\n");
//    fclose($file);

} else {
  echo mysqli_error($link);
echo 'not Ok';
}

?>
