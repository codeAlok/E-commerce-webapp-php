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
    <title>product Details</title>

    <!-- external css link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_pro_detail.css">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- <h1>it's working</h1> -->
    <!-- navbar -->
    <div class="header">
        <a href="#" class="logo">LOGO</a>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="index.php">Home</a>
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
            </ul>
        </nav>
    </div>

    <!-- second child -->
    <nav class="navbar header">
        <ul>
            <li>
                <a href="#">Welcome Guest</a>
            </li>
            <li>
                <a href="#">Login</a>
            </li>
        </ul>
    </nav>

    <!-- third child -->
    <div class="div3">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>

    <!-- fourth child -->
    <div class="container">

        <!-- ***** diffrent html part just for product page start (need customization) ******-->
        <div class = "card-wrapper">
        <div class = "card-container">
            <!-- card left -->
            <div class = "product-imgs">
            <div class = "img-display">
                <div class = "img-showcase">
                <img src = "images/shoe1.jpg" alt = "shoe image">
                <img src = "images/shoe2.jpg" alt = "shoe image">
                <img src = "images/shoe3.jpg" alt = "shoe image">
                <img src = "images/shoe4.jpg" alt = "shoe image">
                </div>
            </div>
            <div class = "img-select">
                <div class = "img-item">
                <a href = "#" data-id = "1">
                    <img src = "images/shoe1.jpg" alt = "shoe image">
                </a>
                </div>
                <div class = "img-item">
                <a href = "#" data-id = "2">
                    <img src = "images/shoe2.jpg" alt = "shoe image">
                </a>
                </div>
                <div class = "img-item">
                <a href = "#" data-id = "3">
                    <img src = "images/shoe3.jpg" alt = "shoe image">
                </a>
                </div>
                <div class = "img-item">
                <a href = "#" data-id = "4">
                    <img src = "images/shoe4.jpg" alt = "shoe image">
                </a>
                </div>
            </div>
            </div>
            <!-- card right -->
            <div class = "product-content">
            <h2 class = "product-title">Nike shoes</h2>

            <p class = "product-price">$249</p>

            <div class = "product-detail">
                <h2>about this item: </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
            </div>

            <div class = "purchase-info">
                <button type = "button" class = "btn">
                Add to Cart <i class = "fas fa-shopping-cart"></i>
                </button>
                <button type = "button" class = "btn">Buy Now</button>
            </div>

            <div class = "social-links">
                <p>Share At: </p>
                <a href = "#">
                <i class = "fab fa-facebook-f"></i>
                </a>
                <a href = "#">
                <i class = "fab fa-twitter"></i>
                </a>
                <a href = "#">
                <i class = "fab fa-instagram"></i>
                </a>
                <a href = "#">
                <i class = "fab fa-whatsapp"></i>
                </a>
                <a href = "#">
                <i class = "fab fa-pinterest"></i>
                </a>
            </div>
            </div>
        </div>
        </div>
        <!-- diffrent html part just for product page end -->
    </div>

    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>


    <!-- link to js file -->
    <script src="script.js"></script>
</body>

</html>