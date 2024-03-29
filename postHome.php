<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header("Location: home.php");
    exit;
}
?>

<?php include("includes/db.php"); ?>
<?php include "includes/post_header.php"; ?>
<?php include "includes/post_nav.php"; ?>

<!-- <section class="section"> -->
<div class="container mt-3">
    <div class="row">
        <div class="message col-lg-7 mr-auto mb-5 mb-lg-0">

            <?php

            if (isset($_GET['p_id'])) {
                $the_get_post_id = $_GET['p_id'];

                $query = "SELECT * FROM properties WHERE post_id = $the_get_post_id ";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $post_id = $row['post_id'];
                    // $post_category_id   = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];


                    ?>


                    <div class="post row mb-5 ">

                        <div class="col-12 mx-auto">
                            <h3><a class="post-title " href="">
                                    <?php echo $post_title; ?>
                                </a></h3>
                            <ul class="list-inline post-meta mb-4">
                                <li class="list-inline-item"><i class="ti-user mr-2"></i>
                                    <a href="">
                                        <?php echo $post_user; ?>
                                    </a>
                                </li>
                                <li class="list-inline-item">Date :
                                    <?php echo $post_date; ?>
                                </li>
                                <li class="list-inline-item">Tags : <a href="#!" class="ml-1">
                                        <?php echo $post_tags; ?>
                                    </a> ,<a href="#!" class="ml-1"></a>
                                </li>
                            </ul>
                            <!-- <p><?php echo $post_content; ?></p> -->
                            <!-- <a href="" class="btn btn-outline-primary">Continue Reading</a> -->
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

                                    echo "<img loading='lazy' src='$imagePath' class='post-image img-fluid ' style='width: 100%; height: 400px;' alt='post-thumb'>";
                                }


                                ?>

                            </div>
                        </div>
                    </div>

                <?php }
            } ?>

            <?php

            if (isset($_POST['create_comment'])) {
                $the_get_post_id = $_GET['p_id'];
                $the_get_post_user = $_GET['p_user'];
                $comment_receiver = mysqli_real_escape_string($connection, trim($_GET['p_user']));
                $comment_author = $_SESSION['username'];
                $comment_email = $_SESSION['email'];
                $commet_content = mysqli_real_escape_string($connection, trim($_POST['comment_content']));

                if (!empty($comment_author) && !empty($comment_receiver) && !empty($comment_email) && !empty($commet_content)) {
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_receiver, comment_email, 
                            comment_content, comment_status, comment_date) VALUES($the_get_post_id, 
                            '$comment_author', '$the_get_post_user', '$comment_email', '$commet_content', 'unapproved', now())";

                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die("Query failed " . mysqli_error($connection));
                    }

                    // $query = "UPDATE properties SET post_comment_count = post_comment_count + 1 
                    //         WHERE post_id = $the_get_post_id";
                    // $increasing_commet_count = mysqli_query($connection, $query);
            
                } else {
                    echo "<script>alert('Fields cannot be empty')</script>";
                }


            }

            ?>


        </div>
        <?php
        ?>
        <div class="well col-lg-5 my-auto ">
            <h4>Leave a Message to :
                <?php echo $_GET['p_user']; ?>
            </h4>

            <form action="" method="post" role="form">
                <div class="form-group">
                    <label for="comment_content">Your Message</label>
                    <textarea name="comment_content" class="form-control" rows="7" required></textarea>
                </div>

                <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>
<!-- </section> -->

<div class="container">
</div>
<div class="scroll-top ">
    <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>

</div>
<div class="text-center">
    <p class="content">&copy; 2023 <a href="#" target="_blank">Jimma, Ethiopia</a></p>
</div>
</div>


<!-- JS Plugins -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js" async></script>
<script src="plugins/slick/slick.min.js"></script>

<!--  Script -->
<script src="js/Sliderscript.js"></script>

</body>

</html>