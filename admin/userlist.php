<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
    
      <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>User List</h3>
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
              <th width="10%">No</th>            
              <th width="15%">Name</th>            
              <th width="15%">Username</th>
              <th width="20%">Email</th>          
              <th width="20%">Date</th>
              <th width="20%">Image</th>
            </tr>
          </thead>
      
           <?php 
               $query = "SELECT * FROM tbl_admin";
               $result = $db->select($query);
               if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
            ?>
          <tbody>
     
            <tr>            
              <td><?php echo $i;?></td>
              <td><?php echo $data['name'];?></td>
              <td><?php echo $data['username'];?></td>
              <td><?php echo $data['email'];?></td>
              <td><?php echo $sql_injection->formatDate($data['join_date']); ?></td>
              <td>
               <img src="<?php echo $data['image']; ?>" height="50px"; width="50px">
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