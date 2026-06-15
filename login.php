<?php
session_start();
include("includes/db.php");

$message = "";

if (isset($_GET['registered'])) {
    $message = "Registration successful. Please log in.";
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['fullname'] = $user['fullname'];

        header("Location: index.php");
        exit();

    } else {
        $message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Login</title>

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
<a href="register.php">Register</a>

</div>

</header>

<h1 class="page-title">
Login
</h1>

<?php if (!empty($message)) { ?>
    <div style="
        margin: 15px auto;
        padding: 12px;
        background: #d4edda;
        color: #155724;
        border-radius: 5px;
        width: fit-content;
        font-weight: bold;
    ">
        <?php echo $message; ?>
    </div>
<?php } ?>

<form method="POST" action="" class="form-container">

<input
type="email"
name="email"
placeholder="Email"
class="form-input">

<br><br>

<input
type="password"
name="password"
id="password"
placeholder="Password"
class="form-input">

<br><br>

<button
type="button"
onclick="togglePassword()"
class="button">

Show / Hide Password

</button>

<br><br>

<button
type="submit"
name="login"
class="button">

Login

</button>

<br><br>

<p style="text-align:center;">
Don't have an account yet?
</p>

<div style="text-align:center;">

<a href="register.php"
style="
text-decoration:none;
background:white;
color:black;
padding:10px 20px;
border-radius:10px;
font-weight:bold;
display:inline-block;
">

Register

</a>

</div>

</form>

<script>

function togglePassword(){

var passwordField =
document.getElementById("password");

if(passwordField.type==="password")
{
passwordField.type="text";
}
else
{
passwordField.type="password";
}

}

</script>

</body>

</html>