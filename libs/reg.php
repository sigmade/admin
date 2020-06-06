<?php

$login = $_POST['login'];
$age = $_POST['age'];;
$query = "
INSERT INTO `users` SET
`login` = '".mysqli_real_escape_string($login)."',
`age` = ".$age;



if (mysqli_query($link, $query)) {
echo 'Ok';
} else {
echo 'not Ok';    
}


?>