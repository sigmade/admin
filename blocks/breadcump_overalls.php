 <?php  $url = $_SERVER["REQUEST_URI"];?>
 
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li <?php if ($url == "/accouting/view.php") {echo 'class="breadcrumb-item active" aria-current="page">Остатктки';} else {echo 'class="breadcrumb-item"><a href="../accouting/view.php">Остатки</a>';}?></li>
<li <?php if ($url == "/accouting/insert.php") {echo 'class="breadcrumb-item active" aria-current="page">Поступление';} else {echo 'class="breadcrumb-item"><a href="../accouting/insert.php">Поступление</a>';}?></li>
<li <?php if ($url == "/accouting/extradition.php") {echo 'class="breadcrumb-item active" aria-current="page">Выдача';} else {echo 'class="breadcrumb-item"><a href="../accouting/extradition.php">Выдача</a>';}?></li>
</ol>
</nav>


