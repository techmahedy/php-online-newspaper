<?php include('include/header.php') ?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>আমাদের মেম্বার হোন</h2><br>

  <?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $email    = $_POST['email'];
      $password    = md5($_POST['password']);

      $query  = "SELECT * FROM user_registration WHERE email = '$email' AND password = '$password'";
        $result = $db->select($query);

        if(empty($email) || empty($password)){
           echo "<span style='color:red; font-size:18px;'>fill out this field first</span>";
        }
        elseif ($result == true) {
          $data = mysqli_fetch_array($result);
          $row = mysqli_num_rows($result);

          if ($row > 0) {
            Session::set_user("login",true);
            Session::set_user("username", $data['first_name']);
            Session::set_user("userId", $data['id']);
            echo "<script> window.location = 'index'; </script>";
          }else{
               echo "<span style='color:red; font-size:18px;'>No data found</span>";
          }
         }
         else{
          echo "<span style='color:red; font-size:18px;'>Username or Password not matched</span>";
         }
       }
  ?>

<form action="#"  method="post" class="contact_form">
  <input class="form-control" type="email" placeholder="আপনার ইমেইল*" name="email" required="">
 <input class="form-control" type="password" placeholder="আপনার পাসওয়ার্ড*" required="" name="password">
 <input type="submit" value="লগিন করুন">

  এখনো সাইন আপ করেন নি? এখানে সাইন আপু করুন <a href="signup.php" class="btn btn-default" style="background: #d083cf; color: white;" >সাইন আপ</a>
</form>
          </div>
        </div>
      </div>
     
  
      <?php include('include/sidebar.php'); ?>
    </div>
  </section>
 
    <?php include('include/footer.php'); ?>