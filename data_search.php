<?php include('include/header.php') ?>

 <section id="contentSection">
    <div class="row">
 <?php
 if (!isset($_GET['search']) || $_GET['search'] == NULL ){
  echo "<script> window.location = '404.php'; </script>";
 }
 else{
  $search = $_GET['search'];
  }
 ?>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
      
         <h2><span>আপনার অনুসন্ধান করা ডাটা </span></h2>
 

 <?php
  $query = "SELECT * from tbl_post where title LIKE '%$search%' OR body LIKE '%$search%'";
  $post = $db->select($query);
  if ($post){
    while ($result = $post->fetch_assoc()) {              
  ?>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="seepost?search_id=<?php echo $result['id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $result['image'];?>"> <span class="overlay"></span> </a>
                    <h6> <a href="seepost?search_id=<?php echo $result['id']; ?>"><?php echo $result['title'];?></a> </h6>            
                  </figure>
                </li>             
              </ul>    
            </div>
          </div>
      <?php } } else{ ?>

        <?php echo"আপনার অনুসন্ধানের কোন ডাটা পাওয়া যায়নি। "; }  ?>
          </div>
        </div>
      </div>
      <?php include('include/sidebar.php'); ?>
    </div>
  </section>
  <?php include('include/footer.php'); ?>