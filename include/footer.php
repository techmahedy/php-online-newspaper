
<div class="container">
   <div class="row">
    <div class="panel panle deafult">  
        <h2 style="text-align: center;"> পাঠকের মন্ত্যব্য</h2>    
    </div>
     <?php 
             $query = " select tbl_post.*, tbl_comment.*
                         from tbl_post
                         inner join tbl_comment
                         on tbl_post.id = tbl_comment.post_id limit 3";
             $comment  = $db->select($query);
             if($comment){
               while ($data = $comment->fetch_assoc()) {        
          ?> 
       <div class="col-lg-4 col-md-4 col-sm-4">     
         <div class="footer_widget wow fadeInLeftBig">         
            <h2><?php echo $data['title'];?></h2>
            <span>মন্ত্যব্য</span><br>
            <a href="post?post_id=<?php echo $data['post_id']; ?>"><?php echo $data['comment'];?><br>
            </a>
            <h6><span>মন্ত্যব্যকারী-</span> <?php echo $data['username'];?></h6>          
          </div>
          
        </div>
        <?php }  } ?>
     </div>
 </div>

<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>এখানে খুঁজুন</h2>
            <form action="data_search" method="get">
               <input type="text" name="search" placeholder="কি খোঁজ করতে চান এখানে লিখুন" class="form-control" required="">
              <input type="submit" name="submit" value="খুঁজুন" style="background: #d083cf; margin-top: 10px;" class="form-control">
            </form>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
              <h2>ক্যাটাগরি</h2>
        <?php 
             $query = "select * from category";
             $category  = $db->select($query);
             if($category){
              while ($data = $category->fetch_assoc()) {        
        ?> 
            <ul class="tag_nav">     
        <li><a href="category-post?post_id=<?php echo $data['id'];?>"><?php echo $data['category_name'];?></a></li>
          </ul>
            <?php } } ?>
          </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>যোগাযোগ</h2>
            <p>আমাদের সাথে যোগাযোগ করুন এই ঠিকানাই</p>
            <address>
             পাবনা বাস টার্মিনাল, এস. ১২৩,পাবনা ফোন: ১২৩-৩২৫-৬৫৭ ফ্যাক্স: ৪৫৪-৪৫৫-২৩৪
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">কপিরাইট &copy; ২০১৮ <a href="index">দৈনিক সুনামকন্ঠ</a></p>
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>