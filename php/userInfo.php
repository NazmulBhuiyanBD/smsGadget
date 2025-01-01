<?php
require "conn.php"; // Include database connection

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /smsgadget/index.php");
    exit;
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$query = "SELECT id, name, phoneNumber ,created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}