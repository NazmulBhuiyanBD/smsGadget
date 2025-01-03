<?php
// Include the database connection file
require 'conn.php'; // Ensure your database connection file is correct

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    // Sanitize inputs to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $position = $conn->real_escape_string($position);
    $salary = $conn->real_escape_string($salary);

    // SQL query to insert data into the employees table
    $sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";

    // Execute the query and check if the data was inserted successfully
    if ($conn->query($sql) === TRUE) {
        // Redirect to the admin dashboard with a success message
        header("Location: /smsgadget/adminDash.php"); 
        exit;
    } else {
        // Output error if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
