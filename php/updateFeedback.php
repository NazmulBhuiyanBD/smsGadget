<?php
require "conn.php";

if (isset($_GET['feedbackId'])) {
    $feedbackId = intval($_GET['feedbackId']); // Sanitize input to prevent SQL injection

    // Fetch the current status of the feedback
    $sql = "SELECT status FROM feedback WHERE feedbackId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $feedbackId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $feedback = $result->fetch_assoc();
        $currentStatus = $feedback['status'];

        // Toggle the status
        $newStatus = ($currentStatus === "unsolved") ? "solved" : "unsolved";

        // Update the status in the database
        $updateSql = "UPDATE feedback SET status = ? WHERE feedbackId = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("si", $newStatus, $feedbackId);

        if ($updateStmt->execute()) {
            // Redirect back to the feedback list page
            header("Location: /smsgadget/adminDash.php");
            exit;
        } else {
            echo "Error updating feedback: " . $updateStmt->error;
        }
    } else {
        echo "Feedback not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
