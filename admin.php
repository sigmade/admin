<?php
if ($_COOKIE['log'] !== 'egor') {
  header('Location:/auth.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Панель администратора';
    require 'blocks/head.php';
    include_once ('./libs/connect.php');
  ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Управление пользователями</li>
    <li class="breadcrumb-item"><a href="/overalls/view.php">Спецодежда</a></li>
    <li class="breadcrumb-item"><a href="../controllers/warehouse/view.php">Объекты</a></li>

      </ol>
      </nav>
      <p><a href='/insert_user.php'>
        <button type='button' class='btn btn btn-success'>Создать пользователя</button>
     </a></p>
<table class="table table-striped print">
            <thead>
            <th>ID</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Телефон</th>
            <th>Группа</th>
            </thead>
<?php
  $sql = 'SELECT * FROM `user` ';
  $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result))
          {
           echo "<tr><td>{$row['id']}</td>
                 <td>{$row['login']}</td>
                 <td>{$row['pass']}</td>
                 <td>{$row['name']}</td>
                 <td>{$row['email']}</td>
                 <td>{$row['phone']}</td>
                 <td>{$row['group']}</td>
                 <td><a href='user.php?id={$row['id']}'>

                  <button type='button' class='btn btn-warning'>Изменить</button>
                  </a></td>
                  <td><a href='delete_user.php?id={$row['id']}'>
                  <button type='button' class='btn btn btn-danger' data-toggle='modal' data-target='#staticBackdrop'>Удалить</button>
                  </a></td></tr>";
            }
          echo mysqli_error($link);

?>
</table>
<!-- Modal -->

     </div>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>

</body>
</html>
