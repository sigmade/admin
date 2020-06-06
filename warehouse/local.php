<?php
if ($_COOKIE['log'] == '') {
  header('Location:/auth.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<head>
  <?php
    $website_title = 'Изменение';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
  ?>
    </head>
<body>
  <?php require '../blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
           $id = $_GET['id'];

            $sql = "SELECT * FROM `nomenclature` WHERE `id`=$id";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            echo mysqli_error($link);
        ?>

      <h5>Позиция</h5>
      <form method="post" action="../libs/updt_overalls.php">
                  <table class='table print'>
                  <tr><td>ID</td><td><input type='text' name='id' value='<?=$row['id']?>'</td></tr>
                  <tr><td>Имя</td><td><input type='text' name='name' value='<?=$row['name']?>'></td></tr>
                  </table><br>
        <p><button type='button' class='btn btn-primary'data-toggle='modal' data-target='#staticBackdrop'>Изменить</button></p>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Предупреждение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Вы действительно хотите изменить?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                <button type="submit" class="btn btn-primary">Изменить</button>
              </div>
            </div>
          </div>
        </div>
        <p><a href='/overalls/view.php'><button type='button' class='btn btn-warning'>Вернуться назад</button></a></p>
    </form>
      </div>
    </div>
  </main>
<?php
?>
  <?php require '../blocks/footer.php'; ?>
</body>
</html>
