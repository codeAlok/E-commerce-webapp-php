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
    <link rel="stylesheet" href="css/checkout.css">


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
        <div class="cart-table">
            <form action="" method="post">
                <table border="2">
                    
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

                            $result_count = mysqli_num_rows($result);

                            if($result_count > 0) {
                                
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
                                            <td><input type='checkbox' name='removeitem[]' value='$product_id'></td>
                                            <td>
                                            <input type='submit' value='Update Cart' name='update_cart' class='update-cart'>
                                            <input type='submit' value='Remove Cart' name='remove_cart' class='remove-cart'>
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
                            }
                            else {
                                echo "<h2> Cart is empty</h2>";
                            }
                            
                        ?>
                    </tbody>
                </table>
            </form>               
        </div>
        
        <!-- total price -->
        <div class='total'>
                <h4>Subtotal: <?php echo "₹ $total_price" ?>/-</h4>
        </div>
    </section>

    <!-- ****** checkout page section from here  ******-->
    <?php

        global $con;  // to access globally
        $get_ip_address = getIPAddress();
        
        if(isset($_POST['checkout'])) {

          $user_id = $get_ip_address; // from ip address of particular system/device
          $user_name = $_POST['firstname'];
          $email = $_POST['email'];
          $user_name = $_POST['email'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $zip = $_POST['zip'];
          $cardholder_name = $_POST['cardholder_name'];
          $card_number = $_POST['card_number'];
          $expiry_month = $_POST['expiry_month'];
          $expiry_year = $_POST['expiry_year'];
          $card_cvv = $_POST['card_cvv'];
          

          // total price can be accessed from above code for cart details

          if($user_id == '' or $email == '' or $user_name == '' or $address == '' or $city == '' or $state == '' or $zip == '' or $cardholder_name == '' or $card_number == '' or $expiry_month == '' or $expiry_year == '' or $card_cvv == '') {
            echo "<script>alert('Please fill the available fields') </script>";
          }
          else {
            $insert_checkout_details = "insert into checkout_details (user_name,user_id,email, address, city, zip, state, cardholder_name, card_number, expiry_month, card_cvv, expiry_year,total_price) values('$user_name', '$user_id', '$email', '$address', '$city', $zip, '$state', '$cardholder_name', '$card_number', '$expiry_month', $card_cvv, $expiry_year, $total_price)";

            $result_checkout_query = mysqli_query($con, $insert_checkout_details);

            if($result_checkout_query) {
              echo "<script>alert('Your Order is being successfully Placed.') </script>";
            }
          }
       
        }
    ?>

    <h2>Checkout Details</h2>
    <!-- Three parts inside this div -->
    <div class="row" id="checkout"> 
      <div class="col-75">
        <div class="container">
          <!-- Both Form are combined one Form -->
          
          <form action="" method='post'>

          <!-- Delivery and Payment Form both present inside this div -->
            <div class="row">
              <!-- div for Delivery Form -->
              <div class="col-50">
                <h3>Delivery Address</h3>
                <label for="fname"><i class="fa-solid fa-user"></i> Full Name</label>
                <input
                  type="text"
                  id="fname"
                  name="firstname"
                  placeholder="Enter Name"
                />
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input
                  type="text"
                  id="email"
                  name="email"
                  placeholder="Enter Email"
                />
                <label for="adr"
                  ><i class="fa-regular fa-address-card"></i> Address</label
                >
                <input
                  type="text"
                  id="adr"
                  name="address"
                  placeholder="Enter Address"
                />
                <label for="city"><i class="fa-solid fa-city"></i> City</label>
                <input
                  type="text"
                  id="city"
                  name="city"
                  placeholder="Deoghar"
                />

                <!-- This div row is only for Zip and State -->
                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input
                      type="text"
                      id="state"
                      name="state"
                      placeholder="Jharkhand"
                    />
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input
                      type="text"
                      id="zip"
                      name="zip"
                      placeholder="814112"
                    />
                  </div>
                </div>
              </div>

              <!-- Payment Form inside this div -->
              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa-brands fa-cc-visa" style="color: navy"></i>
                  <i class="fa-brands fa-cc-mastercard" style="color: red"></i>
                  <i class="fa-brands fa-cc-amazon-pay" style="color: rgb(235, 235, 36)"></i>
                  <i class="fa-brands fa-cc-paypal" style="color: rgb(11, 186, 235)"></i>
                  <i class="fa-brands fa-cc-amex" style="color: blue"></i>
                  <i class="fa-brands fa-cc-discover" style="color: orange"></i>
                </div>
                <label for="cname">Cardholder name</label>
                <input
                  type="text"
                  id="cname"
                  name="cardholder_name"
                  placeholder="Rishav"
                />
                <label for="ccnum">Credit / Debit card number</label>
                <input
                  type="text"
                  id="ccnum"
                  name="card_number"
                  placeholder="1111-2222-3333-4444"
                />
                <label for="expmonth">Expiry Month</label>
                <input
                  type="text"
                  id="expmonth"
                  name="expiry_month"
                  placeholder="October"
                />
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Expiry Year</label>
                    <input
                      type="text"
                      id="expyear"
                      name="expiry_year"
                      placeholder="2017"
                    />
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="card_cvv" placeholder="100" />
                  </div>
                </div>
              </div>
            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr" />
              Delivery address same as billing
            </label>
            <input type="submit" name="checkout" value="Continue to checkout" class="btn" />
          </form>
        </div>
      </div>
      
    </div>

    <!-- function to remove items -->
    <?php
        function remove_cart_item() {
            global $con;

            if(isset($_POST['remove_cart'])) {
                foreach($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;

                    $delete_query = "delete from cart_details where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);

                    if($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();

    ?>

    <!-- include footer -->
    <?php include("./includes/footer.php");  ?>

    <!-- external js link -->
    <script src="script.js"></script>
</body>

</html>