<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
          <h1>
            Inbox
          </h1>
              </div>
          </div>
          
     <?php
 // for sending to trash box
       error_reporting(0);
    if (isset($_GET["trashid"])){             
         $trashid = $_GET["trashid"];

        $sql = "UPDATE  user_contact
                SET flag = '1'
                WHERE id = '$trashid'";
            $text = $db->update($sql);
             if ($text) {
             echo "<span style='color:green; font-size:18px'>Message sent successfully to trash box</span>";
             }else{
                echo "<span style='color:red;font-size:18px'>Sorry, try again</span>";
             }
        }

    ?>
               <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="index.php" class="btn btn-primary btn-block margin-bottom">Back to Dashboard</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="inbox.php"><i class="fa fa-inbox"></i> Inbox 
                     
           <?php
               $sql = "SELECT * FROM  user_contact WHERE flag = '0'";
               $message = $db->select($sql);
               if ($message) {
                $i = 0;
                  while ( $result = $message->fetch_assoc()) {
                    $i++;              

           ?>
                      <span class="label label-primary pull-right"><?php if (isset($i)) {
                      echo $i;
                      } else echo "0"; ?></span>
                       <?php   }  } ?>    
                    </a>                  
                  </li>

                   


                    <li><a href="junk.php"><i class="fa fa-filter"></i> Junk
          <?php
               $sql = "SELECT * FROM  user_contact WHERE flag = '1'";
               $message = $db->select($sql);
               if ($message) {
                $i = 0;
                  while ( $result = $message->fetch_assoc()) {
                    $i++;              
             }  } 
           ?>

                     <span class="label label-waring pull-right"><?php if (isset($i)) {
                      echo $i;
                      } else echo "0"; ?>
                   </a></li>

                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped" style="margin-left: 32px;">
                      <thead>   
                          <tr>
                          <th width="10">Serial No.</th>
                          <th width="10%">Username</th>
                          <th width="10%">Email</th>                          
                          <th width="20%">Message</th>
                          <th width="10%">Date</th>
                          <th width="40%">Action</th>
                        </tr>       
                     </thead>
         <?php
               $sql = "SELECT * FROM  user_contact WHERE flag = '0' ORDER BY id DESC LIMIT 5";
               $message = $db->select($sql);
               if ($message) {
                $i = 0;
                  while ( $result = $message->fetch_assoc()) {
                    $i++;              
            
          ?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $result['username'];?></td>
                          <td><?php echo $result['email'];?></td>
                          <td><?php echo  $sql_injection->textShorten($result['comments'],20);?></td>
                          <td><?php echo $sql_injection->formatDate($result['date']); ?></td>
                          <td><a href="seentext.php?textid=<?php echo $result['id']; ?>" class="btn btn-danger">View</a>|| <a onclick ="return confirm('Are you sure to send this text to trash box?')" href="?trashid=<?php echo $result['id']; ?>" class="btn btn-danger">Trash</a></td></td>
                        </tr>
                      </tbody>
                 <?php } } ?>     
                    </table>

        
          </div>
        </div>
         
             
        
                </div><!-- /.box-body -->              
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
         
           </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>

<?php include 'include/footer.php'; ?>
