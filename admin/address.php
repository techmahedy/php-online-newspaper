<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Address</h3>
              </div>
             </div>

 <form action="" method="post">
   <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $address     = $_POST['address'];
                  $address     = $sql_injection->validation($_POST['address']);
                  $address     = mysqli_real_escape_string($db->link,$address);

                  if (empty($address)) {
                     echo "<span style='color:red; font-size:18px;'>Enter address name first </span>";
                  }else{
                   $query = "Update tbl_address  
                             set
                             address = '$address'";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>Address updated successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
              ?>
  <table>     
                      
       <?php 
        $query  = "SELECT * FROM tbl_address";
        $result = $db->select($query);
         if ($result) {
          while ( $data = $result->fetch_assoc()) {


       ?>
        <tr>
            <td>        
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="address"><?php  echo $data['address'];?> </textarea>
            </td>
      

            <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
        <?php  } } ?>
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
