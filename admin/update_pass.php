<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
    
  <?php
     $userId = Session::get('userId');
   ?>

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Password</h3>
              </div>
            </div>
 <form action="" method="post">

     <?php
          
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_password  = md5($_POST['old_password']);
            $new_password  = md5($_POST['password']);
            $conform_pass  = md5($_POST['conform_pass']);
          
          $sql = "SELECT password FROM tbl_admin WHERE id = '$userId'";
                $result = $db->select($sql);
                $row = $result->fetch_assoc();

            if ($old_password == $row['password']) {
                if ($new_password == $conform_pass){
                 $sql ="update tbl_admin 
                        set 
                        password = '$conform_pass'
                        where id = '$userId'";
      
                 $user = $db->update($sql);
                    if ($user){
                         echo "<span style='color:green;'> Password updated successfully</span>";
                    }else{
                      echo "<span style='color:red;'>Sorry try again</span>";
                    }         
                 }
                 else{
                   echo "<span style='color:red;'>Conform password didn't match</span>";
                 }                
               }
            else{
              echo "<span style='color:red;'>Old password doesn,t matched,try again</span>";
            }
        }  
     ?>
           

  <table>     
                      
       
        <tr>
            <td>
                <label>Old Password</label>
            </td>
            <td>
                <input type="text" class="medium" name="old_password" required="" />
            </td>
        </tr>
        
        <tr>
            <td>
                <label>New Password</label>
            </td>
            <td>
                <input type="text" class="medium" name="password" required="" />
            </td>
        </tr>
    
        <tr>
            <td>
                <label>Confirm Password</label>
            </td>
            <td>
                <input type="text" class="medium" name="conform_pass" required="" />
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
