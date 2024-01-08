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
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>

    <?php
        // calling cart function to update no. of items in cart
        cart();
    ?>

    <!-- ************ cart item details show ********* -->
    <section class="cart-detail-area">
        <div class="row">
            <form action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product image</th>
                            <th>quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                             global $con;  // to access globally
                            $get_ip_address = getIPAddress();
                            $total_price = 0;
                            $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
                            $result = mysqli_query($con, $cart_query);
                    
                            // to get price according to product_id having that ip_address from products table for each product
                            while($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id']; // product_id from cart_details table
                                $select_products = "select * from products where product_id=$product_id";
                                $result_products = mysqli_query($con, $select_products);
                    
                                while($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']); // [100, 1050, 500, ...]

                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];

                                    $product_values = array_sum($product_price); // [100 + 1050 + 500] = [1650]
                                    $total_price += $product_values; // 100 + 1050 + 500 ...
                                    
                                    echo "<tr>
                                        <td>$product_title</td>
                                        <td><img src='./admin_panel/product_images/$product_image1' alt='image1' width='140px'></td>
                                        <td><input type='number' name='quantity'></td>
                                        <td>₹ $price_table/-</td>
                                        <td><input type='checkbox'></td>
                                        <td>
                                        <input type='submit' value='Update Cart' name='update_cart'>
                                        <button>Remove</button>
                                        </td>
                                        </tr>";
                                        if(isset($_POST['update_cart'])) {
                                            $quantities = $_POST['quantity'];
                                            $update_cart = "update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }
                                }    
                            } 
                        ?>
                    </tbody>
                </table>
            </form>               
            <!-- total price -->
            <div>
                <h4>Subtotal: <?php echo "₹ $total_price" ?>/-</h4>\
                <a href="#"><button>Checkout</button></a>
            </div>
        </div>
    </section>

    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>

    <!-- external js link -->
    <script src="script.js"></script>
</body>

</html>