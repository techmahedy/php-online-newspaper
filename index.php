<?php include('include/header.php'); ?>

<section id="sliderSection">
    <div class="row">


      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
            <?php 
                  
                    //For Slider Data Option
              $query  = "SELECT * FROM tbl_post order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
               ?>
          <div class="single_iteam"> <a href="post?post_id=<?php echo $data['id'];?>"> <img src="admin/<?php echo $data['image'];?>" alt=""></a>
            <div class="slider_article">
            
              <h2><a class="slider_tittle" href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a></h2>
            <a href="post?post_id=<?php echo $data['id'];?>" style="color:white;"><?php echo $sql_injection->textShorten($data['body']); ?></a>
             
            </div>
          </div>
         <?php } } ?>
        </div>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>নতুন খবর</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
           <ul class="latest_postnav">
              <li>

              <?php 
                    //For Notun Khobor Data Option
              $query  = "SELECT * FROM tbl_post order by id desc limit 5";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
               ?>

               <div class="media"> <a href="post?post_id=<?php echo $data['id'];?>" class="media-left"> <img alt="" src="admin/<?php echo $data['image'];?>"> </a>
                  <div class="media-body"> <a href="post?post_id=<?php echo $data['id'];?>" class="catg_title"><?php echo $data['title'];?></a> </div>
              </div>
              <?php } } ?>
            </li>
         </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>বাংলাদেশ</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
              <?php 
              //For Banijjo Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '1' order by id desc";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                  $i++;
                  if ($i == 2) {
                    break;
                  }
             
               ?>
                  <figure class="bsbig_fig"> <a href="post?post_id=<?php echo $data['id'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $data['image'];?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a> </figcaption>
                    <p><?php echo $sql_injection->textShorten($data['body']); ?></p>
                  </figure>
                </li>
                 <?php } } ?>
              </ul>
            </div>
        
            <div class="single_post_content_right">
              <ul class="spost_nav">
            <?php 
              //For Banijjo Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '1' order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {     
               ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="post?post_id=<?php echo $data['id'];?>" class="media-left"> <img alt="" src="admin/<?php echo $data['image'];?>"> </a>
                    <div class="media-body"> <a href="post?post_id=<?php echo $data['id'];?>" class="catg_title"><?php echo $data['title'];?></a> </div>
                  </div>
                </li>
              </ul>
              <?php } } ?>
            </div>
          </div>

          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>বিনোদন</span></h2>
                <ul class="business_catgnav wow fadeInDown">
             <?php 
              //For Binodon Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '5' order by id desc";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                  $i++;
                  if ($i == 2) {
                    break;
                  }          
               ?>
                  <li>
                    <figure class="bsbig_fig"> <a href="post?post_id=<?php echo $data['id'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $data['image'];?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a> </figcaption>
                      <p> <?php echo $sql_injection->textShorten($data['body']); ?></p>
                    </figure>
                  </li>
                </ul>
                <?php } } ?>


                <ul class="spost_nav">
               <?php 
              //For Binodon Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '5' order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {                 
             
               ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="post?post_id=<?php echo $data['id'];?>" class="media-left"> <img alt="" src="admin/<?php echo $data['image'];?>"> </a>
                      <div class="media-body"> <a href="post?post_id=<?php echo $data['id'];?>" class="catg_title"><?php echo $data['title'];?></a> </div>
                    </div>
                  </li>              
                </ul>
                <?php } } ?>
              </div>
            </div>

            <div class="technology">
              <div class="single_post_content">
                <h2><span>খেলা </span></h2>
                <ul class="business_catgnav">
            <?php 
              //For Khelar Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '3' order by id desc limit 1";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {        
              ?>

                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="post?post_id=<?php echo $data['id'];?>" class="featured_img"> <img alt="" src="admin/<?php echo $data['image'];?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a> </figcaption>
                      <p><?php echo $sql_injection->textShorten($data['body']); ?></p>
                    </figure>
                  </li>
                  <?php } } ?>
                </ul>


                <ul class="spost_nav">
            <?php 
              //For Khelar Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '3' order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {        
              ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="post?post_id=<?php echo $data['id'];?>" class="media-left"> <img alt="" src="admin/<?php echo $data['image'];?>"> </a>
                      <div class="media-body"> <a href="post?post_id=<?php echo $data['id'];?>" class="catg_title"><?php echo $data['title'];?></a> </div>
                    </div>
                  </li>  
              <?php } } ?>
                </ul>
              </div>
            </div>  
          </div>

          <div class="single_post_content">
            <h2><span>আন্তর্জাতিক</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
              <?php 
              //For Rajniti Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '2' order by id desc limit 1";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {        
              ?>
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="post?post_id=<?php echo $data['id'];?>"> <img src="admin/<?php echo $data['image'];?>" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title']; ?></a> </figcaption>
                    <p><?php echo $sql_injection->textShorten($data['body']); ?></p>
                  </figure>
                </li>
                <?php } } ?>
              </ul>
            </div>


            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php 
              //For Rajniti Khobor Data Option
              $query  = "SELECT * FROM tbl_post    
                         where cat_id = '2' order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {        
              ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="post?post_id=<?php echo $data['id'];?>" class="media-left"> <img alt="" src="admin/<?php echo $data['image']; ?>"> </a>
                    <div class="media-body"> <a href="post?post_id=<?php echo $data['id'];?>" class="catg_title"><?php echo $data['title']; ?></a> </div>
                  </div>
                </li>    
                <?php }  } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <?php include('include/sidebar.php'); ?>


    </div>
  </section>


  <?php include('include/footer.php'); ?>