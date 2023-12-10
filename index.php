<!-- db connection file -->
<?php
    include('includes/connect.php');
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
            <!-- brands section -->
            <ul>
                <li>
                    <a href="#"><h4>Brands</h4></a>
                </li>

                <!-- php to insert dynamic brands name from database -->
                <?php
                    $select_brands = "select * from brands";
                    $result_brands = mysqli_query($con, $select_brands);

                    // to bring data from database
                    // $row_data = mysqli_fetch_assoc($result_brands);
                    
                    // echo $row_data['brand_title'];   // only first data from db will display

                    while($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        // echo $brand_title;

                        echo "<li> <a href='index.php?brand=$brand_id'> $brand_title </a> </li>";

                    }
                ?>

            </ul>

            <!-- categories section -->
            <ul>
                <li>
                    <a href="#"><h4>categories</h4></a>
                </li>
                <!-- php to insert dynamic category name from database -->
                <?php
                    $select_categories = "select * from categories";
                    $result_categories = mysqli_query($con, $select_categories);

                    // to bring data from database
                    // $row_data = mysqli_fetch_assoc($result_category);
                    
                    // echo $row_data['category_title'];   // only first data from db will display

                    while($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        // echo $category_title;

                        echo "<li> <a href='index.php?category=$category_id'> $category_title </a> </li>";

                    }
                ?>

            </ul>
        </div>

        <!-- products -->
        <div class="product-area">

            <!-- fetching dynamic products from db -->
            <?php
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
            ?>

        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        copyright @ all rights reserved
    </footer>
</body>

</html>