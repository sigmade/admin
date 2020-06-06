<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
$link = mysqli_connect("37.140.192.157", "u0681620_mk", "sychyov0658", "u0681620_mobylnye-kadry");

mysqli_set_charset($link, "utf8");

header('Location: /ins_staff.php');

?>
<?php
$unk = @$_POST['unk'];
$surname = @$_POST['surname'];
$name = @$_POST['name'];
$patronymic = @$_POST['patronymic'];
$gender = @$_POST['gender'];
$date_of_birth = @$_POST['date_of_birth'];
$pasp_num = @$_POST['pasp_num'];
$address = @$_POST['address'];
$inn = @$_POST['inn'];
$snils = @$_POST['snils'];
$phone = @$_POST['phone'];
$email = @$_POST['email'];
$query = "
INSERT INTO `staff` SET
`unk` = '$unk',
`surname` = '$surname',
`name` = '$name',
`patronymic` = '$patronymic',
`gender` = '$gender',
`date_of_birth` = '$date_of_birth',
`pasp_num` = '$pasp_num',
`address` = '$address',
`inn` = '$inn',
`snils` = '$snils',
`phone` = '$phone',
`email` = '$email'
";


echo mysqli_error($link);
if (mysqli_query($link, $query)) {
echo 'Добавлено';
//    $date=date('d.m.Y h:i:s');
//  $file=fopen("x.csv", "a+t");
//    fwrite($file, "$date; $type; $size; $quality; $source; $local\n");
//    fclose($file);

} else {
  echo mysqli_error($link);
echo 'not Ok';
}



?>
