let dashboard = document.getElementsByClassName("dashboard")[0];
let update = document.getElementsByClassName("update")[0];
let orders = document.getElementsByClassName("order")[0];
let feedback = document.getElementsByClassName("feedback")[0];


function Dashboard()
{
    dashboard.style.display='block';
    update.style.display='none';
    orders.style.display='none';
    feedback.style.display='none';
}
function Profile()
{
    dashboard.style.display='none';
    update.style.display='block';
    orders.style.display='none';
    feedback.style.display='none';
}
function Orders()
{
    dashboard.style.display='none';
    update.style.display='none';
    orders.style.display='block';
    feedback.style.display='none';
}
function Complains()
{
    dashboard.style.display='none';
    update.style.display='none';
    orders.style.display='none';
    feedback.style.display='block';
}
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