<?php

$host = "sql105.infinityfree.com";
$user = "if0_42146674";
$password = "TsvXGclZbSP0kw";
$database = "if0_42146674_KasiTrades";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>