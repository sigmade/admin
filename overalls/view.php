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
    $website_title = 'Номенклатура';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
  ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <?php require '../blocks/header.php'; ?>

<main class="container mt-3">
    <div class="row">
    <div class="col">

        </div>
      <div class="col-md-10 mb-3">
      <?php require '../blocks/breadcump_admin.php'; ?>
      <div class=" mb-3">
      
       <label class=" mr-3"><h5><?=$website_title ?></h5></label>
       <a href="../overalls/insert.php" class="btn btn btn-success">+ Добавить</a>
      
      </div>
<table class="table table-striped print">
            <thead>
            <th>ID</th>
            <th>Намменование</th>
            </thead>
<?php
  $sql = 'SELECT * FROM `nomenclature` '; // Вывод всего списка
  $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result))
          {
           echo "<tr><td>{$row['id']}</td>
                 <td>{$row['name']}</td>
                 <td><a href='overalls.php?id={$row['id']}'>

                  <button type='button' class='btn btn-warning'>Изменить</button>
                  </a></td>
                  <td><a href='delete.php?id={$row['id']}'>
                  <button type='button' class='btn btn btn-danger' data-toggle='modal' data-target='#staticBackdrop'>Удалить</button>
                  </a></td></tr>";
            }
          echo mysqli_error($link);

?>
</table>
     </div>
     <div class="col">

        </div>
    </div>
  </main>
  <?php require '../blocks/footer.php'; ?>

</body>
</html>
