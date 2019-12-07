<?php include('include/header.php') ?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">

   
            <h2>আমাদের মেম্বার হোন</h2><br>
             <?php
 
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
     $first_name = $sql_injection->validation($_POST['first_name']);
     $last_name    = $sql_injection->validation($_POST['last_name']);
     $email     = $sql_injection->validation($_POST['email']);
     $password    = $sql_injection->validation(md5($_POST['password']));

     
     $first_name = mysqli_real_escape_string($db->link,$first_name);
     $last_name  = mysqli_real_escape_string($db->link,$last_name); 
     $email      = mysqli_real_escape_string($db->link,$email);
     $password   = mysqli_real_escape_string($db->link,$password); 
     
    
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "<span style='color:red; font-size:18px;'>sorry, email address is invalid</span>";
     }
     else{
      $query = "INSERT INTO 
                user_registration(first_name,last_name,email,password) 
                VALUES('$first_name','$last_name','$email','$password') ";

         $inserted_rows = $db->insert($query);
        if ($inserted_rows){
         echo "<span style='color:green; font-size:18px;'>User registration successfully done , please login</span>";         
        }
        else {
         echo "<span style='color:red; font-size:18px;'>Sorry! there has been error</span>";
        }
     }
  

}

?>

<form action="" method="post" class="contact_form">
    <input class="form-control" type="text" placeholder="আপনার প্রথম নাম*" name="first_name" required="">
    <input class="form-control" type="text" placeholder="আপনার শেষনাম*" name="last_name" required="">
    <input class="form-control" type="email" placeholder="আপনার ইমেইল*" name="email" required="">
    <input class="form-control" type="password" placeholder="আপনার পাসওয়ার্ড*" name="password" required="">
   <input type="submit" value="রেজিস্ট্রার" name="submit">সাইন আপ করেছেন? এখানে লগিন করুন <a href="login.php" class="btn btn-default" style="background: #d083cf; color: white;" >লগিন</a>
</form>
          </div>
        </div>
      </div>
     
  
      <?php include('include/sidebar.php'); ?>
    </div>
  </section>
 
    <?php include('include/footer.php'); ?>