<?php
// Include the database connection file
require "conn.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $expense_type = $_POST['Types']; // Selected type of expense
    $description = $_POST['description']; // Description of the expense
    $cost = $_POST['cost']; // Cost of the expense

    // Sanitize inputs to prevent SQL injection
    $expense_type = $conn->real_escape_string($expense_type);
    $description = $conn->real_escape_string($description);
    $cost = $conn->real_escape_string($cost);

    // SQL query to insert data into the expenses table
    $sql = "INSERT INTO expenses (expense_type, description, cost) 
            VALUES ('$expense_type', '$description', '$cost')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the desired page with a success message
        header("Location: /smsgadget/adminDash.php");
        exit;
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
