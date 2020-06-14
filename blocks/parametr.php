<aside class="col-md-4">
 <div class="p-3 mb-3 bg-warning rounded">
<h5>Сортировать</h5>
<form action="/search_filter.php" method="get">
<select class="custom-select" name="sort">
      <option selected value="id_staff ASC">Выбрать ...</option>
      <option value="id_staff ASC">По возрастанию ID</option>
      <option value="id_staff DESC">По убыванию ID</option>
      <option value="name ASC">От А до Я по ФИО</option>
      <option value="name DESC">От Я до А по ФИО</option>
</select>
<h5>Фильтр по парамтерам</h5>
<h6>МЕСЯЦ РАБОТЫ</h6>
<form action="/search_filter.php" method="get">
<?php

$sql = 'SELECT * FROM `month` ';
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
do {
$check_month="";
$allmonth="1,2,3,4,5,6,7,8,9,10,11,12";
if ($_GET['month'])
{
  if (in_array($row['id_month'],$_GET['month']))
  {
    $check_month="checked";
  }

}

echo "<input $check_month type='checkbox' name='month[]' value='{$row["id_month"]}' id='checkmonth{$row["id_month"]}'>
      <label for='checkmonth{$row["id_month"]}'>&nbsp;{$row["month"]}</label><br>";
} while ($row = mysqli_fetch_array($result));

//echo "<input $check_month type='checkbox' name='month[]' value='5,6,7,8,9,10'><label>&nbsp;Все месяцы</label><br>";
if($_GET['month'] == "" OR implode(',',$_GET['month']) == $allmonth)
{
echo "<input checked type='checkbox' name='month[]' value='{$allmonth}'>
      <label>&nbsp;Все месяцы</label><br>";
}
else {
echo "<input type='checkbox' name='month[]' value='{$allmonth}'>
      <label>&nbsp;Все месяцы</label><br>";
}

?>
<h6>ОБЪЕКТ</h6>
<?php
$sql = 'SELECT * FROM `local` ';
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);


do {
  $check_local="";
  $alllocal="1,2,3,4,5,6,7,8,9,10,11";
  if ($_GET['local'])
  {
    if (in_array($row['id_local'],$_GET['local']))
    {
      $check_local="checked";
    }
  }
echo "<input $check_local type='checkbox' name='local[]' value='{$row["id_local"]}' id='checklocal{$row["id_local"]}'>
      <label for='checklocal{$row["id_local"]}'>&nbsp;{$row["local"]}</label><br>";
} while ($row = mysqli_fetch_array($result));
if($_GET['local'] == "" OR implode(',',$_GET['local']) == $alllocal)
{
echo "<input checked type='checkbox' name='local[]' value='{$alllocal}'>
      <label>&nbsp;Все объекты</label><br>";
}
else {
echo "<input type='checkbox' name='local[]' value='{$alllocal}'>
      <label>&nbsp;Все объекты</label><br>";
}

?>

<h6>ПОСТАВЩИК</h6>
<form action="/search_filter.php" method="get">
<?php
$sql = 'SELECT * FROM `providers` ';
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);


do {
$allprovider="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24";
$check_providers="";
if ($_GET['provider'])
{
  if (in_array($row['id_provider'],$_GET['provider']))
  {
    $check_providers="checked";
  }
}

echo "<input $check_providers type='checkbox' name='provider[]' value='{$row["id_provider"]}' id='check_providers{$row["id_provider"]}'>
      <label for='check_providers{$row["id_provider"]}'>&nbsp;{$row["name_provider"]}</label><br>";
} while ($row = mysqli_fetch_array($result));
if($_GET['provider'] == "" OR implode(',',$_GET['provider']) == $allprovider)
{
echo "<input checked type='checkbox' name='provider[]' value='{$allprovider}'>
      <label>&nbsp;Все поставщики</label><br>";
}
else{
echo "<input type='checkbox' name='provider[]' value='{$allprovider}'>
      <label>&nbsp;Все поставщики</label><br>";
}
?>

<input type="submit" name="submit" class="btn btn-succes m-2" value="Применить"><br>
<input type="button" onclick="javascript:window.print()" class="btn btn-succes m-2" value="Распечатать результат"><br>
</form>
<form action="/excel.php" method="get">
  <div>
  <?php
$p = @implode(',',$_GET['provider']);
  echo "<input type='hidden' name='prov'  value='{$p}'>"?>
  <input type="submit" name="export_excel" class="btn btn-succes m-2" value="Скачать в xls">
  </div>
</form>

</div>
</aside>
