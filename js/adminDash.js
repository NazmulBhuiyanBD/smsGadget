let dashboard = document.getElementsByClassName("dashboard")[0];
let products = document.getElementsByClassName("dashProducts")[0];
let orders = document.getElementsByClassName("orders")[0];
let sales = document.getElementsByClassName("sales")[0];
let profit = document.getElementsByClassName("example")[0];
let expenses= document.getElementsByClassName("example")[0];
let complains= document.getElementsByClassName("example")[0];

function Dashboard()
{
    dashboard.style.display='block';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    complains.style.display='none';
}
function Products()
{
    dashboard.style.display='none';
    products.style.display='block';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    complains.style.display='none';
}
function Orders()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='block';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    complains.style.display='none';
}
function Sales()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='block';
    profit.style.display='none';
    expenses.style.display='none';
    complains.style.display='none';
}
function Profit()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='block';
    expenses.style.display='none';
    complains.style.display='none';
}
function Expenses()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='block';
    complains.style.display='block';
}
function Complains()
{
    dashboard.style.display='none';
    products.style.display='none';
    orders.style.display='none';
    sales.style.display='none';
    profit.style.display='none';
    expenses.style.display='none';
    complains.style.display='block';
}