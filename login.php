<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = $conn->prepare("SELECT user_id, username, password_hash FROM admin WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    
    $user = $sql->get_result()->fetch_assoc();

    // --- DEBUG CHECKS ---
    if (!$user) {
        die("DEBUG ERROR: Username '$username' was not found in the 'admin' table!");
    }

    if (!password_verify($password, $user['password_hash'])) {
        die("DEBUG ERROR: Password verification failed! The typed password does not match the hash in the database.");
    }
    // --------------------

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>

    <h3>LOGIN</h3>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Username:</label><br>
        <input style="width: 200px;" type="text" name="username" required><br><br>
        
        <label>Password:</label><br>
        <input style="width: 200px;" type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>

</body>
</html>