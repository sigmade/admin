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
    require 'libs/functions.php';
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

    <form method="post" enctype="multipart/form-data">
<div class="form-group">
      <!--  <label>Табельный номер сотрудника</label>
        <input type="text" class="form-control" name="dir" placeholder="Пример: 1052"> -->
</div>
<input type="hidden" name="avatar" value="<?=$user= $_COOKIE['log']?>" >
<div class="form-group">
   <label>Загрузить фотографию</label>
   <input type="file" name="file3" class="form-control-file">
</div>
<p><button type="submit" class="btn btn-primary">Отправить</button></p>
<p><a href='/auth.php'><button type='button' class='btn btn-warning'>Вернуться назад</button></a></p>
</form>
    <?php
    // если была произведена отправка формы
    if(isset($_FILES['file3'])) {
    	// проверяем, можно ли загружать изображение
    	$check3 = can_upload3($_FILES['file3']);
    	if($check3 === true){
    		// загружаем изображение на сервер

        make_upload3($_FILES['file3']);
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
