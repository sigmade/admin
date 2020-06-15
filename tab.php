<?php
if ($_COOKIE['log'] == '') {
  header('Location:/auth.php');
  exit();
}
 ?>
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<html lang="ru">
<head>
  <?php
    $website_title = 'Табель';
    require 'blocks/head.php';
    include_once ('./libs/connect.php');
    $sorting = $_GET['sort'];
    switch ($sorting) {

      case 'id_asc':
      $sorting = 'id_staff ASC';
      $sort_name = 'По возрастанию ID';
      break;

      case 'id_desc':
      $sorting = 'id_staff DESC';
      $sort_name = 'По убыванию ID';
      break;

      case 'name_asc':
      $sorting = 'name ASC';
      $sort_name = 'От А до Я по ФИО';
      break;

      case 'name_desc':
      $sorting = 'name DESC';
      $sort_name = 'От Я до А по ФИО';
      break;

      default:
      $sorting = 'id_staff ASC';
      $sort_name = 'По возрастанию ID';
      break;
    }
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
<main class="container mt-5">
<div class="row">
      <div class="col-md-8 mb-3">

     <?= $sort_name; ?>

    </div>
    <div class="col-md-8 mb-3">
    <?php
            $sql = "SELECT 
                        table.id_staff, 
                        table.name, 
                        local.local,
                        providers.name_provider, 
                        table.hours, 
                        table.total, 
                        month.month 
                    FROM `table`
                    INNER JOIN `local` ON local.id_local = table.id_local
                    INNER JOIN `providers` ON providers.id_provider = table.id_provider
                    INNER JOIN `month` ON month.id_month = table.id_month ORDER BY $sorting";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            echo '<table class="table table-striped print">
            <thead>
            <th>ID</th>
            <th>ФИО</th>
            <th>Объект</th>
            <th>Поставщик</th>
            <th>Часы</th>
            <th>Начислено</th>
            <th>Месяц</th>
            </thead>';
            do {
              echo "<tr><td>{$row['id_staff']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['local']}</td>
                        <td>{$row['name_provider']}</td>
                        <td>{$row['hours']}</td>
                        <td>{$row['total']}</td>
                        <td>{$row['month']}</td>
                  </tr>";
            } while ($row = mysqli_fetch_array($result));


            echo '</table>';
        ?>
      </div>
<?php require 'blocks/parametr.php'; ?>
    </div>

  </main>

  <?php require 'blocks/footer.php'; ?>

</body>
</html>
