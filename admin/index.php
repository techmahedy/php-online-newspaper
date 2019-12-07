<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content-header">
          <h1 style="font-family: impact;">
            Website Overview
          </h1>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
  <?php
  $query = "SELECT * from page_post";
  $post = $db->select($query);
  if ($post){
    $i=0;
    while ($result = $post->fetch_assoc()) {  
    $i++;   
     }
    }         
  ?>
                  <h3><?php echo $i; ?></h3>
                 
                  <p>Page News</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="page_post_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>
             
              <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
<?php
  $query = "SELECT * from tbl_page";
  $post = $db->select($query);
  if ($post){
    $i=0;
    while ($result = $post->fetch_assoc()) {  
    $i++;   
     }
    }         
  ?>
                  <h3><?php echo $i; ?></h3>
                  <p>Page</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="pagelist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>

             <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  
 <?php
  $query = "SELECT * from tbl_admin";
  $post = $db->select($query);
  if ($post){
    $i=0;
    while ($result = $post->fetch_assoc()) {  
    $i++;   
     }
    }         
  ?>
                  <h3><?php echo $i; ?></h3>
                  <p>User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="userlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
 <?php
   $query = "SELECT * from  tbl_comment";
     $post = $db->select($query);
      if ($post){
      $j=0;
     while ($result = $post->fetch_assoc()) {  
    $j++;   
     }
    }         
  ?>
                  <h3><?php echo $j; ?></h3>
                  <p>User Comments</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="commentlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>

          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  