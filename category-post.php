<?php include('include/header.php') ?>

 <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
    <?php
      if(!isset($_GET['post_id']) || $_GET['post_id'] == NULL){
         echo "<script> window.location = '404.php'; </script>";
      }
      else{
          $post_id = $_GET['post_id'];
      }
     ?>

     <?php
        $sql ="select * from tbl_post
              where cat_id = '$post_id' ";

            $category_post  = $db->select($sql);
            
             if($category_post){
              $i=0;
              while ($data = $category_post->fetch_assoc()) {  
                $i++;
                if ($i == 2) {
                  break;
                }
         ?>
     
        
       <h2><span><?php echo $data['tags']; ?></span></h2>

       <?php } } ?>  

       <?php
         $sql ="select * from tbl_post
              where cat_id = '$post_id' limit 20";

            $category_post  = $db->select($sql);
  
             if($category_post){
              while ($data = $category_post->fetch_assoc()) {  
         ?>

          <div class="col-lg-4 col-md-4 col-sm-4">        
              <ul class="business_catgnav  wow fadeInDown">

    
             <li>
  <figure class="bsbig_fig"> <a href="post?post_id=<?php echo $data['id']; ?>" class="featured_img"> <img alt="" src="admin/<?php echo $data['image'];?>"> <span class="overlay"></span> </a>
                    <h6> <a href="post?post_id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a> </h6>            
                  </figure>
              </li>         
              </ul>
          
          </div>
           <?php } } else { echo 'এই ক্যাটাগরির কোন পোস্ট নেই'; } ?>
          </div>
        </div>
      </div>
      <?php include('include/sidebar.php'); ?>

    </div>
  </section>


  <?php include('include/footer.php'); ?>