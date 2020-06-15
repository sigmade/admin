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
    $website_title = 'Сотрудники';
    require 'blocks/head.php';
    include_once ('./libs/connect.php');
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
    <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Список</li>
        <li class="breadcrumb-item"><a href="/ins_staff.php">Добавить</a></li>
        <li class="breadcrumb-item"><a href="#">Изменить</a></li>
       </ol>
       </nav>
       <p><form class="form-inline" action="/search_staff.php" method="post">
    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Поиск по ФИО, УНК" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
  </form></p>
        <?php
            $sql = 'SELECT * FROM `staff` ';
            $result = mysqli_query($link, $sql);
            echo '<table class="table table-striped print">
            <thead><th>УНК</th><th>ИМЯ</th></thead>';
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr><td>{$row['unk']}</td>
                          <td>{$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}</td>
                          <td><a href='worker.php?unk={$row['unk']}' target='_blank'><button type='button' class='btn btn-warning'>Подробнее</button></a></td>
                      </tr>";
            }
            echo '</table>';
            echo mysqli_error($link);  ?>
      </div>
    </div>
  </main>
  <?php require 'blocks/footer.php'; ?>
</body>
</html>
