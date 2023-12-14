<?php
    // including db connnect file
    include('./includes/connect.php');

    // ********* function for getting all products **********
    function getproducts() {
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
                            <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                            <div class='card-body'>
                                <h5>$product_title</h5>
                                <p>$product_description</p>
                                <a href='#' class='btn'>Add to cart</a>
                                <a href='#' class='btn'>buy now</a>
                            </div>
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
                            <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                            <div class='card-body'>
                                <h5>$product_title</h5>
                                <p>$product_description</p>
                                <a href='#' class='btn'>Add to cart</a>
                                <a href='#' class='btn'>buy now</a>
                            </div>
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
                        <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                        <div class='card-body'>
                            <h5>$product_title</h5>
                            <p>$product_description</p>
                            <a href='#' class='btn'>Add to cart</a>
                            <a href='#' class='btn'>buy now</a>
                        </div>
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
                        <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                        <div class='card-body'>
                            <h5>$product_title</h5>
                            <p>$product_description</p>
                            <a href='#' class='btn'>Add to cart</a>
                            <a href='#' class='btn'>buy now</a>
                        </div>
                    </div> ";
            }
            
        }
    }

    // ******* function to display brands ********
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

            echo "<li> <a href='index.php?brand=$brand_id'> $brand_title </a> </li>";

        }
    }

    // ******** function to display category ********
    function getcategories() {
        global $con; // to access globally

        $select_categories = "select * from categories";
        $result_categories = mysqli_query($con, $select_categories);

        while($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];

            echo "<li> <a href='index.php?category=$category_id'> $category_title </a> </li>";

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
                <img src='./admin_panel/product_images/$product_image1' alt='product1'>
                <div class='card-body'>
                <h5>$product_title</h5>
                <p>$product_description</p>
                <a href='#' class='btn'>Add to cart</a>
                <a href='#' class='btn'>buy now</a>
                </div>
                </div> ";
            }
        }
           
    }

?>