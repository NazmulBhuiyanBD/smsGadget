<?php
require "conn.php"; // Include your database connection file

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $productName = $_POST['productName'];
    $description = $_POST['address']; // Address used as Description based on form
    $price = $_POST['price'];
    $profit = $_POST['profit'];

    // Sanitize inputs to prevent SQL injection
    $productName = $conn->real_escape_string($productName);
    $description = $conn->real_escape_string($description);
    $price = $conn->real_escape_string($price);
    $profit = $conn->real_escape_string($profit);

    // Insert data into the database
    $sql = "INSERT INTO Sales (product, description, price, profit) 
            VALUES ('$productName', '$description', '$price', '$profit')";

    if ($conn->query($sql) === TRUE) {
        echo "Sales record added successfully!";
        header("Location: /smsgadget/adminDash.php"); // Redirect after successful submission
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>
