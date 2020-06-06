<?php
if ($_COOKIE['log'] == '') {
  header('Location:../auth.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Создать нового пользователя';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
  ?>
</head>
<body>

  <?php require '../blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h5>Создать нового пользователя</h5>
       <form action="../models/ins_usr.php" method="post" class="form-group">
       <table>
       <tr><td widht="75">Логин</td><td><input type="text" class="form-control" name="login"></td></tr>
       <tr><td widht="75">Пароль</td><td><input type="text" class="form-control" name="pass"></td></tr>
       <tr><td widht="75">Имя</td><td><input type="text" class="form-control" name="name"></td></tr>
       <tr><td widht="75">E-mail</td><td><input type="text" class="form-control" name="email"></td></tr>
      <tr><td widht="75">Телефон</td><td><input type="text" class="form-control" name="phone"></td></tr>
       <tr>
           <td widht="75">Группа</td>
           <td><select class="form-control" name="group">
           <option value="user">user</option>
           <option value="hr">hr</option>
           </select></td>
       </tr>
     </table><br>
       <p><button type="submit" class="btn btn-primary">Добавить</button></p>
       </form>
       <p><a href='../users/view.php'><button type='button' class='btn btn-warning'>Вернуться назад</button></a></p>
      </div>

    </div>

  </main>

  <?php require '../blocks/footer.php'; ?>
</body>
</html>
