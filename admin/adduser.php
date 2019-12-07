 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add User </h3>
              </div>
            </div>

 <?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
      $name     = $sql_injection->validation($_POST['name']);
      $username    = $sql_injection->validation($_POST['username']);
      $email     = $sql_injection->validation($_POST['email']);
      $password    = $sql_injection->validation(md5($_POST['password']));
      $user_detail    = $sql_injection->validation($_POST['user_detail']);
      $role     = $sql_injection->validation($_POST['role']);
      $author     = $sql_injection->validation($_POST['author']);
      $userid    = $sql_injection->validation($_POST['userid']);

        $permited  = array('jpg', 'jpeg', 'png');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;

        if ($name == "" || $username == "" || $email == "" || $password == "" || $user_detail == "" || file_name == "" || $role ==""){
        echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
        }

        elseif ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        }
        elseif (in_array($file_ext, $permited) === false){
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } 

   else{
     move_uploaded_file($file_temp, $uploaded_image);

     $query = "INSERT INTO 
               tbl_admin(name,username,email,password,user_detail,role,image) 
               VALUES('$name','$username','$email','$password','$user_detail','$role','$uploaded_image')";

               $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span style='color:green; font-size:18px;'>User inserted successfully.</span>";      
        }
        else {
         echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
      }

   }
?>
  <form action="" method="post" enctype="multipart/form-data">
    <table>
       
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="name" />
            </td>
        </tr>
        
        <tr>
            <td>
                <label>Username</label>
            </td>
            <td>
                <input type="text" class="medium" name="username" />
            </td>
        </tr>
         
         <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input type="text" class="medium" name="email" />
            </td>
        </tr>
           
        <tr>
            <td>
                <label>Password</label>
            </td>
            <td>
                <input type="text" class="medium" name="password" />
            </td>
        </tr>  
         <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="user_detail"></textarea>
            </td>
        </tr>

         <tr>
            <td>
                <label>User Role</label>
            </td>
            <td>
                <select name="role">
                    <option>Select User Role</option>
                    <option value="0">Admin</option>
                    <option value="1">Author</option>
                    <option value="2">Editor</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label>Upload Image</label>
            </td>
            <td>
                <input type="file" name="image" />
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
