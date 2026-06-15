<?php

session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin_login.php");
    exit();
}

include("../includes/db.php");

$listings = mysqli_query($conn,
"SELECT items.*, users.fullname, users.email
 FROM items
 JOIN users ON items.user_id = users.user_id"
);
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Listings</title>

<link rel="stylesheet" href="../css/style.css">

<style>

.admin-container{
display:flex;
min-height:100vh;
}

.sidebar{
width:220px;
background:#00b7c6;
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
font-weight:bold;
}

.sidebar a:hover{
background:#0097a7;
}

.content{
flex:1;
padding:30px;
}

.listings-box{
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 0 10px gray;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th{
background:#f2f2f2;
}

th,td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

.action-btn{
padding:8px 12px;
border-radius:5px;
text-decoration:none;
font-weight:bold;
margin:2px;
display:inline-block;
}

.approve{
background:#28a745;
color:white;
}

.reject{
background:#dc3545;
color:white;
}

.delete{
background:#343a40;
color:white;
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

<h1>Manage Listings</h1>

<div class="listings-box">

<table>

<tr>

<th>ID</th>

<th>Title</th>

<th>Price</th>

<th>Image</th>

<th>Seller</th>

<th>Email</th>

<th>Status</th>

<th>Actions</th>

</tr>

<?php while($row=mysqli_fetch_assoc($listings)){ ?>

<tr>

<td><?php echo $row['item_id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td>R<?php echo $row['price']; ?></td>

<td>
<img src="../uploads/<?php echo $row['image']; ?>" width="100">
</td>

<!-- ✅ SELLER NAME -->
<td>
<?php echo $row['fullname']; ?>
</td>

<!-- ✅ SELLER EMAIL -->
<td>
<?php echo $row['email']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

<td>

<a class="action-btn approve"
href="approve.php?id=<?php echo $row['item_id']; ?>">
Approve
</a>

<a class="action-btn reject"
href="reject.php?id=<?php echo $row['item_id']; ?>">
Reject
</a>

<a class="action-btn delete"
href="delete_listing.php?id=<?php echo $row['item_id']; ?>"
onclick="return confirm('Delete this listing?');">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</body>

</html>