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
        <a href="index.php" class="logo">Heel2Toe</a>
        <nav class="navbar">
            <ul class="nav-menu">
                <li class='nav-item'>
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class='nav-item'>
                    <a href="products.php" class="nav-link">Products</a>
                </li>
                <li class='nav-item'>
                    <a href="#footer" class="nav-link">Contact</a>
                </li>
                <li class='nav-item'>
                    <!-- calling cart_item() function to count and show no.of item in cart -->
                    <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                </li>
                <li class='nav-item'>
                    <!-- updating dynamic total price -->
                    <a href="#" class="nav-link">Total price: <?php total_cart_price() ?>/-</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>

    <!-- third child -->
    <div class="all-products">

        <!-- ***** diffrent html part just for product page start (need customization) ******-->
        <?php
            view_details(); // all html inside this function for dynamic data logic

            cart(); // calling cart function to update no. of item and related 
        ?>
        <!-- diffrent html part just for product page end -->
    </div>

    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>


    <!-- link to js file -->
    <script src="script.js"></script>
</body>

</html>