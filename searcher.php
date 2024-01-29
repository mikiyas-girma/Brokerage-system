<html>

<body>
    <center>
        <form action="searcher.php" method="post">
            <input type="text" name="search_query" />
            <input type="submit" name="search">
        </form>
    </center>
</body>

</html>

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

<?php

$sql1 = "select * from properties ";
$res1 = mysqli_query($connection, $sql1);

if (!$res1) {
    die("Query failed " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($res1)) {
    $sound = "";
    if ($row['post_title'] != null) {
        $words = explode(" ", $row['post_title']);

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
    echo $_POST['search_query'] . "<br>";
    $query = $_POST['search_query'];
    // separating the words and appending the metaphone of each words with a space
    $search = explode(" ", $query);
    $search_string = "";

    foreach ($search as $word) {
        $search_string .= metaphone($word) . " ";
        echo $search_string . "<br>";
        $sql = "select * from properties where indexing like '%$search_string%'";
        $res = mysqli_query($connection, $sql);

        if (!$res) {
            die("Query failed " . mysqli_error($connection));
        }
    }

    if (mysqli_num_rows($res) == 0) {
        echo "No results found";
    } else {
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <h1>
                <?= $row['post_id'] ?>
            </h1>
            <h2>
                <?= $row['post_title'] ?>
            </h2>
            <p>
                <?= $row['post_content'] ?>
            </p>


            <?php
        }
    }
}



?>