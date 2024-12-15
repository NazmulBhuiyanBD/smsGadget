<?php
require "conn.php"; 


$id = $_GET['productId'];

$productQuery = $conn->prepare("SELECT * FROM products WHERE id = ?");
$productQuery->bind_param("i", $id);
$productQuery->execute();
$productResult = $productQuery->get_result();
$product = $productResult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container d-flex justify-content-center align-items-center m-5">
   <div class=" shadow p-3 mb-5 bg-body-tertiary rounded">
        <h2>Update Product</h2>
        
        <form action="update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" required>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Category</label>
                <select class="form-select" name="category" required>
                    <option selected><?= htmlspecialchars($product['category']) ?></option>
                    <option value="mobile">Mobile</option>
                    <option value="powerBank">Power Bank</option>
                    <option value="speaker">Speaker</option>
                    <option value="cableAdapter">Cable & Adapter</option>
                    <option value="caseProtector">Case & Protector</option>
                    <option value="headphones">Headphones</option>
                    <option value="tablet">Tablet</option>
                    <option value="SmartWatch">Smart Watch</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="Product Image" width="100">
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= htmlspecialchars($product['description']) ?>">
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
   </div>
</body>
</html>
