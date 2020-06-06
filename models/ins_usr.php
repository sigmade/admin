<?php
//error_reporting(-1);
//ini_set('display_errors',1);
//header('Content-Type: text/html; charset=utf-8');
header('Location: ../users/view.php');
include_once ('../libs/connect.php');

header('../users/view.php');

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
INSERT INTO `user` SET
`login` = '$login',
`pass` = '$pass',
`name` = '$name',
`email` = '$email',
`phone` = '$phone',
`group` = '$group'
";

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
