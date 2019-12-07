<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
 <?php
     if (!isset($_GET["textid"]) || $_GET["textid"] == NULL ){
     echo "<script> window.location = 'index.php'; </script>";
     }else{
        $textid = $_GET["textid"];
     }
  ?>
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
          <h1>
            Inbox
          </h1>
              </div>
              </div>
      
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
                      <span class="label label-primary pull-right"><?php echo $i; ?></span>
                  <?php }  } ?>
                    </a> </li>



                    <li><a href="junk.php"><i class="fa fa-filter"></i> Junk 
          <?php
               $sql = "SELECT * FROM  user_contact WHERE flag = '1'";
               $message = $db->select($sql);
               if ($message) {
                $i = 0;
                  while ( $result = $message->fetch_assoc()) {
                    $i++;              
            
           ?>

                     <span class="label label-waring pull-right"><?php echo $i; ?></span>
               <?php }  } ?>
             </a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Seen Message</h3>
   <?php 

   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $tomail =$_POST['to'];
      $fromemail =$_POST['fromemail'];
      $message = $_POST['message'];

      $sendmail = mail($tomail,$fromemail,$message);
      if($sendmail){
        echo "<span style='color:green; font-size:20px;'> text Sent Successfully </span>";
    }else{
        echo "<span style='color:red; font-size:20px;'>Sorry There has been error!!! Try again </span>";
     }
                 
    }  
  ?>
                </div><!-- /.box-header -->
                <div class="box-body">
         <form action="" method="post">
  <?php
    $sql = "SELECT * FROM  user_contact WHERE id='$textid'";
        $message = $db->select($sql);
         if ($message) {
          while ( $result = $message->fetch_assoc()) {
               
    ?>
        
         <table class="table table-striped" style="margin-left: 32px;">
          <tr>
            <td>
                <label>To</label>
            </td>
            <td>
                <input type="text" value="<?php echo $result['email'];?>" class="medium" name="to" readonly="" />
            </td>
        </tr>
    
        <tr>
        <td>
            <label>From</label>
        </td>
        <td>
       <input type="email" style="width: 300px;" name="fromemail" class="medium" placeholder="Enter email"  />
        </td>
      </tr>

       <tr>
        <td>
            <label>Date</label>
        </td>
        <td>
       <input type="text" name="date" class="medium" value="<?php echo $result['date'];?>" readonly=""/>
        </td>
      </tr>

        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Message</label>
            </td>
            <td>
                <textarea class="tinymce" name="message">
                
                </textarea>
            </td>
        </tr>
      
        <tr>
            <td></td>
            <td>
                <input type="submit" style="line-height: 50%" name="submit" value="Send" class="btn btn-info">  </td>
        </tr>
                    </table>
              <?php } } ?>
         </form>
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
