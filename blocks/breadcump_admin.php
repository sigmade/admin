 <?php  $url = $_SERVER["REQUEST_URI"];?>
 
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li <?php if ($url == "/users/view.php") {echo 'class="breadcrumb-item active" aria-current="page">Управление пользователями';} else {echo 'class="breadcrumb-item"><a href="../users/view.php">Управление пользователями</a>';}?></li>
<li <?php if ($url == "/overalls/view.php") {echo 'class="breadcrumb-item active" aria-current="page">Номенклатура';} else {echo 'class="breadcrumb-item"><a href="../overalls/view.php">Номенклатура</a>';}?></li>
<li <?php if ($url == "/warehouse/view.php") {echo 'class="breadcrumb-item active" aria-current="page">Объекты и склады';} else {echo 'class="breadcrumb-item"><a href="../warehouse/view.php">Объекты и склады</a>';}?></li>
</ol>
</nav>


