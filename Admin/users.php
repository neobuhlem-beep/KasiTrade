<?php

session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

include("../includes/db.php");

$users = mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Users</title>

<link rel="stylesheet" href="../css/style.css">

<style>

.admin-container{
display:flex;
}

.sidebar{
width:220px;
background:#00b7c6;
min-height:100vh;
}

.sidebar h2{
color:white;
text-align:center;
padding-top:20px;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
}

.content{
flex:1;
padding:30px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th,td{
padding:12px;
border:1px solid #ddd;
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

<h1>Manage Users</h1>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($users)){ ?>

<tr>

<td><?php echo $row['user_id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>