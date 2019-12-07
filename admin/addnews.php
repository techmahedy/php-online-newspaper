 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add News </h3>
              </div>
            </div>

 <?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
      $title     = $sql_injection->validation($_POST['title']);
      $category    = $sql_injection->validation($_POST['category']);
      $body     = $sql_injection->validation($_POST['body']);
      $tags    = $sql_injection->validation($_POST['tags']);
      $author     = $sql_injection->validation($_POST['chobi']);
      $chobi     = $sql_injection->validation($_POST['author']);
      $userid    = $sql_injection->validation($_POST['userid']);

      $title  = mysqli_real_escape_string($db->link,$_POST['title']);
      $category    = mysqli_real_escape_string($db->link,$_POST['category']);
      $body   = mysqli_real_escape_string($db->link,$_POST['body']);
      $tags   = mysqli_real_escape_string($db->link,$_POST['tags']);
      $author = mysqli_real_escape_string($db->link,$_POST['author']);
      $chobi = mysqli_real_escape_string($db->link,$_POST['chobi']);
      $userid = mysqli_real_escape_string($db->link,$_POST['userid']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;

        if ($title == "" || $category == "" || $body == "" || $tags == "" || $author == "" || file_name == "" || $chobi ==""){
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
               tbl_post(cat_id,title,body,image,author,tags,userid,chobi) 
               VALUES('$category','$title','$body','$uploaded_image','$author','$tags','$userid','$chobi')";

               $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span style='color:green; font-size:18px;'>Post Inserted Successfully.</span>";      
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
                <label>Title</label>
            </td>
            <td>
                <input type="text" class="medium" name="title" />
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
                <label>Date Picker</label>
            </td>
            <td>
                <input type="text" id="datepicker" />
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
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="body"></textarea>
            </td>
        </tr>
        
    <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
       <input type="text" name="tags" class="medium"/>
        </td>
    </tr>
     <tr>
        <td>
            <label>pic Info</label>
        </td>
        <td>
       <input type="text" name="chobi" class="medium"/>
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
