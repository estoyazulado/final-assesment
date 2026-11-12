<?php
// Change 'admin123' to whatever password you want to use
$password_to_hash = 'admin123';

$hashed_password = password_hash($password_to_hash, PASSWORD_DEFAULT);

echo "Plain password: " . htmlspecialchars($password_to_hash) . "<br>";
echo "Hashed password to put in database: <b>" . htmlspecialchars($hashed_password) . "</b>";
?>