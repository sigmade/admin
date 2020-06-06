<aside class="col-md-4">
 <div class="p-3 mb-3 ">
   <form action="/view.php" method="post">
   <select class="custom-select" name="act">
    <option value=""> Все объекты </option>
             <?php
            $sql = 'SELECT * FROM `warehouse`';
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo " <option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
             
        </select>
        <div class="mt-3">
           <button type="submit" class="btn btn-primary">Применить</button>
        </div>
   </form>

</div>
</aside>
