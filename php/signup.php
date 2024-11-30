<?php
require "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usertype='Customer';
    $name = $_POST['name'];
    $phoneNumber= $_POST['phn'];
    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE phoneNumber = ?");
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User already exists!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (usertype,name, phoneNumber, password) VALUES (?,?, ?, ?)");
        $stmt->bind_param("ssss", $usertype,$name, $phoneNumber, $password);

        if ($stmt->execute()) {
            
            header("Location: /smsgadget/index.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>