<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Category</h3>
              </div>
           </div>
               <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $category_name     = $_POST['category_name'];
                  $category_name     = $sql_injection->validation($_POST['category_name']);
                  $category_name     = mysqli_real_escape_string($db->link,$category_name);

                  if (empty($category_name)) {
                     echo "<span style='color:red; font-size:18px;'>Enter category name first </span>";
                  }else{
                   $query = "INSERT INTO  
                             category(category_name)
                             VALUES('$category_name')";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>category inserted successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
              ?>
 <form action="" method="post">
  <table>     
                      
       
        <tr>
            <td>
                <label>Category Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="category_name" />
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

  
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $(function(){
    $("#datepicker").datepicker();
  });
  </script>

<?php include 'include/footer.php'; ?>
