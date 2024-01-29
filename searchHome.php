<?php
session_start();

if (!isset($_SESSION['user_role'])) {
   header("Location: home.php");
   exit;
}
?>

<?php include("includes/db.php"); ?>
<?php include "includes/searchHeader.php"; ?>
<?php include "includes/post_nav.php"; ?>

<section class="section">
   <div class="container">
      <div class="row">
         <div class="col-lg-8  mb-5 mb-lg-0">

            <?php

            $sql1 = "select * from properties ";
            $res1 = mysqli_query($connection, $sql1);

            if (!$res1) {
               die("Query failed " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($res1)) {
               $sound = "";
               if ($row['post_title'] != null) {

                  // $words = explode(" ", $row['post_title']);
                  $title = explode(" ", strtolower($row['post_title']));  // Normalize case
                  $tags = explode(" ", strtolower($row['post_tags']));      // Normalize case
                  $words = array_merge($title, $tags);


                  foreach ($words as $word) {
                     $sound .= metaphone($word) . " ";
                  }
               }
               $post_id = $row['post_id'];
               $sql2 = " update properties set indexing = '$sound' where post_id = $post_id ";
               $res2 = mysqli_query($connection, $sql2);
               if (!$res2) {
                  die("Query failed " . mysqli_error($connection));
               }
            }


            if (isset($_POST['search_query'])) {
               $query = strtolower($_POST['search_query']);  // Normalize case
               // separating the words and appending the metaphone of each words with a space
               $search = explode(" ", $query);
               $search_string = "";

               foreach ($search as $word) {
                  $search_string .= metaphone($word) . " ";
                  $sql = "select * from properties where indexing like '%$search_string%' and post_status = 'published'";
                  $res = mysqli_query($connection, $sql);

                  if (!$res) {
                     die("Query failed " . mysqli_error($connection));
                  }
               }

               if (mysqli_num_rows($res) == 0) {
                  echo "<h1 class='text-warning'>No property found.</h1>";
               } else {

                  while ($row = mysqli_fetch_array($res)) {
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
                                 <a href="#">
                                    <?php echo $post_user; ?>
                                 </a>
                              </li>
                              <li class="list-inline-item">Date :
                                 <?php echo $post_date; ?>
                              </li>
                              <li class="list-inline-item">Tags : <a href="#" class="ml-1">
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
            } else {
               header("Location: index.php");
            }
            ?>


         </div>
         <aside class="col-lg-4">
            <!-- @@include('blocks/sidebar.htm') -->
            <!-- Search -->
            <div class="widget">
               <h5 class="widget-title"><span>Search</span></h5>
               <form action="searchHome.php" method="post" class="widget-search">
                  <input style="border: solid 1px black; padding: 3px" id="search-query" name="search_query"
                     type="search" placeholder='<?php
                     if (isset($_POST['search_query'])) {
                        echo $_POST['search_query'];
                     } else {
                        echo 'Type &amp; Hit Enter...';
                     } ?>' class="search-input">

                  <script>
                     document.addEventListener("DOMContentLoaded", function () {
                        document.getElementById("search-query").focus();
                     });
                  </script>
                  <button type="submit" name="search"><i class="ti-search"></i>
                  </button>
               </form>
            </div>
            <!-- categories -->
            <div class="widget">
               <h5 class="widget-title"><span>Other properties</span></h5>
               <ul class="list-unstyled widget-list">
                  <?php
                  $query = "SELECT * FROM properties";
                  $result = mysqli_query($connection, $query);

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
                     <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">


                           <?php

                           $post_image = $row['post_image'];
                           $photoArray = explode(",", $post_image);

                           if (!empty($photoArray)) {
                              $firstPhoto = $photoArray[0]; // Get the first photo from the array
                        
                              // Assuming the images are stored in the "../images/" directory
                              $imagePath = "images/" . $firstPhoto;

                              echo "<img loading='lazy' src='$imagePath'  class='mr-3' alt=''>";
                           }

                           ?>

                           <div class="media-body">
                              <h5 class="h6 mb-0"><a href="">
                                    <a href='postHome.php?p_id=<?php echo $post_id ?>&p_user=<?php echo $post_user ?>'>
                                       <?php echo $post_title ?>
                                    </a>
                                 </a></h5>

                           </div>
                        </li>


                     <?php } ?>
                  </ul>
                  ?>
               </ul>
            </div>
            <!-- tags -->
            <div class="widget">
               <!-- <h5 class="widget-title"><span>Tags</span></h5> -->
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
               <!-- <h5 class="widget-title"><span>Latest Article</span></h5> -->
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