<?php
require "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];
    $status = $_POST['status'];

    // Validate input
    if (!empty($orderId) && !empty($status)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE orderId = ?");
        $stmt->bind_param("si", $status, $orderId); // "si" means string and integer

        if ($stmt->execute()) {
            echo "Order status updated successfully!";
            header("Location: /smsgadget/adminDash.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid input. Please provide a valid status and order ID.";
    }
}

$conn->close();
?>
