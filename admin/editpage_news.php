 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">
    <?php 
        if (!isset($_GET["page_news_id"]) || $_GET["page_news_id"] == NULL ){
         echo "<script> window.location = 'page_post_list.php'; </script>";
      }else{
        $id = $_GET["page_news_id"];
      }
    ?>

         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update News </h3>
              </div>
            </div>

  <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $title  = mysqli_real_escape_string($db->link,$_POST['title']);
        $category    = mysqli_real_escape_string($db->link,$_POST['category']);
        $body   = mysqli_real_escape_string($db->link,$_POST['body']);
        $tags   = mysqli_real_escape_string($db->link,$_POST['tags']);
        $author = mysqli_real_escape_string($db->link,$_POST['author']);
        $userid = mysqli_real_escape_string($db->link,$_POST['userid']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;

        if ($title == "" || $category == "" || $body == "" || $tags == "" || $author == ""){
        echo "<span style='color:red;'> please fill out this field first</span>";
        }

        
      if (!empty($file_name)){
          
        if ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        }
        elseif (in_array($file_ext, $permited) === false){
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } 

      else{
           move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE page_post
                  SET 
                  category_id='$category',
                  title='$title',
                  body='$body',
                  image='$uploaded_image',
                  author='$author',
                  tags='$tags',
                  userid='$userid'
                  WHERE id='$id'";
                 


         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:18px;'>Post updated successfully</span>";
            
        }
        else {
          echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
      }
  }
  else{
        
        $query = "UPDATE page_post
                  SET 
                  category_id='$category',
                  title='$title',
                  body='$body',
                  author='$author',
                  tags='$tags',
                  userid='$userid'
                  WHERE id='$id'";
                 


         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:18px;'>Post Updated Successfully.</span>";
            
        }
        else {
          echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
  }


   }
?>
  <form action="" method="post" enctype="multipart/form-data">
    <?php
      $query = "SELECT * FROM page_post WHERE id='$id' ORDER BY id DESC";
      $getpost = $db->select($query);
      if ($getpost) {
         $i = 0;
       while ( $postresult = $getpost->fetch_assoc()){
      
    ?> 

    <table>
       
        <tr>
            <td>
                <label>Title</label>
            </td>
            <td>
                <input type="text" class="medium" name="title" value="<?php echo $postresult['title']; ?>" />
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
                    $query = "select * from tbl_page";
                    $data = $db->select($query);
                    if ($data) {
                       while ($result = $data->fetch_assoc()) {     
                
                    ?>

                   <option <?php
             //etar karon select option a category show kora
               if ($postresult['category_id'] == $result['id'] ) { ?>
                   selected="selected"
            <?php   } ?>

                    value="<?php echo $result['id']; ?>">
                    <?php echo $result['name']; ?></option>

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
               <img src="<?php echo $postresult['image']; ?>"  height="40px" width="60px">
                <input type="file" name="image" />
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="body">
                    <?php echo $postresult['body']; ?>"
                </textarea>

            </td>
        </tr>
        
    <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
       <input type="text" name="tags" class="medium" value="  <?php echo $postresult['tags']; ?>"" />
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
                <input type="submit" name="submit" Value="Update" />
            </td>
        </tr>
    </table>
    <?php } } ?>
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
