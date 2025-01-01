<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection
    require "conn.php";

    // Retrieve posted data
    $items = $_POST['items'];
    $total_price = $_POST['total_price'];

    // Insert data into the database
    foreach ($items as $item) {
        $name = $item['name'];
        $price = $item['price'];

        // Prepare and execute SQL query
        $stmt = $conn->prepare("INSERT INTO orders (product_name, product_price, total_price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $price, $total_price);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
    }

    echo "Order placed successfully!";
    $stmt->close();
    $conn->close();
}
?>
