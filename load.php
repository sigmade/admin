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
    $website_title = 'Загрузить документ';
    require 'blocks/head.php';
    include_once ('./libs/connect.php');
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main>
    <main class="container mt-5">
      <div class="row">
        <div class="col-md-4 mb-3">

            <form method="post" enctype="multipart/form-data" action="models/load.php">
                <div class="form-group">
                    <label>Табельный номер сотрудника</label>
                    <input type="text" class="form-control" name="dir" placeholder="Пример: 1052">
                </div>
                <table class='table'>
                    <tr>
                        <td><label>Паспорт</label><input type="hidden" name="pasport" value="pasport" ></td>
                        <td><input type="file" name="file" class="form-control-file"></td>
                    </tr>
                    <tr>
                        <td><label>Адрес регистрации</label><input type="hidden" name="address" value="address" ></td>
                        <td><input type="file" name="file3" class="form-control-file"></td>
                    </tr>
                    <tr>
                        <td><label>СНИЛС</label><input type="hidden" name="snils" value="snils"></td>
                        <td><input type="file" name="file2" class="form-control-file"></td>
                    </tr>
                    <tr>
                        <td><label>ИНН</label><input type="hidden" name="inn" value="inn"></td>
                        <td><input type="file" name="file4" class="form-control-file"></td>
                    </tr>
                    <tr>
                        <td><label>Прочее</label><input type="hidden" name="other" value="other"></td>
                        <td><input type="file" name="file5" class="form-control-file"></td>
                    </tr>
                </table>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
            <?php
    // если была произведена отправка формы
    if(isset($_FILES['file']) || isset($_FILES['file2'])) {
    	// проверяем, можно ли загружать изображение
    	$check = can_upload($_FILES['file']);
      $check2 = can_upload2($_FILES['file2']);
    	if($check === true || $check2 === true){
    		// загружаем изображение на сервер
    		make_upload($_FILES['file']);
        make_upload2($_FILES['file2']);
    		echo "<strong>Файл успешно загружен!</strong>";
    	}
    	else{
    		// выводим сообщение об ошибке
    		echo "<strong>$check</strong>";
    	}
    }
    ?>
</div>
</div>
</main>
<?php require 'blocks/footer.php';?>
</body>
</html>
