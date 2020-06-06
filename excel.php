<?php
include_once ('./libs/connect.php');
                    mysqli_set_charset($link, "utf8");
          $output = '';
          $prov = $_GET['prov'];
          $q = "id_provider IN($prov)" ;
        //  print_r ($_GET['prov']) ;
      //   echo $prov ;
      //   echo $q ;
       //echo gettype($prov);
      if (isset($_GET["export_excel"]))
    {
      // $check_providers=implode(',',$_GET['prov']);
       //$check_providers=7;
      // $query_providers = "id_provider IN($check_providers)" ;
      //    $query_local = "id_local IN($check_local)" ;
    //$sql = "SELECT * FROM `TABLE 8` WHERE $query_brand AND $query_local";

     $sql = "SELECT * FROM `table` WHERE $q";
          $result = mysqli_query($link, $sql);
          if(mysqli_num_rows($result)>0)
          {
          $output = '<table class="table" border="1">
                  <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Объект</th>
                    <th>Поставщик</th>
                    <th>Часы</th>
                    <th>Начислено</th>
                    <th>Месяц</th>
                    <tr>
          ';
          while ($row = mysqli_fetch_array($result))
          {
              $output .= "
              <tr>
                <td>{$row['id_staff']}</td>
                <td>{$row['name']}</td>
                <td>{$row['id_local']}</td>
                <td>{$row['id_provider']}</td>
                <td>{$row['hours']}</td>
                <td>{$row['total']}</td>
                <td>{$row['id_month']}</td>
                <tr>
            ";
          }
          $output .= '</table>';
        //  header('Content-disposition: attachment; filename=myfile.pdf');
      //    header('Content-type: application/pdf');
//    header("Content-Type: application/xls");
//   header("Content-Disposition", "attachment;filename=download.xls");
$file = "export.xls" ;
header('Content-Disposition: attachment; filename=' . $file );
header('Content-Type: application/xls');
          echo $output;
          }
    }
  
?>
