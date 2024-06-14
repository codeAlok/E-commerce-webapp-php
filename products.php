<!-- *********** This file is to show all products from databse and search functionality (Products) -->


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
        <a href="index.php" class="logo">Heel2Toe</a>
        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
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
                    <a href="cart.php" class="nav-link">Total price: <?php total_cart_price() ?>/-</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <!-- search box -->
            <form action="" method="get" class="search-container">
                <input type="search" placeholder="Search..." class="search-input" aria-label="Search"
                    name="search_data">
                <button type="submit" class="search-btn" name="search_product_data"><i class="fas fa-search"></i></button>
            </form>
        </nav>
    </div>

    <!-- ****** sidenav for small screen ***** -->
    <div class="filter-container">
            <div class="filter-sidenav">
                <!-- ***** brands section ***** -->
                <ul class="filter-nav-menu">
                    <li style="margin-top: 1.5rem">
                        <a href="#"><h4>Brands</h4></a>
                    </li>

                    <?php
                        // function call to display all brands
                        getbrands();
                    ?>

                    <li style="margin-top: 1rem;"><a href="#"><h4>Categories</h4></a></li>
                    <!-- php to insert dynamic category name from database -->
                    <?php
                        getcategories(); // to display all categories
                    ?>
                </ul>

                <!-- filter hamberger icon button -->
                <div class="filter-bar">
                    <span class="fbar"></span>
                    <span class="fbar"></span>
                    <span class="fbar"></span>
                </div>
            </div>

            <!-- search box  -->
            <form action="" method="get" class="search-container">
                <input type="search" placeholder="Search..." class="search-input" aria-label="Search"
                    name="search_data">
                <button type="submit" class="search-btn" name="search_product_data"><i class="fas fa-search"></i></button>
            </form>
    </div>

    <!-- third child -->
    <div class="all-products">
        <!-- sidenav -->
        <div class="sidenav">
            <!-- ***** brands section ***** -->
            <h4 style="margin-top: 1rem;">Brands</h4>
            <ul>

                <!-- php to insert dynamic brands name from database -->
                <?php
                    // function call to display all brands
                    getbrands();
                ?>
            </ul>

            <!-- ****** categories section ****** -->
            <h4 style="margin-top: 1rem;">Categories</h4>
            <ul>
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

                // *** if searched something show searched product/error otherwise all product ***
                if(isset($_GET['search_product_data'])) {
                    search_product(); 
                }else {
                    get_all_products(); // to display all products
                }

                get_unique_categories();  // to show unique product matching category_id
                get_unique_brands();  // to show unique brand matching brand_id
            ?>

        </div>
    </div>

    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>
    
    
    <!-- link to js file -->
    <script src="script.js"></script>
   
</body>

</html>