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
    <!-- <h1>it's working</h1> -->
    <!-- navbar -->
    <div class="header">
        <a href="#" class="logo">LOGO</a>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#">Products</a>
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
            <form action="#">
                <input type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit">Search</button>
            </form>
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
        <!-- sidenav -->
        <div class="sidenav">
            <!-- ***** brands section ***** -->
            <ul>
                <li>
                    <a href="#"><h4>Brands</h4></a>
                </li>

                <!-- php to insert dynamic brands name from database -->
                <?php
                    // function call to display all brands
                    getbrands();
                ?>
            </ul>

            <!-- ****** categories section ****** -->
            <ul>
                <li>
                    <a href="#"><h4>categories</h4></a>
                </li>

                <!-- php to insert dynamic category name from database -->
                <?php
                    getcategories(); // to display all categories
                ?>

            </ul>
        </div>

        <!-- ***** products  ****** -->
        <div class="product-area">

            <!-- fetching dynamic products from db -->
            <?php
                
                getproducts(); // to display all products
                get_unique_categories();  // to show unique product matching category_id
                get_unique_brands();  // to show unique brand matching brand_id
            ?>

        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        copyright @ all rights reserved
    </footer>
</body>

</html>