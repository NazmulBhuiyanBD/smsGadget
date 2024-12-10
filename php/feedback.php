<?php
require "conn.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isUser = isset($_SESSION['user_id'])?? false;
if(!$isUser)
{
    header("Location: /smsgadget/index.php");
}
else
{
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId=$_SESSION['user_id'];
    $topic=$_POST['topic'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO feedback (userId,topic, description) VALUES (?,?,?)");
        $stmt->bind_param("iss", $userId,$topic, $description);

        if ($stmt->execute()) {
            
            header("Location: /smsgadget/userDash.php");
        } else {
            echo "Error: " . $stmt->error;
        }
}
}

?>