<?php
$uploadDir = "../images/"; // Directory to store uploaded photos

if (isset($_POST['create_post'])) {
    $post_title = mysqli_real_escape_string($connection, trim($_POST['post_title']));
    $post_user = mysqli_real_escape_string($connection, trim($_POST['post_user']));
    $post_status = mysqli_real_escape_string($connection, trim($_POST['post_status']));

    $fileCount = count($_FILES['photos']['name']);
    $photoData = [];

    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['photos']['name'][$i];
        $fileTmp = $_FILES['photos']['tmp_name'][$i];
        $fileDestination = $uploadDir . $fileName;

        move_uploaded_file($fileTmp, $fileDestination);

        $fileNames[] = mysqli_real_escape_string($connection, $fileName);

        // read the uploaded photo file
        $photoData[] = file_get_contents($fileDestination);
    }

    // Concatenate the file names into a single string
    $post_image = implode(",", $fileNames);

    // Concatenate the photo data into a single string
    $photoData = implode(",", $photoData);
    $photoData = mysqli_real_escape_string($connection, $photoData);


    $post_tags = mysqli_real_escape_string($connection, trim($_POST['post_tags']));
    $post_content = mysqli_real_escape_string($connection, trim($_POST['post_content']));

    $post_date = date('d-m-y');
    $post_comment_count = 4;

    //   move_uploaded_file($post_image_tmp, "../images/$post_image");

    $query = "INSERT INTO properties(post_title, post_user, post_date, post_image, 
                    post_content, post_tags, post_status) VALUES( 
                    '$post_title', 
                    '$post_user', now(), '$post_image', '$post_content', '$post_tags',  
                    '$post_status')";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);

    $the_get_post_id = mysqli_insert_id($connection);

    echo "<p class='text-center text-success bg-success'>Post Created. <a href='../postHome.php?p_id=$the_get_post_id&p_user=$post_user'> View Post</a></p>";

}

?>

<div>

</div>

<form action="" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
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


    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="photos[]" class="form-control" multiple>
        <div class="invalid-feedback" style="display: none; color: red;">
            Please select at least one image.
        </div>
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            Please enter at least one tag. at least 3 characters
        </div>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" cols="30" rows="10"></textarea>
        <div class="invalid-feedback" style="display: none; color: red;">
            Please enter some content. at least 5 words
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Publish Post" name="create_post" class="btn btn-primary">
    </div>

</form>