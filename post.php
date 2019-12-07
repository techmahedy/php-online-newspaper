<?php include('include/header.php') ?>
   
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
    <?php
      if(!isset($_GET['post_id']) || $_GET['post_id'] == NULL){
         echo "<script> window.location = '404'; </script>";
      }
      else{
          $post_id = $_GET['post_id'];
      }
     ?>
         <div class="single_page">   
              <?php 
              $query  = "select * from tbl_post where id = '$post_id'";

              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
             ?>  

             <h1><?php echo $data['title'];?></h1>        
             <div class="post_commentbox"> 
               <a href="#"><i class="fa fa-user"></i><?php echo $data['author'];?></a> 
              <span><i class="fa fa-calendar"></i>
                <?php echo $sql_injection->formatDate($data['date']); ?>
              </span> 
             <a href="#"><i class="fa fa-tags"></i><?php echo $data['tags'];?></a>
            </div>

            <div class="single_page_content"> <img class="img-center" src="admin/<?php echo $data['image'];?>" alt="">
                <p style="margin-left: 190px;"><?php echo $data['chobi'];?></p>
              <p><?php echo $data['body']; ?></p>                     
            </div>  


  <div class="social_link">
    <ul class="sociallink_nav">
      <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <li><a href="http://www.google-plus.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="http://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="http://www.pinterest.com" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    </ul>
  </div>
             
       <div class="related_post">           
              <h2>এই সম্পর্কিত আরো পোস্ট <i class="fa fa-thumbs-o-up"></i></h2>
               <?php
                    $category_id =  $data['cat_id']; 
                    $query       = "select * from tbl_post where cat_id = '$category_id' limit 3";
                    $all_related_post  = $db->select($query);
                    if ($all_related_post){
                    while ( $data = $all_related_post->fetch_assoc()) {        
              ?>
              <ul class="spost_nav wow fadeInDown animated">
                <li>
                  <div class="media"> <a class="media-left" href="post?post_id=<?php echo $data['id'];?>"> <img src="admin/<?php echo $data['image'];?>" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a> </div>
                  </div>
                </li>    
              </ul>
          <?php } } else { echo "এই সম্পর্কিত আর কোন পোস্ট নেই ";}?> </div>  
 
    <!--Comment Start-->
      <div class="comment">
         <h2>মন্তব্য</h2>

       <?php
           error_reporting(0);
               $query = "select * from tbl_comment where post_id = '$post_id' order by id desc";
               $comment = $db->select($query);
               if ($comment) {
                while (  $data = $comment->fetch_assoc()) {
                
             ?>       
               <span><i class="fa fa-user"></i></span><strong style="margin-right: -10px;r"><?php echo $data['username']; ?></strong><br> 
              <p> <?php echo $data['comment']; ?></p>
              <P style="float: right; font-weight: bold"><?php echo $sql_injection->formatDate($data['date']); ?> </P>
      
         <?php } }  else { echo "এই পোস্টের কোন মন্তব্য নেই ";}?>
           </div>  

     
               

     <!--Comment End-->

        <h2>আরো পোস্ট যা আপনি হয়ত চাচ্ছেন</h2>
        <?php 
             // $post_id =  $data['id']; 
              $query  = "SELECT * FROM tbl_post
                         order by rand() limit 5";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
        ?>
            <ul>
                <li><a href="post?post_id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a></li>             
           </ul>
          <?php } } ?>
          </div>         
     <?php } } ?>
        </div>      
    </div>
     

  <p>আজকের তাপমাত্রা - ৩৪ডিগ্রী সেলসিয়াস</p>

     <?php include('include/sidebar.php'); ?>

     <div class="contact_area">
<h2>এই পোস্টের ব্যপারে মতামত জানাতে লগিন করুন । 
   <?php  
           $userId = Session::get_user('userId');
               if (!$userId) {
                           
   ?>
            
            <p>এখানে ক্লিক করুন</p>
             <a href="login" style="background: #d083cf;" class="btn btn-default">লগিন</a></h2>

       <?php }  ?>

   <?php  
           $userId = Session::get_user('userId');
               if ($userId) {
                           
   ?>


   <?php
   //Comment System  
   if (isset($_GET['post_id'])) {
      $post_id = $_GET['post_id'];
    } 
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username  = $_POST['username'];
    $email = $_POST['email'];
    $comment  = $_POST['comment'];
   
    if (empty($username) || empty($email) || empty($comment)) {
       echo "<span style='color:red; font-size:18px;'> please fill out this field first</span>";   
    }
    else{
       $sql = "INSERT INTO `tbl_comment` (`id`, `username`, `email`, `comment`, `date`, `post_id`) VALUES (NULL, '$username', '$email', '$comment', CURRENT_TIMESTAMP, '$post_id')";
        
         $user = $db->insert($sql);
            if ($user){
              echo "<script> alert('আপনার মতামতের জন্য ধন্যবাদ '); </script>";            
            }else{
              echo "<span style='color:red; font-size:18px;'>দুঃখিত, মন্তব্য করতে আআব্র চেষ্টা করুন </span>";
           }
        } 
      }
  ?>

            <form action="#" class="contact_form" method="post">
              <input class="form-control" type="text" placeholder="আপনার নাম*" name="username" required="">

              <input class="form-control" type="email" placeholder="আপনার ইমেইল*" name="email" required="">

              <textarea class="form-control" cols="30" rows="10" placeholder="আপনার মতামত*" name="comment" required=""></textarea>
              <input type="submit" value="কমেন্ট করুন">
            </form>
         <?php } ?>   
          </div>
    </div>
  </section>

 <?php include('include/footer.php'); ?>

 <style type="text/css">
      .comment{background: white; margin-bottom: 15px;}      
      strong{font-size: 20px; margin-left: 10px;}
      .text{height:30px; width:400px;}
      .text_area{height:150px; width:400px;}
      .error{color:red; font-size:18px;}
    </style>
