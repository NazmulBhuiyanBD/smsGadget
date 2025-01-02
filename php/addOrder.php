<?php
require "conn.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    // Insert data into the database
    $sql = "INSERT INTO orders (status, product, price) 
            VALUES ('$status', '$productName', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully!";
        header("Location: /smsgadget/adminDash.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
