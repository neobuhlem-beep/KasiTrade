<?php

session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

include("../includes/db.php");

$id = $_GET['id'];

$sql = "UPDATE items
SET status='rejected'
WHERE item_id='$id'";

mysqli_query($conn,$sql);

header("Location: listings.php");

?>