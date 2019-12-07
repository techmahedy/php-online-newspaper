<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Breaking News</h3>
              </div>
              </div>
 <form action="" method="post">
   <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $title     = $_POST['title'];

                  if (empty($title)) {
                     echo "<span style='color:red; font-size:18px;'>Enter title name first </span>";
                  }else{
                   $query = "INSERT INTO  
                             tbl_breaking_news(title)
                             VALUES('$title')";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>title inserted successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
              ?>
  <table>                       
       
        <tr>
            <td>
                <label>Copyright</label>
            </td>
            <td>
                <input type="text" class="medium" name="title" />
            </td>
        </tr>  

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
    </table>
    </form>
        
           </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>

<?php include 'include/footer.php'; ?>
