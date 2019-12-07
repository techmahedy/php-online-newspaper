<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">



          <div class="single_sidebar">
            <h2><span>আজকের অধিক পঠিত নিউজ</span></h2>
            <ul class="spost_nav">
           <?php              
              $query  = "SELECT * FROM tbl_post                           
                         order by rand() limit 4";
              $result = $db->select($query);
              if ($result) {             
                while ($data = $result->fetch_assoc()) {        
            ?>
              <li>
                <div class="media wow fadeInDown">
                 <a href="post?post_id=<?php echo $data['id']; ?>" class="media-left">
                  <img alt="" src="admin/<?php echo $data['image'];?>"> </a>
                  <div class="media-body"> <a href="post?post_id=<?php echo $data['id']; ?>" class="catg_title"><?php echo $data['title'];?> 
                  </a> 
                  </div>
                </div>
               </li>                    
              </ul>
             <?php } } ?>    
          </div>





          <div class="single_sidebar"><!--Single Sidebar -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">ক্যাটাগরি</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">ভিডিও</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">মন্ত্যব্য</a></li>
            </ul>

            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="category">
          <?php 
             $query = "select * from category";
             $category  = $db->select($query);
             if($category){
              while ($data = $category->fetch_assoc()) {        
           ?> 
                <ul>
         
                  <li class="cat-item"><a href="category-post?post_id=<?php echo $data['id']; ?>"><?php echo $data['category_name'];?></a></li>
                </ul>
                <?php }  } ?> 
              </div>

              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="comments">
          <?php 
             $query = "select * from tbl_comment order by id desc limit 4";
             $comment  = $db->select($query);
             if($comment){
               while ($data = $comment->fetch_assoc()) {        
          ?> 
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown">
                     <a href="post?post_id=<?php echo $data['post_id'];?>" class="media-left"> 
                     </a>
                      <div class="media-body"> 
                        <a href="post?post_id=<?php echo $data['post_id'];?>" class="catg_title"> <?php echo $sql_injection->textShorten($data['comment']); ?>
                        </a>
                      </div>
                    </div>
                  </li>   
                </ul>
                <?php } } ?>   
              </div><!--Tab Panel -->
           </div><!--Tab Content -->
          </div><!--Single Sidebar -->
          



      <div class="single_sidebar wow fadeInDown">
        <h2><span>Sponsor</span></h2>
       <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a>
     </div>
        
      <div class="single_sidebar wow fadeInDown">
       <h2><span>এখানে খুঁজুন<span></h2>
            <form action="data_search.php" method="get">
               <input type="text" name="search" placeholder="কি খোঁজ করতে চান এখানে লিখুন" class="form-control" required="">
              <input type="submit" name="submit" value="খুঁজুন" style="background: #d083cf; margin-top: 10px;" class="form-control">
            </form>
       </div>

        </aside>
      </div>