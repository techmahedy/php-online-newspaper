 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Page </h3>
              </div>
            </div>
  <form action="" method="post">

    <?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
      $name     = $sql_injection->validation($_POST['name']);
      $category = $sql_injection->validation($_POST['category']);

        if ($name == "" || $category == ""){
        echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
        }

    else{
     $query = "INSERT INTO 
               tbl_page(name,category_id) 
               VALUES('$name','$category')";

               $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span style='color:green; font-size:18px;'>Page inserted successfully.</span>";      
        }
        else {
         echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
      }

   }
?>

    <table>
       
        <tr>
            <td>
                <label>Page Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="name" />
            </td>
        </tr>
     
        <tr>
            <td>
                <label>Category</label>
            </td>
            <td>
                <select id="select" name="category">
                    <option>Select Category</option>
                     <?php
                    $query = "select * from category";
                    $data = $db->select($query);
                    if ($data) {
                       while ($result = $data->fetch_assoc()) {     
                
                    ?>

                    <option value="<?php echo $result['id']; ?>"><?php echo $result['category_name']; ?></option>

                    <?php   }   } ?>
                             
                </select>
            </td>
        </tr>

        <tr>
        <td>
            <label>Author</label>
        </td>
        <td>
       <input type="text" name="author" value="<?php echo Session::get('username'); ?>" class="medium" readonly=""; />
       <input type="hidden" name="userid" value="<?php echo Session::get('userId'); ?>" class="medium" />
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

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $(function(){
    $("#datepicker").datepicker();
  });
  </script>

<?php include 'include/footer.php'; ?>

<style type="text/css">
      h3{font-weight: 800; margin-left: 37px;}
 </style>
