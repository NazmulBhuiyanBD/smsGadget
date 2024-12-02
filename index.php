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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mediaQuery.css">
</head>
<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $isUser = isset($_SESSION['user_id'])?? false;
   if(!$isUser):
    ?>
    <!-- Login modal -->
    <div class="modal fade" tabindex="-1" id="login">
        <div class="modal-dialog">
          <div class="modal-content">
            <h5 class="text-center mt-3">WELCOME BACK</h5>
            <div class="modal-body">
                <form method="POST" action="php/login.php">
                    <div class="mb-3">
                      <label for="UserType" class="form-label">User Type</label>
                      <select class="form-select" id="UserType" name="UserType">
                          <option value="Customer">Customer</option>
                          <option value="Admin">Admin</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="PhoneNumber" class="form-label">Phone Number</label>
                      <input type="number" class="form-control" id="PhoneNumber" name="phn">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="pass">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
                
            </div>
            <div class="modal-footer">
              
              <p>if you don't have an account than</p> <button class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#signup">sign up</button>
            </div>
          </div>
        </div>
      </div>

    <!-- singup modal  -->
    <div class="modal" tabindex="-1" id="signup">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="php/signup.php">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                      </div>
                    <div class="mb-3">
                      <label for="PhoneNumber" class="form-label" required>Phone Number</label>
                      <input type="number" name="phn" class="form-control" id="PhoneNumber">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label" required>Password</label>
                      <input type="password" name="pass" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
            </div>
            <div class="modal-footer">
                <p>if you don't have an account than</p> <button class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#login">Login</button>
            </div>
          </div>
        </div>
      </div>


  <?php
   endif;

    ?>
    <!-- Cart element  -->
    <div class="modal fade" tabindex="-1" id="cart">
        <div class="modal-dialog">
          <div class="modal-content">
            <h5 class="text-center mt-3">WELCOME TO CART</h5>
            <div class="modal-body">
                <form method="POST" action="php/login.php">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
                
            </div>
            <div class="modal-footer">
              
              <p>Happy shopping. Best of luck</p> 
            </div>
          </div>
        </div>
      </div>

    <!-- header element -->
       <div class="container-fluid navbar shadow-sm">
            <div class="container d-flex justfify-content-center ">   
                <div class="logo ">
                     <div class="logoimg"><a href="#"><img src="images/logo.png"></a></div>
                </div>
                <div class="nav_search d-flex justify-content-center align-items-center">
                    <input type="search" placeholder="Search for products..." class="search ">
                    <div class="searchIcon d-flex align-items-center"><i class="fa-solid fa-magnifying-glass"></i></div>
                </div>
                <div class="nav_right d-flex justfify-content-between">
                    <div class="cart p-2">
                        <button class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#cart">
                        <span class="material-symbols-outlined">
                            shopping_cart
                            </span>
                        <p class="pt-3">Carts item</p>
                    </button></div>

                    <div class="profile p-2">
                        <?php
                        if($isUser):
                        ?>
                        <a class="d-flex align-items-center link-underline link-underline-opacity-0 link-dark" href="adminDash.php">
                            <span class="material-symbols-outlined">
                            person
                            </span>
                            <p class="pt-3">Profile</p>
                        </a>
                        <?php
                        else:
                        ?>
                        <button type="button" class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#login">
                            <span class="material-symbols-outlined">
                            person
                            </span>
                            <p class="pt-3">Profile</p>
                        </button>

                        <?php
                        endif;

                        ?>
                    </div>
                </div>
            

            </div>  
        </div>
        <!-- main element -->

        <!-- carousel and categories -->
        <div class="container-fluid content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="categories mt-5 shadow-lg">
                            <div class="categoriesHeader">Categories</div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    smartphone
                                    </span><p class="m-2">Mobile</p></div>
                                    <span class="material-symbols-outlined p-2">
                                        add
                                        </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    charging_station
                                    </span><p class="m-2">Power Bank</p></div>
                                    <span class="material-symbols-outlined p-2">
                                        add
                                        </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    speaker
                                    </span><p class="m-2">Speaker</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    cable
                                    </span><p class="m-2">Cable & Adapter</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    tab_inactive
                                    </span><p class="m-2">Case & Protector</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    headphones
                                    </span><p class="m-2">Headphones</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    tablet
                                    </span><p class="m-2">Tablet</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                            <div class="categoryItems">
                                <div class="items d-flex justify-content-center align-items-center"><span class="material-symbols-outlined p-2">
                                    watch_vibration
                                    </span><p class="m-2">Smart Watch</p></div>
                                <span class="material-symbols-outlined p-2">
                                    add
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 mt-5">
                        <div id="carouselExampleIndicators" class="carousel slide rounded-4">
                            <div class="carousel-indicators">
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner carosolImg shadow-lg">
                              <div class="carousel-item active">
                                <img src="images/carosol1.jpg" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="images/carosol2.jpg" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="images/carosol3.jpg" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="images/carosol4.jpg" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- new arrival product  -->
         <div class="container-fluid mt-5">
            <div class="container newArrivals p-3">
                <div class="newArrivalHead d-flex justify-content-between align-items-center">
                    <h1>New Arrivals</h1>
                    <button>VIEW MORE</button>
                </div>
                <div class="newArrivalsProducts mt-2">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                                <h4>iPhone 16 Pro Max</h4>
                                <div class="price d-flex justfify-content-evenly">
                                    <p>৳110999</p>
                                    <p><del>৳120999</del></p>
                                </div>
                                <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
         </div>

         <!-- Gadget & Accessories -->
         <div class="container-fluid mt-5">
            <div class="container newArrivals p-3">
                <div class="newArrivalHead d-flex justify-content-between align-items-center">
                    <h1>Gadget & Accessories</h1>
                    <button>VIEW MORE</button>
                </div>
                <div class="newArrivalsProducts mt-2">
                    <div class="row">
                        <div class="col-lg-3 col-6 ">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                                <h4>iPhone 16 Pro Max</h4>
                                <div class="price d-flex justfify-content-evenly">
                                    <p>৳110999</p>
                                    <p><del>৳120999</del></p>
                                </div>
                                <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="newProducts">
                                <img src="images/iphone16promax.png">
                            <h4>iPhone 16 Pro Max</h4>
                            <div class="price d-flex justfify-content-evenly">
                                <p>৳110999</p>
                                <p><del>৳120999</del></p>
                            </div>
                            <button>Add to cart</button>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
         </div>
         <!-- footer element -->
         <div class="footerElement">
            <div class="container-fluid">
                <div class="container">
                    <div class="row p-3">
                        <div class="col-lg-3 col-6">
                            <ul>
                                <li><h3>About Us</h3></li>
                                <li>Regarding Us</li>
                                <li>Terms and Conditions</li>
                                <li>Track My Order</li>
                                <li>Career</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-6">
                            <ul>
                                <li><h3>Policy</h3></li>
                                <li>Delivery Policy</li>
                                <li>Point Policy</li>
                                <li>Refund Policy</li>
                                <li>Return Policy</li>
                                <li>Cancellation Policy</li>
                                <li>Privacy Policy</li>
                                <li>GP Star Campaign</li>
                                <li>August Campaign</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-6">
                            <ul>
                                <li><h3>Help</h3></li>
                                <li>Contact Us</li>
                                <li>Exchange</li>
                                <li>Used Device</li>
                                <li>Announcement</li>
                                <li>Corporate Deal</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-6">
                            <ul>
                                <li><h3>Stay Connected</h3></li>
                                <li>SMS Gadget</li>
                                <li>contact@smsgadget.com</li>
                                <li>09678-664664</li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
         </div>
         <!-- footer bottom -->
          <div class="footerBottom">
                <div class="container-fluid">
                    <div class="container justfify-content-center align-items-center">
                        <p class="mt-2">©2024 SMS Gadget All rights reserved</p>
                    </div>
                </div>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>