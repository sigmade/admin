<?php
if ($_COOKIE['log'] == '') {
  header('Location:/auth.php');
  exit();
}
require 'blocks/head.php';
include_once ('./libs/connect.php');
$unk = $_GET['unk'];

mysqli_set_charset($link, "utf8");

            $sql = "SELECT * FROM `staff` WHERE `unk`=$unk";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
echo mysqli_error($link);
echo "

<div class='print'>
<div class=WordSection1>

<p class=MsoNormal align=right style='text-align:right'>Генеральному директору
ООО «ММБ»</p>

<p class=MsoNormal align=right style='text-align:right'>Романенко Ю. Е.</p>

<p class=MsoNormal align=right style='text-align:right'>От <span class=SpellE>{$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}</p>

<p class=MsoNormal align=right style='text-align:right'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal align=right style='text-align:right'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal align=right style='text-align:right'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal align=right style='text-align:right'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal align=center style='text-align:center'>Заявление об
увольнении</p>

<p class=MsoNormal align=center style='text-align:center'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Я, &nbsp;{$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}&nbsp;<span
class=GramE>прошу уволить меня по собственному желания</span> с «__» ________ 2020 г.</p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Иванов<span style='mso-spacerun:yes'> 
</span>_________________________<span style='mso-spacerun:yes'>  </span>«__»
________ 2020 г.</p>

<p class=MsoNormal align=right style='text-align:right'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal align=center style='text-align:center'><o:p>&nbsp;</o:p></p>

</div>
</div>
<input type='button' onclick='javascript:window.print()' class='btn btn-succes m-2' value='Распечатать'><br>

      ";




?>
