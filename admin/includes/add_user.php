<?php

if (isset($_POST['create_user'])) {
    $username = mysqli_real_escape_string($connection, trim($_POST['username']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));
    $user_firstname = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
    $user_lastname = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
    $user_email = mysqli_real_escape_string($connection, trim($_POST['user_email']));

    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_role = mysqli_real_escape_string($connection, trim($_POST['user_role']));

    move_uploaded_file($user_image_tmp, "../images/$user_image");

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users(username, password, user_firstname, user_lastname, user_email, 
                    user_image, user_role) VALUES('$username', '$password', '$user_firstname', '$user_lastname', 
                    '$user_email', '$user_image', '$user_role')";

    $create_user = mysqli_query($connection, $query);

    confirmQuery($create_user);

    echo "User Added Successfuly" . " " . "<a href='users.php'>View Users</a>";

}

?>


<form action="" method="post" onsubmit="return validateAddUser()" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input id="firstname" type="text" name="user_firstname" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            at least 2 letters & only letters allowed
        </div>
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input id="lastname" type="text" name="user_lastname" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            at least 2 letters & only letters allowed
        </div>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            > 3 characters start with at least 2 letters
        </div>
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input id="email" type="email" name="user_email" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            enter valid email address
        </div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control">
        <div class="invalid-feedback" style="display: none; color: red;">
            > 4 characters with at least 1 number & 1 letter
        </div>
    </div>



    <div class="form-group">
        <label for="user_image">Image</label>
        <input id="pp" type="file" name="user_image" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_role" class="form-control">
            <option value="Subscriber">Select User Role</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>

    </div>

    <div class="form-group">
        <input type="submit" value="Add User" name="create_user" class="btn btn-primary">
    </div>

</form>