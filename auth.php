<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    error_reporting(0);
    $website_title = 'Авторизация на сайте';
    require 'blocks/head.php';
    include_once ('./libs/connect.php');

  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
    if($_COOKIE['log'] == ''){
        ?>
        <h4>Форма авторизации</h4>
        <form action="" method="post">
          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-3">
            Войти
          </button>
        </form>
        <?php }
          elseif  ($_COOKIE['log'] !== '') {

        $user = ($_COOKIE['log']);
        $sql = "SELECT * FROM `user` WHERE `login`= '{$user}'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);

        echo "<h5>Личный кабинет</h5>
              <p><img src='{$row['avatar']}' height='255'></p>
              <p><a href='/load_avatar.php'><button type='button' class='btn btn-warning'>Изменить фотографию</button></a></p>
              <table class='table print'>
              <tr><td>Имя</td><td>{$row['name']}</td></tr>
              <tr><td>E-mail</td><td>{$row['email']}</td></tr>
              <tr><td>Логин</td><td>{$user}</td></tr>
              </table><br>

              ";

       echo mysqli_error($link);

        ?>


        <button class="btn btn-danger" id="exit_btn">Выйти</button>

        <?php
      }//    endif;

            ?>
      </div>


      <?php // require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#exit_btn').click(function () {
      $.ajax({
        url: 'ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function(data) {
          document.location.reload(true);
        }
      });
    });

    $('#auth_user').click(function () {
      var login = $('#login').val();
      var pass = $('#pass').val();

      $.ajax({
        url: 'ajax/auth.php',
        type: 'POST',
        cache: false,
        data: {'login' : login, 'pass' : pass},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#auth_user').text('Готово');
            $('#errorBlock').hide();
            document.location.reload(true);
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
