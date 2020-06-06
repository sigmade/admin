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
    $website_title = 'Добавить выдачу';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
  ?>
</head>
<body>
  <?php require '../blocks/header.php'; ?>

   <main class="container mt-5">
    <div class="row">
    <div class="col">
      </div>
      <div class="col-md-6 mb-3">
        <?php require '../blocks/breadcump_overalls.php'; ?>
        <h5 class="mt-3 mb-3"><?= $website_title; ?></h5>
        <form action="../models/extr_acc.php" method="post" class="form-group">
        <table class='table table-striped print'>
          <tr>
              <td widht="75">Дата</td>
          <td><input type="text" class="form-control" name="data" value="<?=(date('d.m.Y'))?>"></td>
          </tr>
          <tr>
              <td widht="75">Вид</td>
              <td><select class="form-control" name="type">
              <?php
              $sql = 'SELECT * FROM `nomenclature` ';
               $result = mysqli_query($link, $sql);

                     while ($row = mysqli_fetch_array($result))
                       {
                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                         }
                       echo mysqli_error($link);
              //<option value="Костюм">Костюм</option>
              ?>
              </select></td>
          </tr>
         <tr>
          <td>Количество</td>
          <td><input type="text" class="form-control" name="quality"></td>
      </tr>
      <tr>
          <td>Списание на</td>
          <td><select class="form-control" name="source">
          <option widht="80" class="form-control" value="Выдача сотруднику">Выдача сотруднику</option>
                      <?php
            $sql = 'SELECT * FROM `warehouse`';
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo "<option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
          
          </select></td>
      </tr>
      <tr>
          <td>C объекта</td>
          <td><select class="form-control" name="local">
            <?php
            $sql = 'SELECT * FROM `warehouse`';
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo "<option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
          </select></td>
      </tr>
      </table>
      <button type="submit" class="btn btn-primary">Добавить</button>
      </form>

      </div>

<div class="col">
      </div>
    </div>
  </main>

  <?php require '../blocks/footer.php'; ?>

</body>
</html>
