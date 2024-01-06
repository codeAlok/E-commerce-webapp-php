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
                    <a href="#footer">Contact</a>
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