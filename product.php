<?php
include("includes/db.php");

$id = $_GET['id'];

$sql = "SELECT items.*, users.fullname, users.email
        FROM items
        JOIN users ON items.user_id = users.user_id
        WHERE items.item_id='$id'";
$result = mysqli_query($conn,$sql);

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

<title><?php echo $product['title']; ?></title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

<div class="logo">
KasiTrade
</div>

<div class="menu">

<a href="index.php">Home</a>

<a href="sell.php">Sell Item</a>

<a href="login.php">Login</a>

</div>

</header>

<h1 class="page-title">

<?php echo $product['title']; ?>

</h1>

<div
class="card"
style="
width:500px;
margin:auto;
">

<img
src="uploads/<?php echo $product['image']; ?>">

<h2>

R<?php echo $product['price']; ?>

</h2>

<p>

<?php echo $product['description']; ?>

</p>

<p>
Seller: <?php echo $product['fullname']; ?>
</p>
<p style="display:none;">
<?php echo $product['email']; ?>
</p>

<p>
Location: Johannesburg
</p>

<a href="payment.php?id=<?php echo $product['item_id']; ?>">
<button class="button">Buy Now</button>
</a>

<button class="button" onclick="openSellerModal()">
Message Seller
</button>

</div>

<div id="sellerModal" style="
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
">

<div style="
background:white;
width:300px;
margin:15% auto;
padding:20px;
border-radius:10px;
text-align:center;
">

<h3>Seller Details</h3>

<p><b>Name:</b> <?php echo $product['fullname']; ?></p>
<p><b>Email:</b> <?php echo $product['email']; ?></p>

<button class="button" onclick="closeSellerModal()">Close</button>

</div>
</div>

<!-- SELLER MODAL (popup) -->
<div id="sellerModal">
   ...
</div>

<!-- 👇 YOU PASTE THIS HERE -->
<script>
function openSellerModal(){
document.getElementById("sellerModal").style.display="block";
}

function closeSellerModal(){
document.getElementById("sellerModal").style.display="none";
}
</script>

</body>
</html>

</body>

</html>