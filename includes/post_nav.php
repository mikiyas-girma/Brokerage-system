<?php // Add PHP opening tag here ?>

<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
   <div class="container">

      <nav class="navbar navbar-expand-lg navbar-white">
         <a class="navbar-brand" href="index.php">
            <img class="img-fluid" width="150px" src="mainimages/" alt="">Brokerage system
         </a>
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-menu"></i>
         </button>

         <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
               <!-- <li class="nav-item dropdown">
                  <a class="nav-link" href="index.php">
                     homepage
                  </a>
               </li> -->
               <!-- another list item that navigates to user_profile.php -->
               <li class="nav-item dropdown">
                  <a class="btn btn-primary" href="user/user_profile.php">
                     <i class="ti-plus"></i>ADD POST
                  </a>
               </li>

               <?php
               if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
                  echo "<li class='nav-item'> <a class='nav-link' href='./admin/index.php'>Dashboard</a>  </li>";
               }
               ?>

               <li class="nav-item">
                  <!-- <a class="nav-link" href="#">Contact</a> -->
               </li>


               <?php
               if (isset($_SESSION['user_role'])) {
                  echo " <li class='nav-item dropdown'>
            <a class='nav-link text-primary' href='#' role='button' data-toggle='dropdown' aria-haspopup='true'
            aria-expanded='false'><i class='fa fa-user'></i>";
                  echo $_SESSION['username'] .
                     " <b class='caret'></b></a>
            <div class='dropdown-menu'>"; // Close PHP tag here
               
                  if ($_SESSION['user_role'] == 'Admin') {
                     echo "<a class='dropdown-item' href='./admin/profile.php'><i class='fa fa-fw fa-user'></i> Profile</a>";
                  } else {
                     echo "<a class='dropdown-item' href='user/user_profile.php'><i class='fa fa-fw fa-user'></i> Profile</a>";
                  }

                  echo "
               <a class='dropdown-item' href='includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
               
            </div>
            </li>  ";
               }

               ?>

               <?php
               if (!isset($_SESSION['user_role'])) {
                  ?>
                  <li class='<?php echo $registration_class; ?>'><a class="nav-link" href='home.php'>Login</a> </li>
               <?php } else {

                  ?>
                  <!-- <li><a>this is displayed when the condition is false!</a></li> -->
                  <?php
               }
               ?>

         </div>
      </nav>
   </div>
</header>
<?php // Add PHP closing tag here ?>