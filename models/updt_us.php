<?php
//error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../libs/connect.php');

header('Location: ../users/view.php');

?>
<?php
$login = $_POST['login'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$group = $_POST['group'];
$id = $_POST['id'];

$query = "
UPDATE `user` SET
`login` = '$login',
`pass` = '$pass',
`name` = '$name',
`email` = '$email',
`phone` = '$phone',
`group` = '$group'
WHERE `id` = '$id' ";



if (mysqli_query($link, $query)) {
echo 'Добавлено';
echo mysqli_error($link);

} else {
  echo mysqli_error($link);
echo 'not Ok';
}



?>
