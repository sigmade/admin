<?php
if ($_COOKIE['log'] == '') {
  header('Location:/auth.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Добавить склад';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
  ?>
</head>
<body>

  <?php require '../blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h5><?=$website_title ?></h5>
       <form action="../models/ins_warehouse.php" method="post" class="form-group">
       <table>
       <tr><td widht="75">Наименование</td><td><input widht="100" class="ml-3" type="text" class="form-control" name="name"></td></tr>
       </table><br>
       <p><button type="submit" class="btn btn-primary">Добавить</button></p>
       </form>
       <p><a href='../warehouse/view.php'><button type='button' class='btn btn-warning'>Вернуться назад</button></a></p>
      </div>

    </div>

  </main>

  <?php require '../blocks/footer.php'; ?>
</body>
</html>
