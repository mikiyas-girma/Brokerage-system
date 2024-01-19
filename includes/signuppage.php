<?php
// FILEPATH: /D:/xampp/htdocs/Brokerage/includes/signuppage.php

// Define variables and set to empty values
$name = $email = $password = $confirm_password = "";
$nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = sanitizeInput($_POST["name"]);
        // Additional validation rules for name if needed
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST["email"]);
        // Additional validation rules for email if needed
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = sanitizeInput($_POST["password"]);
        // Additional validation rules for password if needed
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirm_password = sanitizeInput($_POST["confirm_password"]);
        // Additional validation rules for confirm password if needed
    }

    // Perform further actions if all fields are valid
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // Process the signup logic here
        // ...
        // Redirect to success page or display success message
        // ...
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
            <span class="error"><?php echo $confirmPasswordErr; ?></span>

            <input type="submit" name="submit" value="Signup">
        </form>
    </div>
</body>
</html>
