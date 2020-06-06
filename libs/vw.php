<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
$link = mysqli_connect("37.140.192.157", "u0681620_mk", "sychyov0658", "u0681620_roba");

mysqli_set_charset($link, "utf8");



if (@$_POST['act']=="Окуловка") {
       
    $sql = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Костюм" AND local="Окуловка"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $sum = $row['q_sum'];
    $sqlb = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Ботинки" AND local="Окуловка"';
    $resultb = mysqli_query($link, $sqlb);
    $rowb = mysqli_fetch_array($resultb);
    $sumb = $rowb['q_sum'];
    $sqlz = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Жилетки" AND local="Окуловка"';
    $resultz = mysqli_query($link, $sqlz);
    $rowz = mysqli_fetch_array($resultz);
    $sumz = $rowz['q_sum'];
    $sqlk = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Каски" AND local="Окуловка"';
    $resultk = mysqli_query($link, $sqlk);
    $rowk = mysqli_fetch_array($resultk);
    $sumk = $rowk['q_sum'];
    $text = "Окуловка \n Костюмы: $sum \n Ботинки: $sumb \n Жилетки: $sumz \n Каски: $sumk \n"
        echo $text ;
                               }
        
elseif (@$_POST['act']=="Тула") {

    $sql = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Костюм" AND local="Тула"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $sum = $row['q_sum'];
    $sqlb = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Ботинки" AND local="Тула"';
    $resultb = mysqli_query($link, $sqlb);
    $rowb = mysqli_fetch_array($resultb);
    $sumb = $rowb['q_sum'];
    $sqlz = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Жилетки" AND local="Тула"';
    $resultz = mysqli_query($link, $sqlz);
    $rowz = mysqli_fetch_array($resultz);
    $sumz = $rowz['q_sum'];
    $sqlk = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Каски" AND local="Тула"';
    $resultk = mysqli_query($link, $sqlk);
    $rowk = mysqli_fetch_array($resultk);
    $sumk = $rowk['q_sum'];
        echo "Тула <br> Костюмы: $sum <br> Ботинки: $sumb <br> Жилетки: $sumz <br> Каски: $sumk <br>";
                               }
        
elseif (@$_POST['act']=="Воронеж") {

    $sql = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Костюм" AND local="Воронеж"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $sum = $row['q_sum'];
    $sqlb = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Ботинки" AND local="Воронеж"';
    $resultb = mysqli_query($link, $sqlb);
    $rowb = mysqli_fetch_array($resultb);
    $sumb = $rowb['q_sum'];
    $sqlz = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Жилетки" AND local="Воронеж"';
    $resultz = mysqli_query($link, $sqlz);
    $rowz = mysqli_fetch_array($resultz);
    $sumz = $rowz['q_sum'];
    $sqlk = 'SELECT SUM(`quality`) AS q_sum FROM `roba` WHERE type="Каски" AND local="Воронеж"';
    $resultk = mysqli_query($link, $sqlk);
    $rowk = mysqli_fetch_array($resultk);
    $sumk = $rowk['q_sum'];
        echo "Воронеж <br> Костюмы: $sum <br> Ботинки: $sumb <br> Жилетки: $sumz <br> Каски: $sumk <br>";
                               }
       else
       {
        echo "Выберите значение";
           };

                                 
  
?>
<form action="" method="post">
               <input type="submit" name="submit" value="Записать">
        </form>