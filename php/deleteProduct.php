<?php
require "conn.php"; // Database connection

// Check if the ID is set in the query string
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $PId = $_GET['id'];

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $PId);

    // Execute and check the result
    if ($stmt->execute()) {
        echo "User deleted successfully.";
        header("Location: /smsgadget/adminDash.php");
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid user ID.";
}

// Close the connection
$conn->close();
?>
<br>
<a href="index.php">Back to Users List</a>
