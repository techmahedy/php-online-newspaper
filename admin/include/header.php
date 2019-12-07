<?php include '../library/Session.php'; 
      Session::checkSession();
?>

<?php include '../config/config.php'; ?>
<?php include '../library/Database.php'; ?>
<?php include '../library/Helper.php'; ?>

<?php 
 $db = new Database();
 $sql_injection = new helper()
?>

<?php  
      header("Cache-Control: no-cache, must-revalidate"); 
      header("Pragma: no-cache"); 
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
      header("Cache-Control: max-age=2592000");  
?>



     <?php
          if (isset($_GET['action']) && $_GET['action'] == "logout") {
              Session::destroy();  
              exit();                   
          }
      ?>
      
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="img/icon.png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
 
    <link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="dist/css/form.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <?php   
    $userId = Session::get('userId');
    $userRole = Session::get('userRole'); 
      ?>

      <header class="main-header">
        <a href="index.php" class="logo"><h1 style="font-family: impact; font-size: 20px;">Admin Panel</h1></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
              <?php
                 $query  = "SELECT * FROM user_contact where flag = '0'";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
               ?>
               <?php } } ?>
                  <span class="label label-success"><?php if (isset($i)) {
                   echo $i;
                  } else echo"0" ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $i;?> unseen messages</li>
                  <li>
                    <ul class="menu">
             <?php
                $query  = "SELECT * FROM user_contact where flag = '0'";
                   $result = $db->select($query);
                 if ($result) {
                   $i=0;
                  while ($data = $result->fetch_assoc()) {
                 $i++;
               ?>              
                      <li><a href="inbox.php">
                          <h4>
                      <?php echo $data['username']; ?>
                            <small><i class="fa fa-clock-o"></i>  <?php echo $sql_injection->formatDate($data['date']); ?></small>
                          </h4>
                          <p><?php echo $data['comments'];?></p> </a>             
                      </li>
                <?php } } ?> 
                    </ul>
                  </li>
                  <li class="footer"><a href="inbox.php">See All Messages</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <?php
                 $query  = "SELECT * FROM tbl_admin where id = '$userId'";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
               ?>
           
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php  echo $data['image']; ?>" class="user-image" alt=""/>
                  <span class="hidden-xs"><?php  echo $data['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php  echo $data['image']; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php  echo $data['name']; ?>- Web Developer
                      <small>Member since <?php echo $sql_injection->formatDate($data['join_date']); ?><</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="user_profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <?php }  } ?>
            </ul>
          </div>
        </nav>
      </header>
