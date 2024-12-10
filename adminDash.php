<?php
require "php/conn.php";
$ct=0;
// for product list
$sqlp="select * from products";
$resultp=$conn->query($sqlp);

// for orderlist 
$sqlOr="select * from orders";
$resultOr=$conn->query($sqlOr);

$sqlFeedback = "SELECT 
            feedback.feedbackId,
            feedback.userId,
            feedback.topic,
            feedback.description,
            users.name,
            users.phoneNumber
        FROM 
            feedback
        JOIN 
            users ON feedback.userId = users.id";

$resultFeedback=$conn->query($sqlFeedback);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS GADGET</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/adminDash.css">
    <link rel="stylesheet" href="css/mediaQuery.css">
</head>
<body>
    <!--Add Product modal  -->
    <div class="modal fade" id="AddProducts" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Products</h5>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="php/addProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category" required>
                            <option selected>Open this select menu</option>
                            <option value="mobile">Mobile</option>
                            <option value="powerBank">Power Bank</option>
                            <option value="speaker">Speaker</option>
                            <option value="cableAdapter">Cable & Adapter</option>
                            <option value="caseProtector">Case & Protector</option>
                            <option value="headphones">Headphones</option>
                            <option value="tablet">Tablet</option>
                            <option value="SmartWatch">Smart Watch</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Products</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
                
                </div>
            </div>
        </div>
    </div>


     <!-- order Modal  -->
     <div class="modal fade" id="AddOrder" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Order</h5>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form action="php/addOrder.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">ProductId</label>
                        <input type="number" class="form-control" id="ProductId" name="ProductId" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <!-- <option >Open this select menu</option> -->
                            <option value="processing" selected>processing</option>
                            <option value="courier">courier</option>
                            <option value="cancel">cancel</option>
                            <option value="refund">refund</option>
                            <option value="delivered">deliver</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
                
            </div>
          </div>
        </div>
    </div>

      <!-- main content  -->
    <div class="content d-flex">
        <!-- left side admin panel  -->
        <div class="adminLeft shadow-lg d-flex flex-column align-items-center justfify-content-center">
            <div class="admin">
                <div class="logo p-3 d-flex align-items-center justfify-content-center mt-3">
                    <img src="images/adminlogo.png" alt="admin">
                </div>
                <h4 class="mt-1">Admin</h4>
            </div>
            <div class="menu d-flex flex-column align-items-center justfify-content-center mt-3">
            <button class="button" onclick="Dashboard()"><img src="images/dashboard.png" alt="dashboard"> Dashboard</button>
            <button class="button" onclick="Products()"><img src="images/product.png" alt="product"> Products</button>
            <button class="button" onclick="Orders()"><img src="images/order.png" alt="order"> Orders</button>
            <button class="button" onclick="Sales()"><img src="images/sale.png" alt="Sales"> Sales</button>
            <button class="button" onclick="Profit()"><img src="images/profit.png" alt="Profit"> Profit</button>
            <button class="button" onclick="Expenses()"><img src="images/expense.png" alt="Expenses"> Expenses</button>
            <button class="button" onclick="Complains()"><img src="images/complain.png" alt="Complains"> Feedback</button>           
            </div>
        </div>
        <!-- right side admin panel  -->
        <div class="adminRight">
            <!-- admin header  -->
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
            <!-- dashboard  -->
            <div class="dashboard">
                <!-- contentHead -->
                <div class="contentHead"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div>

                <!-- content body  -->
                <div class="contentBody">
                    <div class="contentRow d-flex">
                        <div class="card shadow-lg me-5">
                            <div class="cardbody d-flex justify-content-between align-items-center p-3">
                            <div class="cardlogo"><i class="fa-solid fa-chart-line"></i></div>
                            <div class="cardContent d-flex flex-column justfify-content-center align-items-center"><p>Total Sells</p><h3>13,647</h3></div>
                        </div>
                        <div class="cardfooter d-flex justify-content-between align-items-center p-3"><p>Last Week</p><button>view more</button></div>
                    </div>
                    <div class="card shadow-lg ">
                        <div class="cardbody d-flex justify-content-between align-items-center p-3">
                            <div class="cardlogo"><i class="fa-solid fa-cart-shopping"></i></div>
                            <div class="cardContent d-flex flex-column justfify-content-center align-items-center"><p>New Orders</p><h3>647</h3></div>
                        </div>
                        <div class="cardfooter d-flex justify-content-between align-items-center p-3"><p>Last Week</p><button>view more</button></div>
                    </div>
                    </div>
                    <div class="contentRow d-flex mt-5">
                    <div class="card shadow-lg me-5">
                        <div class="cardbody d-flex justify-content-between align-items-center p-3">
                            <div class="cardlogo"><i class="fa-solid fa-money-bill-trend-up"></i></div>
                            <div class="cardContent d-flex flex-column justfify-content-center align-items-center"><p>Total Profit</p><h3>133,6470</h3></div>
                        </div>
                        <div class="cardfooter d-flex justify-content-between align-items-center p-3"><p>Last Week</p><button>view more</button></div>
                    </div>
                    <div class="card shadow-lg ">
                        <div class="cardbody d-flex justify-content-between align-items-center p-3">
                            <div class="cardlogo"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                            <div class="cardContent d-flex flex-column justfify-content-center align-items-center"><p>Expenses</p><h3>13,647</h3></div>
                        </div>
                        <div class="cardfooter d-flex justify-content-between align-items-center p-3"><p>Last Week</p><button>view more</button></div>
                    </div>
                    </div>
                </div>
             </div>
             <!-- dashboard products -->
            <div class="dashProducts">
                <!-- contentHead -->
                <!-- <div class="contentHead"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div> -->
                <div class="productHeader">   
                    <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-symbols-outlined input-group-text d-flex align-center" id="basic-addon1">search
                            </span>
                    </div>                                  
                    <div class="productHeaderOption d-flex justify-content-sm-between mt-3">
                    <h2>Products List</h2>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#AddProducts">
                        Add Products
                      </button>
                    </div>
                    
                </div>
                <div class="productList mt-2">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">brand</th>
                            <th scope="col">category</th>
                            <th scope="col">Image</th>
                            <th scope="col">description</th>
                            <th scope="col">price</th>
                            <th scope="col">option</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                    if ($resultp->num_rows > 0) {
                    // Fetch and display each row of data
                    while ($row = $resultp->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['brand'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td><img src='" . $row['image_path'] . "' alt='Product Image' width='100'height='200'></td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>$" . number_format($row['price'], 2) . "</td>";
                        echo "<td class='productListOption d-flex'><button class='edit'>Edit</button>
                    <button class='delete' onclick='productDelete(" . $row['id'] . ")'>Delete</button>

                    </td>";
                        echo "</tr>";
                    }
                    } else {
                    echo "<tr><td colspan='7'>No products found</td></tr>";
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- dashboard order  -->
            <div class="orders">
                <!-- contentHead -->
                <div class="contentHead"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div>
                <div class="productHeader d-flex justify-content-between">
                    <h2>Order List</h2>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddOrder">
                        Add Order
                      </button>
                </div>
                <div class="orderList">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">OrderID</th>
                                <th scope="col">ProductId</th>
                                <th scope="col">Status</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Order Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Option</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultOr->num_rows > 0) {
                             // Fetch and display each row of data
                                while ($row = $resultOr->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['orderId']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['productId']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['OrderDescription']) . "</td>";
                            echo "<td>$" . number_format($row['price'], 2) . "</td>";
                            echo "<td class='OrderListOption d-flex'><button class='edit'>Edit</button>
                        <button class='delete'>Delete</button></td>";
                            echo "</tr>";
                            }
                        } else {
                        echo "<tr><td colspan='7'>No products found</td></tr>";
                        }
                            ?>
                        </tbody>
                        </table>
                </div>
            </div>
            <!-- dashboard sales -->
            <div class="sales">
                <!-- contentHead -->
                <div class="contentHead"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div>
                <div class="productHeader d-flex justify-content-between">
                    <h2>Sales</h2>
                    <!-- <button>Add Order</button> -->
                </div>
                <!-- content Graph  -->
                <div class="graph mt-5 salesGraph">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- feedback from user  -->
            <div class="feedback m-3 p-3">
                <div class="feedbackList">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">FeedBackID</th>
                                <th scope="col">userId</th>
                                <th scope="col">topic</th>
                                <th scope="col">description</th>
                                <th scope="col">name</th>
                                <th scope="col">phone</th>
                                <th scope="col">Option</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultFeedback ->num_rows > 0) {
                            // Fetch and display each row of data
                             while ($row = $resultFeedback->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['feedbackId']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['userId']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['topic']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>$" .htmlspecialchars($row['phoneNumber']) . "</td>";
                            echo "<td class='OrderListOption d-flex'><button class='edit'>Edit</button>
                                <button class='delete'>Delete</button></td>";
                            echo "</tr>";
                            }
                            } 
                            else {
                            echo "<tr><td colspan='7'>No products found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/adminDash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/Chart.js"></script>
</body>
</html>