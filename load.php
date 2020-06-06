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
        <label>Табельный номер сотрудника</label>
        <input type="text" class="form-control" name="dir" placeholder="Пример: 1052">
</div>
<input type="hidden" name="pasport" value="pasport" >
<div class="form-group">
   <label>Загрузить паспорт</label>
   <input type="file" name="file" class="form-control-file">
</div>
<div class="form-group">
<input type="hidden" name="snils" value="snils" >
   <label>Загрузить СНИЛС</label>
   <input type="file" name="file2" class="form-control-file">
</div>
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
