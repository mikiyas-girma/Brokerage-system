<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Admin') {
    header("Location: ../home.php");
    exit;
}
?>

<?php include("includes/header.php"); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>
                            <?php echo $_SESSION['username']; ?>
                        </small>
                    </h1>
                    <?php
                    // Displaying pages based on condition
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }

                    switch ($source) {
                        case 'add_post':
                            include("includes/add_post.php");
                            break;

                        case 'edit_post':
                            include("includes/edit_post.php");
                            break;

                        default:
                            include("includes/view_all_comments.php");
                            break;
                    }

                    ?>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("includes/footer.php"); ?>