<?php
include("includes/db.php");

$id = $_GET['id'];

$product = mysqli_fetch_assoc(mysqli_query(
$conn,
"SELECT * FROM items WHERE item_id='$id'"
));
?>

<!DOCTYPE html>
<html>

<head>
<title>Payment</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
<div class="logo">KasiTrade</div>
</header>

<h1 class="page-title">Payment</h1>

<div class="form-container">

<h3>Pay for: <?php echo $product['title']; ?></h3>
<p>Amount: R<?php echo $product['price']; ?></p>

<input class="form-input" placeholder="Card Number">
<br><br>

<input class="form-input" placeholder="Expiry Date">
<br><br>

<input class="form-input" placeholder="CVV">
<br><br>

<button class="button">Pay Now</button>

</div>

</body>
</html>