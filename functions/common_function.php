<?php
    // including db connnect file
    include('./includes/connect.php');

    // ********* function for getting all products **********
    function getproducts() {
        global $con;  // to access globally

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


?>