<?php
    //  db connection file
    include('includes/connect.php');

    // common_function file included
    include('functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- external css link -->
    <link rel="stylesheet" href="css/style.css">


    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <!-- **** navbar  *** -->
    <div class="header">
        <a href="#" class="logo">Heel2Toe</a>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="index.php" class="active">Home</a>
                </li>
                <li>
                    <a href="products.php">Products</a>
                </li>
                <li>
                    <a href="#">Register</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup></a>
                </li>
                <li>
                    <a href="#">Total price: 100/-</a>
                </li>
            </ul>

        </nav>
    </div>

    <!-- ***** landing page banner **** -->
    <section id="home-banner">
        <div>
            <h4>Trade-in-offer</h4>
            <h2>Super value deals</h2>
            <h1>On all products</h1>
            <p>Save more with coupons & up to 70% off!</p>
            <button>Shop Now</button>
        </div>

        <img src="images/men_shoe8.jpg" alt="">
    </section>

    <!-- ******* e-commerce services ********* -->
    <section id="services-container">
        <div class="service">
            <i class="fa-solid fa-truck"></i>
            <div class="content">
                <h3>free shipping</h3>
                <p>order over $100</p>
            </div>
        </div>

        <div class="service">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <div class="content">
                <h3>Money Back Gurantee</h3>
                <p>Within 24 hours</p>
            </div>
        </div>

        <div class="service">
            <i class="fa-solid fa-lock"></i>
            <div class="content">
                <h3>Secure payment</h3>
                <p>100% secure payment</p>
            </div>
        </div>

        <div class="service">
            <i class="fa-solid fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>
    </section>

    <!-- ******** featured products ******** -->
    <section id="featured-products">
        <h2>Featured products</h2>
        <p>Winter Collection New Modern Designs</p>

        <div class="card-area">
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/men_shoe3.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/women_slipper2.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/men_shoe10.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/women_slipper3.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/men_shoe3.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/shoe1.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-image">
                        <img src="images/men_shoe5.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h5>Puma</h5>
                        <p>This is a new product recently launched</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$80</h4>
                    </div>
                </a>
            </div>

        </div>

    </section>

    <!-- ***** New Arrival Section ***** -->
    <section id="newArrival-products">
        <h2>Latest products</h2>
        <p>Winter Collection New Modern Designs</p>

        <!-- ***** products  ****** -->
        <div class="card-area">

            <!-- fetching dynamic products from db -->
            <?php
                
                getproducts(); // to display all products

            ?>

        </div>
    </section>


    <!-- ****** Newsletter section ******* -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletter</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>

        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="btn">Sign Up</button>
        </div>
    </section>


    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>
</body>

</html>