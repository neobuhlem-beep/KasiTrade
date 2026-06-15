<?php
session_start();

// Simple hardcoded admin PIN/password
$admin_password = "Buhle@Neo05"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered = $_POST['password'];
    if ($entered === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1 class="page-title">Admin Access</h1>
<form method="POST" class="form-container">
    <input type="password" name="password" placeholder="Enter Admin PIN" class="form-input">
    <br><br>
    <button type="submit" class="button">Login</button>
</form>
<?php if(!empty($error)){ ?>
<p style="color:red; text-align:center;"><?php echo $error; ?></p>
<?php } ?>
</body>
</html>
