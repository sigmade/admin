<?php
  error_reporting(0);
$link = mysqli_connect('37.140.192.157', 'u0681620_mk', 'sychyov0658', 'u0681620_mobylnye-kadry');
mysqli_set_charset($link, "utf8");
  $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error = '';
  if(strlen($login) <= 3)
    $error = 'Введите логин';
  else if(strlen($pass) <= 3)
    $error = 'Введите пароль';

  if($error != '') {
    echo $error;
    exit();
  }

  /*$hash = "sdfjsdkhgs234jh324SDk";
  $pass = md5($pass . $hash);

  require_once '../mysql_connect.php';

  $sql = 'SELECT `id` FROM `user` WHERE `login` = :login && `pass` = :pass';
  $query = $pdo->prepare($sql);
  $query->execute(['login' => $login, 'pass' => $pass]);

  $user = $query->fetch(PDO::FETCH_OBJ);
  if($user->id == 0)
    echo 'Такого пользователя не существует';
  else {
    setcookie('log', $login, time() + 3600 * 24 * 30, "/");
    echo 'Готово';
  }*/




//WHERE `login` = $login && `pass` = $pass
  $sql = "SELECT `id` FROM `user` WHERE `login` = '{$login}' && `pass` = $pass ";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  if($row['id'] == 0)
      echo 'Такого пользователя не существует';
    else {
      setcookie('log', $login, time() + 3600 * 24 * 30, "/");
      echo 'Готово';
    }
//rint_r ($row['id']);
// echo mysqli_error($link);
/* if($user->id == 0)
    echo 'Такого пользователя не существует';
  else {
    setcookie('log', $login, time() + 3600 * 24 * 30, "/");
    echo 'Готово';
  }

*/
?>
