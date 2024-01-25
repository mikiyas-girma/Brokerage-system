<?php include("includes/db.php"); ?>
<?php include "includes/searchHeader.php"; ?>
<?php include "includes/searchNav.php"; ?>

<section class="section">
   <div class="container">
      <div class="row">
         <div class="col-lg-8  mb-5 mb-lg-0">

            <?php
            if (isset($_POST['submit'])) {
               $search = $_POST['search'];

               $query = "SELECT * FROM properties WHERE post_status = 'published' AND  post_title  LIKE '%$search%' AND post_tags  LIKE '%$search%' order by post_id desc";
               $result = mysqli_query($connection, $query);

               if (!$result) {
                  die("Query failed " . mysqli_error($connection));
               }

               $count = mysqli_num_rows($result);

               if ($count == 0) {
                  echo "<h1 class='text-warning'>No property found.</h1>";
               } else {

                  while ($row = mysqli_fetch_array($result)) {
                     $post_id = $row['post_id'];
                     // $post_category_id   = $row['post_category_id'];
                     $post_title = $row['post_title'];
                     $post_user = $row['post_user'];
                     $post_date = $row['post_date'];
                     // $post_image         = $row['post_image'];
                     $post_content = substr($row['post_content'], 0, 120);
                     $post_tags = $row['post_tags'];
                     $post_comment_count = $row['post_comment_count'];
                     $post_status = $row['post_status'];


                     ?>


                     <article class="row mb-5 ">

                        <div class="col-12 mx-auto">
                           <h3><a class="post-title " href="post-elements.html">
                                 <?php echo $post_title; ?>
                              </a></h3>
                           <ul class="list-inline post-meta mb-4">
                              <li class="list-inline-item"><i class="ti-user mr-2"></i>
                                 <a href="author.html">
                                    <?php echo $post_user; ?>
                                 </a>
                              </li>
                              <li class="list-inline-item">Date :
                                 <?php echo $post_date; ?>
                              </li>
                              <li class="list-inline-item">Categories :
                                 <?php
                                 $categoryQuery = "SELECT * FROM properties";
                                 $categoryResult = mysqli_query($connection, $categoryQuery);
                                 if ($categoryResult) {
                                    while ($categoryRow = mysqli_fetch_array($categoryResult)) {
                                       $categoryName = $categoryRow['post_title'];
                                       echo "<a href='#!' class='ml-1'>$categoryName</a>";
                                    }
                                 }
                                 ?>
                              </li>
                              <li class="list-inline-item">Tags : <a href="#!" class="ml-1">
                                    <?php echo $post_tags; ?>
                                 </a> ,<a href="#!" class="ml-1"></a>
                              </li>
                           </ul>
                           <!-- <p><?php echo $post_content; ?></p> -->
                           <!-- <a href="post-elements.html" class="btn btn-outline-primary">Continue Reading</a> -->
                        </div>
                        <div class="col-11 col-md-10 col-lg-12">
                           <p>
                              <?php echo $post_content; ?>
                           </p>
                           <div class="post-slider">

                              <?php

                              $post_image = $row['post_image'];
                              $photoArray = explode(",", $post_image);

                              foreach ($photoArray as $photo) {
                                 // Assuming the images are stored in the "../images/" directory
                                 $imagePath = "images/" . $photo;

                                 echo "<img loading='lazy' src='$imagePath' class='img-fluid ' style='width: 100%; height: 400px;' alt='post-thumb'>";
                              }


                              ?>

                           </div>
                        </div>
                     </article>

                     <?php
                  }
               }
            } ?>


         </div>
         <aside class="col-lg-4">
            <!-- @@include('blocks/sidebar.htm') -->
            <!-- Search -->
            <div class="widget">
               <h5 class="widget-title"><span>Search</span></h5>
               <form action="searchHome.php" method="post" class="widget-search">
                  <input id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
                  <button type="submit" name="submit"><i class="ti-search"></i>
                  </button>
               </form>
            </div>
            <!-- categories -->
            <div class="widget">
               <h5 class="widget-title"><span>Categories</span></h5>
               <ul class="list-unstyled widget-list">
                  <?php
                  $categoryQuery = "SELECT * FROM properties";
                  $categoryResult = mysqli_query($connection, $categoryQuery);
                  if ($categoryResult) {
                     while ($categoryRow = mysqli_fetch_array($categoryResult)) {
                        $categoryName = $categoryRow['post_title'];
                        $categoryCount = $categoryRow['post_id'];
                        echo "<li><a href='#!' class='d-flex'>$categoryName<small class='ml-auto'>($categoryCount)</small></a></li>";
                     }
                  }
                  ?>
               </ul>
            </div>
            <!-- tags -->
            <div class="widget">
               <h5 class="widget-title"><span>Tags</span></h5>
               <!-- <ul class="list-inline widget-list-inline">
                  <li class="list-inline-item"><a href="#!">Booth</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">City</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">Image</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">New</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">Photo</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">Seasone</a>
                  </li>
                  <li class="list-inline-item"><a href="#!">Video</a>
                  </li>
               </ul> -->
            </div>
            <!-- latest post -->
            <div class="widget">
               <h5 class="widget-title"><span>Latest Article</span></h5>
               <!-- post-item -->
               <!-- <ul class="list-unstyled widget-list">
                  <li class="media widget-post align-items-center">
                     <a href="post-elements.html">
                        <img loading="lazy" class="mr-3" src="images/post/post-6.jpg">
                     </a>
                     <div class="media-body">
                        <h5 class="h6 mb-0"><a href="post-elements.html">Elements That You Can Use To Create A New Post
                              On
                              This Template.</a></h5>
                        <small>March 15, 2020</small>
                     </div>
                  </li>
               </ul> -->
               <!-- <ul class="list-unstyled widget-list">
                  <li class="media widget-post align-items-center">
                     <a href="post-details-1.html">
                        <img loading="lazy" class="mr-3" src="images/post/post-1.jpg">
                     </a>
                     <div class="media-body">
                        <h5 class="h6 mb-0"><a href="post-details-1.html">Cheerful Loving Couple Bakers Drinking
                              Coffee</a>
                        </h5>
                        <small>March 14, 2020</small>
                     </div>
                  </li>
               </ul> -->
               <!-- <ul class="list-unstyled widget-list">
                  <li class="media widget-post align-items-center">
                     <a href="post-details-2.html">
                        <img loading="lazy" class="mr-3" src="images/post/post-2.jpg">
                     </a>
                     <div class="media-body">
                        <h5 class="h6 mb-0"><a href="post-details-2.html">Cheerful Loving Couple Bakers Drinking
                              Coffee</a>
                        </h5>
                        <small>March 14, 2020</small>
                     </div>
                  </li>
               </ul> -->
            </div>
         </aside>
      </div>
   </div>
</section>

<!-- JS Plugins -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js" async></script>
<script src="plugins/slick/slick.min.js"></script>

<!--  Script -->
<script src="js/Sliderscript.js"></script>
</body>

</html>