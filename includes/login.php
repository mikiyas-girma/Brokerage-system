<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("db.php"); ?>

<?php

if (isset($_POST['login'])) {
     $username = mysqli_real_escape_string($connection, trim($_POST['username']));
     $password = mysqli_real_escape_string($connection, trim($_POST['password']));

     $query = "SELECT * FROM users WHERE username = '$username'";
     $result = mysqli_query($connection, $query);

     if (!$result) {
          die("Query failed " . mysqli_error($connection));
     }

     if (mysqli_num_rows($result) == 0) {
          // Username not found in the database
          $errmsg = "Invalid username or password";
          header("Location: ../home.php?errmsg=$errmsg");
     } else {
          $row = mysqli_fetch_array($result);
          $db_user_id = $row['user_id'];
          $db_username = $row['username'];
          $db_password = $row['password'];
          $db_email = $row['user_email'];
          $db_user_firstname = $row['user_firstname'];
          $db_user_lastname = $row['user_lastname'];
          $db_user_role = $row['user_role'];

          if (password_verify($password, $db_password)) {
               $_SESSION['user_id'] = $db_user_id;
               $_SESSION['username'] = $db_username;
               $_SESSION['password'] = $db_password;
               $_SESSION['email'] = $db_email;
               $_SESSION['user_firstname'] = $db_user_firstname;
               $_SESSION['user_lastname'] = $db_user_lastname;
               $_SESSION['user_role'] = $db_user_role;

               if ($db_user_role == 'Admin') {
                    header("Location: ../admin/index.php");
               } elseif ($db_user_role == 'Subscriber') {
                    header("Location: ../index.php");
               }
          } else {
               // Password does not match
               $errmsg = "Invalid username or password";
               header("Location: ../home.php?errmsg=$errmsg");
          }
     }
}

?>