<?php
    // including db connnect file
    include('./includes/connect.php');

    // ********* function for getting all products **********
    function featuredProducts() {
        global $con;  // to access globally


        // condition to check brand variable or category variable isset, if not given then show all products
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {

                // query to fetch all products and display that in random order
                $select_query = "select * from products order by rand() limit 0,7";
                $result_query = mysqli_query($con, $select_query);
                
                while($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $brand_id = $row['brand_id'];
                    $category_id = $row['category_id'];
        
                    echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
                }
            }
        }
    }

    // ********* function for getting some latest products **********
    function latestProducts() {
        global $con;  // to access globally


        // condition to check brand variable or category variable isset, if not given then show all products
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {

                // query to fetch all products and display that in random order
                $select_query = "select * from products order by product_id DESC limit 0,4";
                $result_query = mysqli_query($con, $select_query);
                
                while($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $brand_id = $row['brand_id'];
                    $category_id = $row['category_id'];
        
                    echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
                }
            }
        }
    }

    // ************ To get all products for "products page" ****************
    function get_all_products() {
        global $con;  // to access globally


        // condition to check brand variable or category variable isset, if not given then show all products
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {

                // query to fetch all products and display that in random order
                $select_query = "select * from products order by rand()";
                $result_query = mysqli_query($con, $select_query);
                
                while($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $brand_id = $row['brand_id'];
                    $category_id = $row['category_id'];
        
                    echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
                }
            }
        } 
    }

    // ********* function for getting unique category product **********
    function get_unique_categories() {
        global $con;  // to access globally


        // condition to show product matching the category id
        if(isset($_GET['category'])) {

            $category_id = $_GET['category'];  // accessing categroy_id from url
            $select_query = "select * from products where category_id=$category_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query); // count numbers of data

            if($num_of_rows == 0){
                echo "<h2> No stock for this category </h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];
    
                echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
            }
            
        }
    }

    // ********* function for getting unique brand product **********
    function get_unique_brands() {
        global $con;  // to access globally


        // condition to show product matching the category id
        if(isset($_GET['brand'])) {

            $brand_id = $_GET['brand'];  // accessing categroy_id from url
            $select_query = "select * from products where brand_id=$brand_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query); // count numbers of data

            if($num_of_rows == 0){
                echo "<h2> This brand is not available for service </h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];
    
                echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
            }
            
        }
    }

    // ******* function to display brands on products page ********
    function getbrands() {
        global $con;  // to access globally

        $select_brands = "select * from brands";
        $result_brands = mysqli_query($con, $select_brands);

        // to bring data from database
        // $row_data = mysqli_fetch_assoc($result_brands);
        // echo $row_data['brand_title'];   // only first data from db will display

        while($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];

            echo "<a href='products.php?brand=$brand_id' class='filter-nav-link'> <li class='nav-item'> $brand_title  </li></a>";
        }
    }

    // ******** function to display category on products page ********
    function getcategories() {
        global $con; // to access globally

        $select_categories = "select * from categories";
        $result_categories = mysqli_query($con, $select_categories);

        while($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];

            echo "<a href='products.php?category=$category_id' class='filter-nav-link'><li class='nav-item'>  $category_title  </li></a>";

        }
    }

    // ******** SEARCHING products function ************
    function search_product() {
        global $con;  // to access globally

        // query to fetch all products and display that according to matched keywords if button is clicked
        if(isset($_GET['search_product_data'])) {

            $search_data_value = $_GET['search_data'];
            $search_query = "select * from products where product_keywords like '%$search_data_value%'";
            $result_query = mysqli_query($con, $search_query);
            $num_of_rows = mysqli_num_rows($result_query); // count numbers of data

            if($num_of_rows == 0){
                echo "<h2> NO result match. No products found on this category</h2>";
            }
            
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];
                
                echo "<div class='card'>
                            <a href='product_details.php?product_id=$product_id'>
                                <div class='card-image'>
                                    <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                </div>
                                <div class='card-body'>
                                    <h5>$product_title</h5>
                                    <p>$product_description</p>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>₹ $product_price</h4>
                                </div>
                            </a>
                        </div> ";
            }
        }
           
    }

    // ********* View Details function **********
    function view_details() {
        global $con;  // to access globally

        // condition if product_id isset, then fetch related data
        if(isset($_GET['product_id'])) { 
            
            $product_id = $_GET['product_id']; // store product_id from url
            $select_query = "select * from products where product_id=$product_id";
            $result_query = mysqli_query($con, $select_query);
            
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];
    
                echo "<div class='card-wrapper'>
                        <div class='card-container'>
                            <!-- card left -->
                            <div class='product-imgs'>
                                <div class='img-display'>
                                    <div class='img-showcase'>
                                        <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                        <img src='./admin_panel/product_images/$product_image2' alt='product2'>
                                        <img src='./admin_panel/product_images/$product_image3' alt='product3'>
                                    </div>
                                </div>
                                <div class='img-select'>
                                    <div class='img-item'>
                                        <a href='#' data-id = '1'>
                                            <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                                        </a>
                                    </div>
                                    <div class = 'img-item'>
                                        <a href='#' data-id = '2'>
                                            <img src='./admin_panel/product_images/$product_image2' alt='product2'>
                                        </a>
                                    </div>
                                    <div class='img-item'>
                                        <a href='#' data-id = '3'>
                                            <img src='./admin_panel/product_images/$product_image3' alt='product3'>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- card right -->
                            <div class='product-content'>
                                <h2 class='product-title'>$product_title</h2>
            
                                <p class='product-price'>₹ $product_price</p>
            
                                <div class='product-detail'>
                                    <h2>about this item: </h2>
                                    <p>$product_description</p>
                                </div>
            
                                <div class ='purchase-info'>
                                    <button type='button' class='btn'><a href='product_details.php?product_id=$product_id&add_to_cart=$product_id'>
                                    Add to Cart<i class='fa-solid fa-cart-arrow-down'></i></a></i>
                                    </button>
                                    <button type='button' class='btn'><a href='#'>Buy Now<i class='fa-solid fa-heart'></i></a></button>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    // ********* Getting Ip address function (for cart_details & storage variation ) *********** 
    // Ip address will be same (::1) for all users as we are using localhost(for particular system)
    function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //whether ip is from the remote address  
        else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  
    
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    // ********** Cart function ***********
    function cart() {
        if(isset($_GET['add_to_cart'])) {
            global $con;

            $get_ip_address = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            $select_query = "select * from cart_details where ip_address='$get_ip_address' and product_id=$get_product_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query); // count numbers of data

            if($num_of_rows > 0){
                echo "<script>alert('This item is already present inside cart') </script>";
                echo "<script>
                        window.history.back();
                    </script>";
            }
            else {
                $insert_query = "insert into cart_details (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_address', 0)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item added to cart') </script>";
                echo "<script>
                        window.history.back();  // to go to previous url
                    </script>";
            }
        }
    }

    // ********** function to get number of items in cart ************
    function cart_item() {
        // if add_to_cart button is active/not active(not in url) then also count no. of items & update
        if(isset($_GET['add_to_cart'])) {
            global $con;

            $get_ip_address = getIPAddress();
            $select_query = "select * from cart_details where ip_address='$get_ip_address'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_items = mysqli_num_rows($result_query); // count no. of cart items
        }
        else {
            global $con;
            $get_ip_address = getIPAddress();
            $select_query = "select * from cart_details where ip_address='$get_ip_address'";
            $result_query = mysqli_query($con, $select_query);
            $count_cart_items = mysqli_num_rows($result_query); // count no. of cart items
            // echo "<script>location.reload();</script>";
        }
        
        echo $count_cart_items;
    }

    // ******** total price function *********
    function total_cart_price() {
        global $con;

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
                $product_values = array_sum($product_price); // [100 + 1050 + 500] = [1650]

                $total_price += $product_values; // 100 + 1050 + 500 ...
            }    
        }
        echo $total_price;
    }
?>