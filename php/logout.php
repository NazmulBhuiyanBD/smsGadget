<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to index.html
header("Location: /smsgadget/index.php");
exit;
?>
