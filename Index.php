<?php
session_start();

include("includes/db.php");

$products = mysqli_query(
$conn,
"SELECT * FROM items WHERE status='approved'"
);
?>

<!DOCTYPE html>

<html>

<head>

<title>KasiTrade</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<header>

<div class="logo">
KasiTrade
</div>

<div class="menu">

<a href="index.php">
Home
</a>

<a href="sell.php">
Sell Item
</a>

<?php if(isset($_SESSION['fullname'])){ ?>

<span
style="
background:white;
padding:12px 20px;
border-radius:10px;
font-weight:bold;
">

👤 <?php echo $_SESSION['fullname']; ?>

</span>

<a href="logout.php">
Logout
</a>

<?php } else { ?>

<a href="login.php">
Login
</a>

<a href="register.php">
Register
</a>

<?php } ?>

</div>

</header>

<div class="search-section">

<input
type="text"
id="searchInput"
placeholder="Search for products..."
class="search-bar"
onkeyup="searchProducts()">

</div>

<div class="products">

<?php while($row = mysqli_fetch_assoc($products)){ ?>

<a
href="product.php?id=<?php echo $row['item_id']; ?>"
class="product-link">

<div
class="card"
data-name="<?php echo strtolower($row['title']); ?>">

<img
src="uploads/<?php echo $row['image']; ?>">

<h3>
<?php echo $row['title']; ?>
</h3>

<p>
R<?php echo $row['price']; ?>
</p>

<p>
Approved Listing
</p>

</div>

</a>

<?php } ?>

</div>

<script>

function searchProducts(){

let input =
document.getElementById("searchInput")
.value
.toLowerCase();

let cards =
document.getElementsByClassName("card");

for(let i=0;i<cards.length;i++){

let name =
cards[i].getAttribute("data-name");

if(name.includes(input)){

cards[i].style.display="block";

}
else{

cards[i].style.display="none";

}

}

}

</script>

</body>

</html>