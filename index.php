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

    <!-- for swiper slider css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <!-- **** navbar  *** -->
    <div class="header">
        <a href="index.php" class="logo">Heel2Toe</a>
        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="active nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="products.php" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="#footer" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <!-- calling cart_item() function to count and show no.of item in cart -->
                    <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                </li>
                <li class="nav-item">
                    <!-- updating dynamic total price -->
                    <a href="cart.php"  class="nav-link">Total price: <?php total_cart_price() ?>/-</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>

    <!-- ***** landing page banner **** -->
    <section id="home-banner">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- ***** landing page banner **** -->
                    <div class="banner-detail">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button><a href="products.php">Shop Now</a></button>
                    </div>

                    <img src="images/img1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <!-- ***** landing page banner **** -->
                    <div class="banner-detail">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button><a href="products.php">Shop Now</a></button>
                    </div>

                    <img src="images/img2.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <!-- ***** landing page banner **** -->
                    <div class="banner-detail">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button><a href="products.php">Shop Now</a></button>
                    </div>

                    <img src="images/img3.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <!-- ***** landing page banner **** -->
                    <div class="banner-detail">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button><a href="products.php">Shop Now</a></button>
                    </div>

                    <img src="images/img4.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <!-- ***** landing page banner **** -->
                    <div class="banner-detail">
                        <h4>Trade-in-offer</h4>
                        <h2>Super value deals</h2>
                        <h1>On all products</h1>
                        <p>Save more with coupons & up to 70% off!</p>
                        <button><a href="products.php">Shop Now</a></button>
                    </div>

                    <img src="images/img5.jpg" alt="">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
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
            <!-- fetching dynamically some random products as featured product from db -->
            <?php
                featuredProducts();
            ?>
        </div>

    </section>

    <hr>
    <!-- ***** New Arrival Section ***** -->
    <section id="newArrival-products">
        <h2>Latest products</h2>
        <p>Winter Collection New Modern Designs</p>

        <!-- ***** products  ****** -->
        <div class="card-area">

            <!-- fetching dynamic latest (last added)products from db -->
            <?php
                
                latestProducts(); // to display all products

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

    <!-- swiper js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- link to js file -->
    <script>
        // **** swiper slider cdn js on home page *****
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            loop: true,
            centeredSlides: true,
            autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            grabCursor: true,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });

    </script>
</body>

</html>