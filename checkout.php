<?php
require "php/conn.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isUser = isset($_SESSION['user_id'])?? false;
if(!$isUser)
{
    header("Location: /smsgadget/index.php");
}

if (isset($_GET['cart_data']) && isset($_GET['total_price'])) {
    $cart_items = json_decode($_GET['cart_data'], true);
    $total_price = $_GET['total_price'];

    // Proceed with the checkout logic (e.g., save to the database, process payment)
    // For now, just display the cart items and total price
    // echo '<h3>Your Cart</h3>';
    // foreach ($cart_items as $item) {
    //     echo '<p>' . $item['name'] . ' - ' . $item['price'] . '</p>';
    // }
    // echo '<p>Total: $' . $total_price . '</p>';
}
?>

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
            <button class="MenuButton d-flex align-items-center " onclick="Dashboard()"><span class="material-symbols-outlined menuLogo">
                dashboard
            </span> <p>Dashboard</p></button>
            <button class="MenuButton d-flex align-items-center " onclick="Products()"><span class="material-symbols-outlined menuLogo">
            update
            </span> <p>Update Profile</p></button>
            <button class="MenuButton d-flex align-items-center " onclick="Orders()"><span class="material-symbols-outlined menuLogo">
            shopping_cart
            </span> <p>Orders</p></button>
            <button class="MenuButton d-flex align-items-center " onclick="Complains()"><span class="material-symbols-outlined menuLogo">
            comment
            </span><p> Feedback</p></button>           
            </div>
        </div>

        <!-- User right side panel  -->
         <div class="userRightPanel">
            <!-- navbar right side  -->
            <div class="navbar d-flex">
                <div class="navbarLeft">
                        <h4>Welcome To Dashboard</h4>
                        <!-- <div class="navbarimg"></div> -->
                </div>
                <div class="navbarRight d-flex p-3">
                        <button class="navR"><i class="fa-solid fa-gear"></i></button>
                        <button class="navR"><i class="fa-regular fa-bell"></i></button>
                        <button class="navR" onclick="confirmLogout()"><i class="fa-regular fa-user"></i></button>
                </div>
            </div>
            <div class="LeftpanelOption">
                    <!-- Dashboard  -->
                        <div class="dashboard">

                        </div>

                    <!-- update profile  -->
                    <div class="update">

                    </div>
                    <div class="order">
                        <?php
                         echo '<h3>Your Cart</h3>';
                         foreach ($cart_items as $item) {
                             echo '<p>' . $item['name'] . ' - ' . $item['price'] . '</p>';
                         }
                         echo '<p>Total: $' . $total_price . '</p>';
                        ?>
                    </div>
                    <!-- complain  -->
                    <div class="feedback">
                    <form action="php/feedback.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Topics</label>
                            <input type="text" class="form-control" id="topic"name="topic" placeholder="Feedback for ......"required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Feedback</label>
                            <textarea class="form-control" id="FeedbackDescription"name="description" placeholder="Description .." rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                        <button class="btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/userDash.js"></script>
</body>
</html>