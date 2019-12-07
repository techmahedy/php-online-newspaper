<?php 
  include'library/Session.php';
  session_start();
?>

<?php 
      if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        session_destroy();
        echo "<script> window.location = 'index'; </script>";
        exit();
      }
?>
    
     <?php
          if (isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
          }
          
      
     ?>
<?php 
 include 'config/config.php'; 
 include 'library/Database.php'; 
 include 'library/Helper.php'; 

 $db = new Database();
 $sql_injection = new helper();
?>

<!DOCTYPE html>
<html>
<head>
  <?php
       //Showing page name on header
       if (isset($_GET['post_id'])) {
          $page_title_id = $_GET['post_id'];
           $sql = "select * from tbl_post where cat_id = '$page_title_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['tags']; ?>/<?php echo TITLE; ?></title>
                     <?php
                   } 
                 } 
              }  
          elseif (isset($_GET['page_id'])) {
                   $page_title_id = $_GET['page_id'];
           $sql = "select * from tbl_page where category_id = '$page_title_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['name']; ?>/<?php echo TITLE; ?></title>
                     <?php
                   } 
                 } 
             }
         elseif (isset($_GET['post_id'])) {
                   $page_title_id = $_GET['post_id'];
           $sql = "select * from page_post where id = '$page_title_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['title']; ?>/<?php echo TITLE; ?></title>
                     <?php
                   } 
               } 
           }              
       // For getting post title name on header
        if (isset($_GET['post_id'])) {
          $post_id = $_GET['post_id'];
           $sql = "select * from tbl_post where id = '$post_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['title']; ?>/<?php echo TITLE; ?></title>
                     <?php  } }  } 

       else { ?>
       <title><?php echo $sql_injection->title(); ?>/<?php echo TITLE; ?></title>
       <?php } ?>
<title>বাংলা নিউজপেপার</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">

         <?php 
           //HIGHLIGHTING NAV BAR
            $path = $_SERVER['SCRIPT_FILENAME'];
            $current_page = basename($path,'.php');
           ?>
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a <?php if ($current_page == 'index'){ echo 'id="active"';}?> href="index">হোম</a></li>
              <li><a <?php if ($current_page == 'contact'){ echo 'id="active"';}?> href="contact">যোগাযোগ</a></li>
            <?php 
            $sql = "select * from tbl_page";
                 $data = $db->select($sql);
               if ($data) {
                while ($result = $data->fetch_assoc()) { 
            ?>

            <li><a  <?php /*Page Hilighting */
             if (isset($_GET['page_id']) && $_GET['page_id'] == $result['category_id']){
              echo "id='active'";
              }
             ?>

             href="page_post?page_id=<?php echo $result['category_id'];?>"><?php echo $result['name'];?>
               

             </a></li>
            <?php }  } ?>
            </ul>
          </div>


    <div class="header_top_right">       
      <h5 style="color: #FFF; margin-top: 20px;"><?php echo date("d/m/Y"); ?></h5>
   </div>

        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index" class="logo"><h2 style="font-size: 40px; font-weight: 800;"> দৈনিক সুনামকন্ঠ</h2></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show"></span></a></li>

        <?php 
             $query = "select * from category";
             $category  = $db->select($query);
             if($category){
              while ($data = $category->fetch_assoc()) {        
        ?> 

          <li><a 
                <?php /*Page Hilighting */
               if (isset($_GET['post_id']) && $_GET['post_id'] == $data['id']){
                echo "id='active'";
               }
             ?>

             href="category-post?post_id=<?php echo $data['id'];?>"><?php echo $data['category_name'];?></a></li>  

             <?php }  } else { ?>  

             <?php  } ?>

          
          <?php  if(!Session::get_user('userId')){ ?>
            <li><a 
              <?php if ($current_page == 'login'){ echo 'id="active"';}     ?> href="login">লগিন
            </a></li>
          <?php } ?>

          <li><a 
            <?php if ($current_page == 'signup'){ echo 'id="active"';}?> href="signup">সাইন আপ</a></li>
           <li><a href=""></a></li>

          <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">

             <?php 
             if (Session::get_user('username')) {
                echo Session::get_user('username');         
                  $username = Session::get_user('username');
             ?> 
       
         </a>
            <ul class="dropdown-menu" role="menu">

               <?php
                   
                     $query = "select * from  tbl_comment
                     where username = '$username'"; 
                     $data = $db->select($query);
                      $i=0;
                     if ($data) {
                     while ($result = $data->fetch_assoc()) {
                      $i++;
                ?>
              <li><a href="#">আপনার মন্তব্য  ( <?php echo $i; ?> )</a></li>
            <?php  } } ?> 
              <li><a href="#">আপনার অবদান</a></li>
              <li><a href="?action=logout">সাইন আউট</a></li>  
           <?php } ?>
                  
            </ul> 
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>এইমাত্র পাওয়া খবর </span>
         <ul id="ticker01" class="news_sticker">
           <?php                 
           //For Breaking News Data Option
              $query  = "SELECT * FROM tbl_breaking_news order by id desc limit 4";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {           
            ?>
            <li><a href="" style="text-decoration: none;">
              <?php echo $data['title'];?></a>

             <?php } } ?>

           </li>          
          </ul>
     
<div class="social_area">
  <ul class="social_nav">
    <li class="facebook"><a href="https://www.facebook.com/niloy.afnan.18"></a></li>
    <li class="twitter"><a href="https://twitter.com/metacentric_sr"></a></li>
    <li class="flickr"><a href="#"></a></li>
    <li class="pinterest"><a href="#"></a></li>
    <li class="googleplus"><a href="https://plus.google.com/u/0/112168511279465682583"></a></li>
    <li class="vimeo"><a href="#"></a></li>
    <li class="youtube"><a href="https://www.youtube.com/channel/UCzmJ_0Ef9EE-NS7w82zez_A"></a></li>
    <li class="mail"><a href="mahedy150101@gmail.com"></a></li>
  </ul>
</div>
        </div>
      </div>
    </div>
  </section>
  
   <style type="text/css">
     #active{background: #d083cf;}
   </style>