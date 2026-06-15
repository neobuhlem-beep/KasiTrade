<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}
include("../includes/db.php");

$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$totalListings = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM items"));
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../css/style.css">

<style>

.admin-container{
display:flex;
min-height:100vh;
}

.sidebar{
width:220px;
background:#00b7c6;
padding-top:20px;
}

.sidebar h2{
text-align:center;
color:white;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
font-weight:bold;
}

.sidebar a:hover{
background:#0097a7;
}

.content{
flex:1;
padding:30px;
}

.stats{
display:flex;
gap:20px;
margin-top:30px;
}

.stat-box{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px gray;
width:200px;
text-align:center;
}

</style>

</head>

<body>

<div class="admin-container">

<div class="sidebar">

<h2>KasiTrade Admin</h2>

<a href="dashboard.php">Dashboard</a>

<a href="users.php">Users</a>

<a href="listings.php">Listings</a>

<a href="logout.php">Logout</a>

</div>

<div class="content">

<h1>Dashboard</h1>

<div class="stats">

<div class="stat-box">
<h3>Total Users</h3>
<p><?php echo $totalUsers; ?></p>
</div>

<div class="stat-box">
<h3>Listings</h3>
<p><?php echo $totalListings; ?></p>
</div>

</div>

</div>

</div>

</body>

</html>