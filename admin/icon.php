<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Social Icon</h3>
              </div>
              </div>
 <form action="" method="post">
     <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $facebook = $sql_injection->validation($_POST['facebook']);
        $twitter = $sql_injection->validation($_POST['twitter']);
        $instagram = $sql_injection->validation($_POST['instagram']);
        $pintarest = $sql_injection->validation($_POST['pintarest']);
        $google_plus = $sql_injection->validation($_POST['google_plus']);
        $linkedin = $sql_injection->validation($_POST['linkedin']);
        $youtube = $sql_injection->validation($_POST['youtube']);
        $yahoo = $sql_injection->validation($_POST['yahoo']);
      

         if ($facebook == "" || $twitter == "" || $instagram == "" || $youtube == "" || $google_plus == "" || $linkedin == "" || $yahoo == "" || $pintarest == ""){
           echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
         }
         else{
              $query = "UPDATE tbl_icon
                  SET 
                  facebook='$facebook',
                  twitter='$twitter',
                  instagram='$instagram',
                  pintarest='$pintarest',                 
                  google_plus='$google_plus',
                  linkedin='$linkedin',
                  youtube='$youtube',
                  yahoo='$yahoo'
                  WHERE id='1'";
         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:18px;'>Icon Updated</span>";
            
        }
        else {
             echo "<span style='color:red; font-size:18px;'>Sorry,there has been problem. try again</span>";
        }
     }
   }
  ?>
        
  <table>     
                      
       <?php 
         $sql = "SELECT * FROM  tbl_icon WHERE id='1'";
        $message = $db->select($sql);
         if ($message) {
          while ( $result = $message->fetch_assoc()) {

       ?>
        <tr>
            <td>
                <label>Facebook</label>
            </td>
            <td>
                <input type="text" class="medium" name="facebook" value="<?php  echo $result['facebook'];?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Twitter</label>
            </td>
            <td>
                <input type="text" class="medium" name="twitter" value="<?php  echo $result['twitter'];?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label>instagram</label>
            </td>
            <td>
                <input type="text" class="medium" name="instagram" value="<?php  echo $result['twitter'];?>" />
            </td>
        </tr>
        <tr>
            <td>
                <label>pintarest</label>
            </td>
            <td>
                <input type="text" class="medium" name="pintarest"  value="<?php  echo $result['pintarest'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>google_plus</label>
            </td>
            <td>
                <input type="text" class="medium" name="google_plus"  value="<?php  echo $result['google_plus'];?>"/>
            </td>
        </tr>
        
        <tr>
            <td>
                <label>linkedin</label>
            </td>
            <td>
                <input type="text" class="medium" name="linkedin" value="<?php  echo $result['linkedin'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>youtube</label>
            </td>
            <td>
                <input type="text" class="medium" name="youtube" value="<?php  echo $result['youtube'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>yahoo</label>
            </td>
            <td>
                <input type="text" class="medium" name="yahoo" value="<?php  echo $result['yahoo'];?>"/>
            </td>
        </tr>
       

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
        <?php } } ?>
    </table>
    </form>
        
           </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>

<?php include 'include/footer.php'; ?>
