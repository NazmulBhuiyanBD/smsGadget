<?php
require "conn.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $productName = $_POST['productName'];
    $address = $_POST['address'];
    $price = $_POST['price'];

    // Sanitize inputs to prevent SQL injection
    $status = $conn->real_escape_string($status);
    $productName = $conn->real_escape_string($productName);
    $address = $conn->real_escape_string($address);
    $price = $conn->real_escape_string($price);

    // Insert data into the database
    $sql = "INSERT INTO orders (status, product, address, price) 
            VALUES ('$status', '$productName', '$address', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Order added successfully!";
        header("Location: /smsgadget/adminDash.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

