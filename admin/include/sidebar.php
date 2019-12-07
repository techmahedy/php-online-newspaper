 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
     <?php   
    $userId = Session::get('userId');
    $userRole = Session::get('userRole'); 
      ?>

              <?php
                 $query  = "SELECT * FROM tbl_admin where id = '$userId'";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
               ?>
            <div class="pull-left image">
              <img src="<?php  echo $data['image']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php  echo $data['name']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <?php } } ?>
          </div>

          <!-- search form -->
          <form action="news_search.php" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search..." style="margin-bottom: 5px;" />
              <span class="input-group-btn">
                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>        
          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Manage News</span>
               <?php
                 $query  = "SELECT * FROM tbl_post";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
                  } 
                }
               ?>

                <span class="label label-primary pull-right"><?php echo $i; ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addnews.php"><i class="fa fa-circle-o"></i> Add News</a></li>
                <li><a href="newslist.php"><i class="fa fa-circle-o"></i> News List</a></li>
              </ul>
            </li>
             

              <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Category</span>
              <?php
                 $query  = "SELECT * FROM category";
                  $result = $db->select($query);
                   if ($result) {
                    $i=0;
                    while ($data = $result->fetch_assoc()) {
                   $i++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php echo $i; ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_cat.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
                <li><a href="cat_list.php"><i class="fa fa-circle-o"></i> Category List</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Manage Page</span>
                <?php
                  $query  = "SELECT * FROM tbl_page";
                   $result = $db->select($query);
                    if ($result) {
                     $i=0;
                    while ($data = $result->fetch_assoc()) {
                   $i++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php echo $i; ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addpage.php"><i class="fa fa-circle-o"></i> Add Page</a>
      <?php 
         $query = "SELECT * from tbl_page";
  $post = $db->select($query);
  if ($post){
    while ($page = $post->fetch_assoc()) {  
   
         ?>    
                <a href="addpage_post.php">  <i class="fa fa-circle-o"></i><?php echo $page['name']; ?></a>
              
    <?php } } ?> 

                </li>    
           
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Social Icon</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="icon.php"><i class="fa fa-circle-o"></i>Update Social Icon</a></li>             
              </ul>
            </li>
             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Check Inbox</span>
                <?php
                 $query  = "SELECT * FROM user_contact where flag='0'";
                   $result = $db->select($query);
                   if ($result) {
                     $i=0;
                    while ($data = $result->fetch_assoc()) {
                   $i++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php echo $i; ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="inbox.php">
                  <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <?php
             $query  = "SELECT * FROM user_contact";
                 $result = $db->select($query);
                  if ($result) {
                   $i=0;
                    while ($data = $result->fetch_assoc()) {
                   $i++;
                  } 
                }
               ?>
                 <span class="label label-primary pull-right"><?php echo $i; ?></span>
                </a></li>                         
              </ul>
            </li>

           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>User</span>
             <?php
               $query  = "SELECT * FROM tbl_admin";
                 $result = $db->select($query);
                  if ($result) {
                   $i=0;
                    while ($data = $result->fetch_assoc()) {
                   $i++;
                  } 
                }
               ?>
              <span class="label label-primary pull-right"><?php echo $i; ?></span>
              </a>
               <ul class="treeview-menu">
              <li><a href="adduser.php"><i class="fa fa-circle-o"></i>Add User</a><span class="label label-primary pull-right"><?php echo $i; ?></span></li>
              <li><a href="userlist.php"><i class="fa fa-circle-o"></i>User List</a></li> 
                <li><a href="user_profile.php"><i class="fa fa-circle-o"></i>User Profile</a></li> 
                <li><a href="update_pass.php"><i class="fa fa-circle-o"></i>Change Password</a></li>         
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Copy Right</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="copyright.php"><i class="fa fa-circle-o"></i>Update Copyright</a></li>                    
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Breaking News</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="breaking_news.php"><i class="fa fa-circle-o"></i>Add Breaking News</a></li>                    
              </ul>
            </li>
          
          
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Address</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="address.php"><i class="fa fa-circle-o"></i>Update Address</a></li>                    
              </ul>
            </li>
           
            <li class="header">www.doinik-sunamkontho.com</li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>