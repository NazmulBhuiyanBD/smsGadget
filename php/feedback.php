<?php
require "conn.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
$isUser = isset($_SESSION['user_id']) ?? false;
if (!$isUser) {
    header("Location: /smsgadget/index.php");
    exit;
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $topic = trim($_POST['topic']);
    $description = trim($_POST['description']);
    $status = "unsolved";

    // Validate inputs
    if (empty($topic) || empty($description)) {
        echo "Error: Topic and description are required.";
        exit;
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO feedback (userId, topic, description, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $userId, $topic, $description, $status);

    if ($stmt->execute()) {
        header("Location: /smsgadget/userDash.php");
        exit;
    } else {
        echo "Error: Unable to submit feedback. Please try again later.";
        // Log the error for debugging
        error_log("SQL Error: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>
