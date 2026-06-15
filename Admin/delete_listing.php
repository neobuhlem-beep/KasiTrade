<?php

session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

include("../includes/db.php");

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM items WHERE item_id='$id'"
);

header("Location: listings.php");

exit();

?>