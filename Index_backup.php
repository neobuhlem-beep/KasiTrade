<?php
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

<a href="login.php">
Login
</a>

<a href="register.php">
Register
</a>

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

<?php while($row = mysqli_fetch_assoc($products)) { ?>

<div class="card"
data-name="<?php echo strtolower($row['title']); ?>">

<h3><?php echo $row['title']; ?></h3>

<p>R<?php echo $row['price']; ?></p>

<p>Approved Listing</p>

</div>

<?php } ?>

</div>

<script>
function searchProducts() {

    let input = document.getElementById("searchInput").value.toLowerCase();
    let cards = document.getElementsByClassName("card");

    for (let i = 0; i < cards.length; i++) {

        let name = cards[i].getAttribute("data-name");

        if (name.includes(input)) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>
</body>

</html>