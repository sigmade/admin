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
    error_reporting(-1); // как нибудь убрать    //  сделать разделители
    $website_title = 'Поиск по параметрам';
    require 'blocks/head.php';
    require 'libs/functions.php';
    include_once ('./libs/connect.php');
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php

if($_GET['month'] & $_GET['local'] & $_GET['provider'])
{
  $check_month=implode(',',$_GET['month']);
  $check_local=implode(',',$_GET['local']);
  $check_providers=implode(',',$_GET['provider']);
  $query_month = "table.id_month IN($check_month)" ;
  $query_local = "table.id_local IN($check_local)" ;
  $query_providers = "table.id_provider IN($check_providers)" ;
}
else { echo "Необходимо задать все параметры";
}

            $sort = ($_GET['sort']);
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
                    INNER JOIN `month` ON month.id_month = table.id_month
                    WHERE $query_month AND $query_local AND $query_providers ORDER BY $sort";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $total = tabTotal('total');
            $format_total = number_format($total, 2, ',', ' ');
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
              }  while ($row = mysqli_fetch_array($result));
            echo '</table>';
            echo  "<div class='card col-md-8 mb-3 print'>
<ul class='list-group list-group-flush'>
<li class='list-group-item'>Всего человек: ".mysqli_num_rows($result)."</li>
<li class='list-group-item'>Всего часов: ".tabTotal('hours')."</li>
<li class='list-group-item'>Всего начислено зарплаты: ".$format_total." руб.</li>
</ul>
</div>";
  echo mysqli_error($link);
    ?>

      </div>
    <?php require 'blocks/parametr.php'; ?>

    </div>
  </main>
  <?php require 'blocks/footer.php';

?>
</body>
</html>
