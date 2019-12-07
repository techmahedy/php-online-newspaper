<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php');
   
    $userId = Session::get('userId');
    $userRole = Session::get('userRole'); 

    ?>  
     
      <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>User Information</h3>
              </div>
          </div>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $name        = $_POST['name'];
        $username    = $_POST['username'];
        $email       = $_POST['email'];
        $user_detail = $_POST['user_detail'];
        $role        = $_POST['role'];
       // $userid      = $_POST['userid'];

    if ($name == "" || $username == "" || $email == "" || $user_detail == "" || $role == ""){
        echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
        }
    else{
     
      $query = " UPDATE tbl_admin
                 SET 
                 name='$name', 
                 username='$username', 
                 email='$email', 
                 user_detail='$user_detail',
                 role = '$role' 
                 where id = '$userId'";

               $inserted_rows = $db->update($query);
        if ($inserted_rows) {
          echo "<span style='color:green; font-size:18px;'>User Updated Successfully.</span>"; 
        }
        else {
          echo "<span style='color:red; font-size:18px;'>sorry there has been error.</span>"; 
        }
      }

   }
?>           
 <form action="" method="post">
    <table>
       <?php
          $query = "SELECT * FROM tbl_admin WHERE id='$userId' AND role='$userRole'";
          $getpost = $db->select($query);
          if ($getpost) {
           while ( $postresult = $getpost->fetch_assoc()){
              
         ?>   
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="name" value="<?php echo $postresult['name'];?>"/>
            </td>
        </tr>
         
         <tr>
            <td>
                <label>Username</label>
            </td>
            <td>
                <input type="text" required="" class="medium" name="username" value="<?php echo $postresult['username'];?>">
            </td>
        </tr>

         <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input style="width: 300px;" type="email" required="" class="medium" name="email" value="<?php echo $postresult['email'];?>" />
            </td>
        </tr>
        
         <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="user_detail">
                   <?php echo $postresult['user_detail'];?>
                </textarea>
            </td>
        </tr>
          
        <tr>
            <td>
                <label>User Role</label>
            </td>
            <td>
              <input type="int" name="role" value="<?php echo $postresult['role'];?>">
            </td>
        </tr>

        <tr>
            <td>
                <label>Joining Date</label>
            </td>
            <td>
                <input type="text" id="datepicker" readonly="" name="join_date" value="<?php echo $sql_injection->formatDate($postresult['join_date']); ?>">
            </td>
        </tr>
         
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Update" />
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

  <?php include('include/footer.php'); ?>  