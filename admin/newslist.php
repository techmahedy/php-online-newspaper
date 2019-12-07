<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
       
         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>News List</h3>
              </div>
           </div>

                <form>
            <?php 
              if (!isset($_GET["delnews_id"]) || $_GET["delnews_id"] == NULL ){
              
            }else{
              $id = $_GET["delnews_id"];

              $sql = "SELECT * FROM tbl_post WHERE id='$id'";
              $delpost= $db->select($sql);
              if ($delpost){
                 while ( $delimg = $delpost->fetch_assoc()){
                  $del_link = $delimg['image'];
                  unlink($del_link);
                 }
              }
              $del_query = "DELETE FROM tbl_post WHERE id='$id'";
              $deldata = $db->delete($del_query);
              if ($deldata) {
                 echo "<span style='color:green; font-size:18px;'>Post Deleted Successfully.</span>";

              }
              else{
                echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
              }
            }
            ?>
                    <table style="margin-left: 50px;">          
                      <thead>
            <tr>
              <th width="5%">No</th>
              <th width="10%">Title</th>
              <th width="15%">Description</th>
              <th width="10%">Category</th>
              <th width="10%">Image</th>
              <th width="10%">Author</th>
              <th width="10%">Tags</th>
              <th width="10%">Date</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
     <?php 
     $query = "select tbl_post.*,category.category_name
               from tbl_post
               inner join category
               on tbl_post.cat_id = category.id
               order by tbl_post.id desc limit 10";
     $result = $db->select($query);
     if($result){
      $i = 0;
      while ($data = $result->fetch_assoc()) {
         $i++;
     ?>
      <tbody>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['title']; ?></td>
          <td><?php echo $sql_injection->textShorten($data['body'],50); ?></td>
          <td><?php echo $data['category_name']; ?></td>
          <td> <img src="<?php echo $data['image']; ?>" height="50px"; width="50px"> </td>
          <td><?php echo $data['author']; ?></td>
          <td><?php echo $data['tags']; ?></td>
          <td><?php echo $sql_injection->formatDate($data['date']); ?></td>
          <td><a href="editnews.php?news_id=<?php echo $data['id'];?>" class="btn btn-info">Edit</a> 
    <?php 
      if(Session::get('userRole') == '0') {?>
                || <a onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?delnews_id=<?php echo $data['id'];?>" class="btn btn-info">Delete</a>
    <?php  } ?>
              </td>
            </tr>
            <?php } } ?>
          </tbody>
          
                    </table>
                  </form>
            
        
            </div>
          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  