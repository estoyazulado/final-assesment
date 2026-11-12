<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kick user back to login page if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<h1>Student Grading System</h1>

<a href="index.php">Records</a>
<a href="add.php">Add Result</a>
<a href="logout.php">Logout (Admin)</a>