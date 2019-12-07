<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
    
      <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Category List</h3>
              </div>
            </div>
     <?php

       if (isset($_GET["deleteId"])){
         $id = $_GET["deleteId"];
         $query = "DELETE FROM category WHERE id = '$id'";
         $data = $db->delete($query);
         if ($data) {
             echo "<span style='color:green; font-size:18px;'>category deleted successfully </span>";
             }else{
               echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
             }
           }
      ?>


       <form>
         <table style="margin-left: 50px;">          
            <thead>
            <tr>
              <th width="15%">No</th>
             
              <th width="30%">Category Name</th>
             
              <th width="45%">Date</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
      
           <?php 
               $query = "SELECT * FROM category";
               $result = $db->select($query);
               if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
            ?>
          <tbody>
     
            <tr>            
              <td><?php echo $i;?></td>
              <td><?php echo $data['category_name'];?></td>
              <td><?php echo $sql_injection->formatDate($data['date']); ?></td>
              <td>
                <a style="margin-top: 3px;" onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?deleteId=<?php echo $data['id'];?>" class="btn btn-info">Delete
                </a>  
              </td>
            </tr>
         <?php  } } ?>
          </tbody>  
      </table>
    </form>
          
            </div>
          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  