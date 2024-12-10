function confirmLogout() {
    // Show confirmation alert
    const userConfirmed = confirm("Are you sure you want to log out?");
    
    if (userConfirmed) {
        // If user confirms, redirect to logout.php
        window.location.href = "php/logout.php";
    } else {
        // Do nothing if user cancels
        alert("You are still logged in.");
    }
}