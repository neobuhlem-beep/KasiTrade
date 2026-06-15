<?php

session_start();


if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

session_destroy();

header("Location: ../login.php");

exit();

?>