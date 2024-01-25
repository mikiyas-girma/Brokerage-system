<?php // include("includes/db.php"); ?>
<?php include "includes/home_header.php"; ?>

<body>
    <div id="page-wrapper">
        <div class="row m-6">
            <!-- Header start -->
            <header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
                <div class="top-header bg-secondary">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- logo part if available -->
            </header>
            <div class="hero overlay-black slider-banner1 position-relative">

                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 id="title" class="mb-1"><span class="text-primary">Brokerage</span><br>
                                    System</h1>
                                <!-- the logic inside php file -->
                                <?php include "registration.php" ?>
                                <div class="container">
                                    <div class="d-flex justify-content-center">
                                        <div class="card">
                                            <?php // include "registration.php" ?>

                                            <div class="myforms" style="padding: 0;">
                                                <!-- get errmsg from url and display it -->
                                                <?php
                                                if (isset($_GET['errmsg'])) {
                                                    $errmsg = $_GET['errmsg'];
                                                    echo "<h5 id='myalert' class='text-center text-danger'>$errmsg</h5>";
                                                }
                                                ?>
                                                <!-- login form -->
                                                <div id="login-form">
                                                    <div class="card-header">
                                                        <h3>Sign In</h3>
                                                        <div class="d-flex justify-content-end ">
                                                        </div>
                                                    </div>
                                                    <form action="includes/login.php" method="post"
                                                        onsubmit="return validateForm()">
                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input id="username" type="text" name="username"
                                                                class="form-control" placeholder="Username">
                                                            <div class="invalid-feedback">
                                                                enter your username
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-group">
                                                            <input id="password" type="password" name="password"
                                                                class="form-control" placeholder="Password">
                                                            <div class="invalid-feedback">
                                                                enter your password
                                                            </div>
                                                        </div>
                                                        <div id="submit" class="form-group">
                                                            <input type="submit" name="login" value="Login"
                                                                class="btn float login_btn">
                                                        </div>
                                                    </form>

                                                    <div class="card-footer mt-1">
                                                        <div class="d-flex justify-content-center links">
                                                            Don't have an account?<a id="signup-link"
                                                                class="text-primary" href="">Sign
                                                                Up</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- registration form -->
                                                <div class="m-4" id="register-form" style="display: none;">
                                                    <h1>Register</h1>
                                                    <form role="form" action="home.php" method="post" id="signup-form"
                                                        autocomplete="off">
                                                        <div class="form-group">
                                                            <label for="firstName" class="sr-only">First Name:</label>
                                                            <input type="text" name="firstName" id="firstname"
                                                                class="form-control" placeholder="First Name">
                                                            <div class="invalid-feedback">
                                                                enter your first name
                                                            </div>
                                                            <span id="firstNameError" class="error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lastName" class="sr-only">Last Name:</label>
                                                            <input type="text" name="lastName" id="lastname"
                                                                class="form-control" placeholder="Last Name">
                                                            <div class="invalid-feedback">
                                                                enter your last name
                                                            </div>
                                                            <span id="lastNameError" class="error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="sr-only">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control" placeholder="Email Address">
                                                            <div class="invalid-feedback">
                                                                enter valid email address
                                                            </div>
                                                            <span id="emailError" class="error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="sr-only">Username</label>
                                                            <input type="text" name="username" id="username"
                                                                class="form-control" placeholder="Username">
                                                            <div class="invalid-feedback">
                                                                enter username > 4 characters
                                                            </div>
                                                            <span id="usernameError" class="error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="sr-only">Password</label>
                                                            <input type="password" name="password" id="password"
                                                                class="form-control" placeholder="Password">
                                                            <div class="invalid-feedback">
                                                                enter your password
                                                            </div>
                                                            <span id="passwordError" class="error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" id="btn-register"
                                                                class="btn float-right login_btn m-4" value="Register">

                                                        </div>
                                                    </form>
                                                    <div class="d-flex justify-content-center links">
                                                        Already have an account?<a id="login-link" class="text-primary"
                                                            href="">Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text Block One -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <h2 class="text-secondary double-down-line text-center">Brokerage System</h2>
                    </div>
                </div>
                <div class="text-box-one">
                    <!-- Content -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="p-4 text-center hover-bg-white rounded mb-4 transation-1s shadow">
                                <i class="flaticon-rent text-primary flat-medium" aria-hidden="true"></i>
                                <h5 class="text-primary hover-text-primary py-3 m-0"><a href="#">Best for</a></h5>
                                <p>Multiple financial markets, empowering users to buy and sell stocks, bonds,
                                    commodities, and more with ease and efficiency such as Home, car, electronic device,
                                    lower and upper machine, and other shopping materials, etc.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s shadow">
                                <i class="flaticon-for-rent text-primary flat-medium" aria-hidden="true"></i>
                                <h5 class="text-primary hover-text-primary py-3 m-0"><a href="#">Rental Service</a>
                                </h5>
                                <p>The software offers a user-friendly platform that allows clients to browse and select
                                    from renting different properties such as home, car, house building materials,
                                    motorcycle, and other upper and lower machines, etc.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s shadow">
                                <i class="flaticon-diagram text-primary flat-medium" aria-hidden="true"></i>
                                <h5 id="conditions" class="text-primary hover-text-primary py-3 m-0">
                                    <a href="#">Terms
                                        and Conditions</a>
                                </h5>
                                <p>By accessing and using this software, you acknowledge and agree to the terms and
                                    conditions outlined below. These terms and conditions govern your use of the
                                    platform and establish the rights and obligations between you and the brokerage
                                    system. Please review these terms and conditions carefully before proceeding.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "includes/home_footer.php"; ?>