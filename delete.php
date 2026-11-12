<?php
include 'db.php';

// Check if 'id' exists in the POST request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE FROM result WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If someone tries to open delete.php directly in the URL bar, redirect them back
    header("Location: index.php");
    exit();
}
?>