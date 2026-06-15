<?php
include("includes/db.php");

$message = "";

if (isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, email, password)
            VALUES ('$fullname', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?registered=1");
        exit();
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="logo">KasiTrade</div>

    <div class="menu">
        <a href="index.php">Home</a>
        <a href="sell.php">Sell Item</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</header>

<h1 class="page-title">Register</h1>

<form method="POST" action="" class="form-container">

    <input type="text" name="fullname" placeholder="Full Name" class="form-input">
    <br><br>

    <input type="email" name="email" placeholder="Email" class="form-input">
    <br><br>

    <input type="password" name="password" id="password" placeholder="Password" class="form-input">
    <br><br>

    <button type="button" onclick="togglePassword()" class="button">
        Show / Hide Password
    </button>

    <br><br>

    <button type="submit" name="register" class="button">
        Register
    </button>

</form>

<?php if (!empty($message)) { ?>
    <div style="
        margin-top: 15px;
        padding: 12px;
        background: #f8d7da;
        color: #721c24;
        border-radius: 5px;
        width: fit-content;
        font-weight: bold;
    ">
        <?php echo $message; ?>
    </div>
<?php } ?>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");

    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>

</body>
</html>