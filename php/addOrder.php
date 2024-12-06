<?php
require "conn.php";
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['ProductId'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $price = $_POST['price'];


        // Insert data into the database
        $sql = "INSERT INTO orders (productId, status, quantity, OrderDescription, price) 
        VALUES ('$productId', '$status', '$quantity', '$description', '$price')";
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
