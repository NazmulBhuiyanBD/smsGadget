<?php
require "conn.php";

$id = $_GET['id'];

// Get the updated form data
$name = $_POST['name'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$description = $_POST['description'];
$price = $_POST['price'];

$imagePath = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);
    

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        
    } else {
        echo "Failed to upload image.";
        exit;
    }
} else {
   
    $stmt = $conn->prepare("SELECT image_path FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $imagePath = $product['image_path'];
}


$stmt = $conn->prepare("UPDATE products SET name = ?, brand = ?, category = ?, image_path = ?, description = ?, price = ? WHERE id = ?");
$stmt->bind_param("ssssssi", $name, $brand, $category, $imagePath, $description, $price, $id);


if ($stmt->execute()) {
    header("Location: /smsgadget/adminDash.php");
    echo "Product updated successfully.";
    
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
