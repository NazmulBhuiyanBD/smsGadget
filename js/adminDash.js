let dashboard = document.getElementsByClassName("dashboard")[0];
let products = document.getElementsByClassName("dashProducts")[0];
let orders = document.getElementsByClassName("orders")[0];
let sales = document.getElementsByClassName("sales")[0];
let profit = document.getElementsByClassName("profit")[0];
let expenses= document.getElementsByClassName("expenses")[0];
let feedback= document.getElementsByClassName("feedback")[0];

function Dashboard()
{
    dashboard.style.display='block';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Products()
{
    dashboard.style.display='none';
    products.style.display='block';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Orders()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='block';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Sales()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='block';
    profit.style.display='none';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Profit()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='block';
    expenses.style.display='none';
    feedback.style.display='none';
}
function Expenses()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='block';
    feedback.style.display='none';
}
function Feedback()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
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



function fetchData(id) {
    // Fetch data using AJAX
    fetch('update_product.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('brand').value = data.brand;
            document.getElementById('category').value = data.category;
            document.getElementById('image_path').value = data.image_path;
            document.getElementById('description').value = data.description;
            document.getElementById('price').value = data.price;
        })
        .catch(error => console.error('Error:', error));
}