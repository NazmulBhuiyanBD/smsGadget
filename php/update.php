<?php
require "conn.php";

    $id = $_POST['id'];
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
        $stmt = $conn->prepare("UPDATE products SET name = ?, brand = ?, category = ?,image_path=? ,description =?, price=? WHERE id = ?");
        $stmt->bind_param("sssssdi", $name, $brand, $category,$imagePath,$description,$price ,$id);
        if ($stmt->execute()) {
            header("Location: /smsgadget/adminDash.php");// Redirect to the main page
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }


?>
