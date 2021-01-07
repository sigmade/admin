<?php
function can_upload($file){
	// если имя пустое, значит файл не выбран
	if($file['name'] == '')
		return 'Вы не выбрали файл.';

	/* если размер файла 0, значит его не пропустили настройки
	сервера из-за того, что он слишком большой */
	if($file['size'] == 0)
		return 'Файл слишком большой.';

	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');

	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';

	return true;
}
function can_upload2($file2){
	// если имя пустое, значит файл не выбран
	if($file2['name'] == '')
		return 'Вы не выбрали файл.';

	/* если размер файла 0, значит его не пропустили настройки
	сервера из-за того, что он слишком большой */
	if($file2['size'] == 0)
		return 'Файл слишком большой.';

	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file2['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');

	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';

	return true;
}

function make_upload($file){
	//$dir = @$_POST['dir'];
	//mkdir("$dir", 0770);
	$text = @$_POST['pasport'];
	$dir = "img/{$_POST['dir']}/";
  mkdir("$dir", 0777);
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	$name = "$text.$mime";

	copy($file['tmp_name'], "$dir". $name );


	//mkdir("img/$text", 0777);

}

function make_upload2($file2){
	//$dir = @$_POST['dir'];
	//mkdir("$dir", 0770);
	$text2 = @$_POST['snils'];
$dir = "img/{$_POST['dir']}/";
	$getMime = explode('.', $file2['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// формируем уникальное имя картинки: случайное число и name
//$way2 = "img/$text2/";
//mkdir("$way2", 0777);
//mkdir("$dir", 0777);
	$name2 = "$text2.$mime";

	copy($file2['tmp_name'], "$dir". $name2 );


	//mkdir("img/$text", 0777);
}
function make_upload3($file3){
	$text3 = @$_POST['avatar'];
$dir = "img/avatar/";
	$getMime = explode('.', $file3['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// формируем уникальное имя картинки: случайное число и name
	$name3 = "$text3.$mime";

	copy($file3['tmp_name'], "$dir". $name3 );

}
function robaQual($type, $local)
	{
		global $link;

		$sql = "SELECT SUM(`quality`)
						AS new_col
						FROM `roba`
						WHERE type='$type'
						AND local='$local'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);

		return $row['new_col'];
		//return $sql;
	}
	function can_upload3($file3){
		// если имя пустое, значит файл не выбран
		if($file3['name'] == '')
			return 'Вы не выбрали файл.';

		/* если размер файла 0, значит его не пропустили настройки
		сервера из-за того, что он слишком большой */
		if($file3['size'] == 0)
			return 'Файл слишком большой.';

		// разбиваем имя файла по точке и получаем массив
		$getMime = explode('.', $file3['name']);
		// нас интересует последний элемент массива - расширение
		$mime = strtolower(end($getMime));
		// объявим массив допустимых расширений
		$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');

		// если расширение не входит в список допустимых - return
		if(!in_array($mime, $types))
			return 'Недопустимый тип файла.';

		return true;
	}
	function tabTotal($sum)
	{
	 global $query_month;
	 global $query_local;
	 global $query_providers;
	 global $link;

	 $sql = "SELECT SUM(`$sum`)
	          AS new_col
	          FROM `table`
	          WHERE $query_month
	          AND $query_local
	          AND $query_providers";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result);

	 return $row['new_col'];
	}
