<?php
require "conn.php";
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle file upload
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Insert data into the database
        $sql = "INSERT INTO products (name, brand, category, image_path, description, price) 
                VALUES ('$name', '$brand', '$category', '$imagePath', '$description', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully!";
            header("Location: /smsgadget/adminDash.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>
