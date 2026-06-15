<?php
session_start();
include("includes/db.php");

$message = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imageName = "";

    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

        $imageName = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/" . $imageName
        );
    }

    $sql = "INSERT INTO items
    (user_id, title, description, price, image, status)
    VALUES
    ('$user_id', '$title', '$description', '$price', '$imageName', 'pending')";

    if(mysqli_query($conn,$sql)){
        $message = "Item submitted successfully and is waiting for admin approval.";
    }
    else{
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Sell Item</title>

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
Sell Your Item
</h1>

<?php if(!empty($message)){ ?>

<div style="
margin:15px auto;
padding:12px;
background:#d4edda;
color:#155724;
width:fit-content;
border-radius:5px;
font-weight:bold;
">

<?php echo $message; ?>

</div>

<?php } ?>

<form
method="POST"
action=""
enctype="multipart/form-data"
class="form-container">

<input
type="text"
name="title"
placeholder="Product Name"
class="form-input"
required>

<br><br>

<textarea
name="description"
placeholder="Product Description"
class="form-input"
rows="5"
required></textarea>

<br><br>

<input
type="number"
name="price"
placeholder="Price"
class="form-input"
required>

<br><br>

<input
type="file"
name="image"
required>

<br><br>

<button
type="submit"
name="submit"
class="button">

Post Product

</button>

</form>

</body>

</html>