<?php
require "conn.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if items are provided
    if (!empty($_POST['items']) && !empty($_POST['address'])) {
        $address = $conn->real_escape_string($_POST['address']); // Sanitize the address input

        foreach ($_POST['items'] as $item) {
            $productName = $conn->real_escape_string($item['name']); // Sanitize product name
            $price = $conn->real_escape_string($item['price']); // Sanitize price
            $status = 'processing'; // Default status for new orders

            // Insert data into the database
            $sql = "INSERT INTO orders (status, product, address, price) 
                    VALUES ('$status', '$productName', '$address', '$price')";

            if (!$conn->query($sql)) {
                // Log or display an error for failed inserts
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Redirect after processing all items
        echo "Order added successfully!";
        header("Location: /smsgadget/userDash.php");
        exit;
    } else {
        echo "No items found in the cart or address is missing.";
    }
}

$conn->close();
?>
