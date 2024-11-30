<?php
session_start();
require "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usertype=$_POST['UserType'];
    $phoneNumber = $_POST['phn'];
    $password = $_POST['pass'];

    // Retrieve user
    $stmt = $conn->prepare("SELECT * FROM users WHERE phoneNumber= ?");
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard or any other page
            header("Location: /smsgadget/adminDash.php");
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
