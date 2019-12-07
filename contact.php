<?php include('include/header.php') ?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>আমাদের সাথে যোগাযোগ করুন</h2><br>
     <?php      
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
     $username = $sql_injection->validation($_POST['username']);
     $email     = $sql_injection->validation($_POST['email']);
     $comments    = $sql_injection->validation($_POST['comments']);

     $username  = mysqli_real_escape_string($db->link,$username); 
     $email      = mysqli_real_escape_string($db->link,$email);
     $comments   = mysqli_real_escape_string($db->link,$comments); 
     
    
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "<span style='color:red; font-size:18px;'>sorry, email address is invalid</span>";
     }
     else{
      $query = "INSERT INTO 
                user_contact(username,email,comments) 
                VALUES('$username','$email','$comments') ";

         $inserted_rows = $db->insert($query);
        if ($inserted_rows){
         echo "<span style='color:green; font-size:18px;'>আপনার মেসেজ পৌঁছে গেছে । ধন্যবাদ </span>";         
        }
        else {
         echo "<span style='color:red; font-size:18px;'>দুঃখিত! আবার চেষ্টা করুন </span>";
        }
     }
}
?>

  <form action="#" method="post" class="contact_form">
    <input class="form-control" type="text" placeholder="আপনার নাম*" required="" name="username">
    <input class="form-control" type="email" placeholder="আপনার ইমেইল*" required="" name="email">
    <textarea class="form-control" cols="30" rows="10" placeholder="আপনার মতামত*" name="comments"></textarea>
    <input type="submit" value="পাঠান">
  </form>
          </div>
        </div>
      </div>
     
  
      <?php include('include/sidebar.php'); ?>
    </div>
  </section>
 
    <?php include('include/footer.php'); ?>