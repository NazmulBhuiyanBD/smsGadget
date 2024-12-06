<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sms Gadget</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/userDash.css">
    <link rel="stylesheet" href="css/mediaQuery.css">
</head>
<body>
    <div class="content d-flex">
                <!-- left side User panel  -->
        <div class="UserLeft shadow-lg d-flex flex-column align-items-center justfify-content-center">
            <div class="User">
                <div class="logo p-3 d-flex align-items-center justfify-content-center mt-3">
                    <img src="images/adminlogo.png" alt="User">
                </div>
                <h4 class="mt-1">USER</h4>
            </div>
            <div class="menu d-flex flex-column align-items-center justfify-content-center mt-3">
            <button class="button" onclick="Dashboard()"><img src="images/dashboard.png" alt="dashboard"> Dashboard</button>
            <button class="button" onclick="Products()"><img src="images/product.png" alt="product"> Products</button>
            <button class="button" onclick="Orders()"><img src="images/order.png" alt="order"> Orders</button>
            <button class="button" onclick="Sales()"><img src="images/sale.png" alt="Sales"> Sales</button>
            <button class="button" onclick="Profit()"><img src="images/profit.png" alt="Profit"> Profit</button>
            <button class="button" onclick="Expenses()"><img src="images/expense.png" alt="Expenses"> Expenses</button>
            <button class="button" onclick="Complains()"><img src="images/complain.png" alt="Complains"> Complains</button>           
            </div>
        </div>

        <!-- User right side panel  -->
         <div class="userRightPanel">
            <!-- <div class="userHeader"> -->
                <div class="navbar d-flex">
                    <div class="navbarLeft">
                        <h4>Welcome To Dashboard</h4>
                        <!-- <div class="navbarimg"></div> -->
                    </div>
                    <div class="navbarRight d-flex p-3">
                        <button class="navR"><i class="fa-solid fa-gear"></i></button>
                        <button class="navR"><i class="fa-regular fa-bell"></i></button>
                        <button class="navR"><i class="fa-regular fa-user"></i></button>
                    </div>
                </div>
            <!-- </div> -->
         </div>
    </div>
</body>
</html>