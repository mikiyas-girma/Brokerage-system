<?php ob_start(); ?>
<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header("Location: ../home.php");
    exit;
}
?>

<?php include("../includes/db.php"); ?>
<?php include("../admin/functions.php"); ?>

<?php

if (isset($_SESSION['username'])) {
    $session_username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$session_username'";
    $edit_user_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($edit_user_profile)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $password = $row['password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image         = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

?>

<?php

if (isset($_GET['p_id'])) {
    $the_get_post_id = mysqli_real_escape_string($connection, trim($_GET['p_id']));
    $query = "SELECT * FROM properties WHERE post_id = $the_get_post_id";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_user = $row['post_user'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
    }
}

?>

<?php

if (isset($_POST['update_post'])) {
    $post_title = mysqli_real_escape_string($connection, trim($_POST['post_title']));
    $post_category_id = mysqli_real_escape_string($connection, trim($_POST['post_category_id']));
    $post_user = mysqli_real_escape_string($connection, trim($_POST['post_user']));
    $post_status = mysqli_real_escape_string($connection, trim($_POST['post_status']));

    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name'];

    $post_tags = mysqli_real_escape_string($connection, trim($_POST['post_tags']));
    $post_content = mysqli_real_escape_string($connection, trim($_POST['post_content']));

    move_uploaded_file($post_image_tmp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM properties WHERE post_id = $the_get_post_id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }


    $query = "UPDATE properties SET post_category_id = $post_category_id, post_title = '$post_title',
post_user = '$post_user', post_date = now(), post_image = '$post_image',
post_content = '$post_content', post_tags = '$post_tags',
post_comment_count = $post_comment_count, post_status = '$post_status'
WHERE post_id = $the_get_post_id";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);

    echo "<p class='text-center text-success bg-success'>Post Updated. <a href='../postHome.php?p_id=$the_get_post_id'> View
        Post</a> </p>";


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>User profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/custom/user_profile.css">
    <link href="../fonts/font-awesome/css/all.min.css" rel="stylesheet">

    <!-- <link href="../css/bootstrap5/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../css/my_property.css" rel="stylesheet">
    <link href="../fonts/font-awesome/css/all.min.css" rel="stylesheet">


</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="portlet light profile-sidebar-portlet bordered">
                    <div class="profile-userpic">
                        <img src="../images/profile.jpg" class="img-responsive" alt>
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo $username; ?>
                        </div>
                        <div class="profile-usertitle-job">
                            <?php echo $user_role; ?>
                        </div>
                    </div>

                    <div class="profile-userbuttons">


                    </div>
                    <div class="profile-usermenu">
                        <ul class="nav">


                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class=""><a href="#"><i class=""></i> Name :
                                            <?php echo $user_firstname . " " . $user_lastname; ?>
                                        </a></li>
                                    <!-- <li><a href="#"><i class=""></i> Phone : <?php // echo "modify db to include phone" ?> </a></li> -->
                                    <li><a href="#"><i class=""></i>Email :
                                            <?php echo $user_email; ?>
                                        </a></li>
                                    <li><a href="#"><i class=""></i>User Role :
                                            <?php echo $user_role; ?>
                                        </a></li>
                                </ul>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 ml-auto mr-4">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <div class="btn-group">
                            <a class="btn btn-default" href="user_profile.php"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i> Back</a>
                        </div>
                        <i class="icon-globe theme-font hide"></i>
                    </div>
                </div>
                <form action="" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="post_title">Post Title:
                        </label>
                        <input type="text" name="post_title" value='<?php echo $post_title; ?>' class="form-control">
                        <div class="invalid-feedback" style="display: none; color: red;">
                            please enter a post title at least 3 characters
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="post_auhtor">User</label>
                        <select name="post_user" class="form-control">
                            <?php

                            if (isset($_SESSION['username'])) {
                                $session_username = $_SESSION['username'];

                                $query = "SELECT * FROM users where username = '$session_username'";
                                $result = mysqli_query($connection, $query);

                                confirmQuery($result);

                                while ($row = mysqli_fetch_array($result)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];

                                    echo "<option value='$username'>$username</option>";
                                }
                            }

                            ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="post_status">Post Status</label>
                        <select name="post_status" class="form-control">
                            <option value="draft"> Select Options</option>
                            <option value="published">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div> -->

                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" name="photos" value="<?php echo $post_image; ?>" class="form-control"
                            multiple>
                        <div class="invalid-feedback" style="display: none; color: red;">
                            Please select at least one image.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" name="post_tags" value='<?php echo $post_tags; ?>' class="form-control">
                        <div class="invalid-feedback" style="display: none; color: red;">
                            Please enter at least one tag. at least 3 characters
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea name="post_content" class="form-control" cols="30"
                            rows="10"><?php echo $post_content; ?></textarea>
                        <div class="invalid-feedback" style="display: none; color: red;">
                            Please enter some content. at least 5 words
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="update_post" name="create_post" class="btn btn-primary mr-3">
                        <a href="user_profile.php" class="btn btn-danger">Cancel</a>
                    </div>

                </form>

            </div>
            <script src="../admin/js/validateProperties.js"></script>
</body>

</html>