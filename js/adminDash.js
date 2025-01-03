let dashboard = document.getElementsByClassName("dashboard")[0];
let products = document.getElementsByClassName("dashProducts")[0];
let orders = document.getElementsByClassName("orders")[0];
let sales = document.getElementsByClassName("sales")[0];
let employee = document.getElementsByClassName("employee")[0];
let expenses= document.getElementsByClassName("expenses")[0];
let feedback= document.getElementsByClassName("feedback")[0];

function Dashboard()
{
    dashboard.style.display='block';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    employee.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Products()
{
    dashboard.style.display='none';
    products.style.display='block';
    orders.style.display='none';
    sales.style.display='none';
    employee.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Orders()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='block';
    sales.style.display='none';
    employee.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Sales()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='block';
    employee.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Employee()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    employee.style.display='block';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Expenses()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    employee.style.display='none';
    expenses.style.display='block';
    feedback.style.display='none';
}
function Feedback()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    employee.style.display='none';
    expenses.style.display='none';
    feedback.style.display='block';
}

function setOrderId(orderId) {
    document.getElementById('orderId').value = orderId;
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
function productDelete(Id) {
    if (confirm("Are you sure you want to delete this Product?")) {
        // Redirect to delete script with user ID as a query parameter
        window.location.href = `php/delete.php?id=${Id}`;
    }
}
function OrderDelete(Id) {
    if (confirm("Are you sure you want to delete this Order?")) {
        // Redirect to delete script with user ID as a query parameter
        window.location.href = `php/delete.php?orderId=${Id}`;
    }
}
function editProduct(Id) {
    if (confirm("Are you sure you want to Update this Product Information?")) {
        // Redirect to delete script with user ID as a query parameter
        window.location.href = `php/update_product.php?productId=${Id}`;
    }
}
function FeedbackStatus(Id) {
    if (confirm("Are you sure you want to Update this status?")) {
        // Redirect to delete script with user ID as a query parameter
        window.location.href = `php/updateFeedback.php?feedbackId=${Id}`;
    }
}
function EmployeeDelete(Id) {
    if (confirm("Are you sure you want to Update this status?")) {
        // Redirect to delete script with user ID as a query parameter
        window.location.href = `php/deleteEmp.php?EmpId=${Id}`;
    }
}
function redirectToPage1() {
    window.location.href = "graph1.php"; 
}
function redirectToPage2() {
    window.location.href = "graph2.php"; 
}
function redirectToPage3() {
    window.location.href = "graph3.php"; 
}
function redirectToPage4() {
    window.location.href = "graph4.php"; 
}

