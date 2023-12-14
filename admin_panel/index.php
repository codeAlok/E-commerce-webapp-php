<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- external css link -->
    <link rel="stylesheet" href="../css/adminp.css">

</head>

<body>

    <!-- first child navbar -->
    <div class="header">
        <a href="#" class="logo">LOGO</a>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="#">Welcome guest</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- second child -->
    <div class="heading1">
        <h3 class="text-center">Manage details</h3>
    </div>

    <!-- third child -->
    <div class="navigation">
        <div>
            <a href="#"><img src="../images/men_shoe15.jpg" alt="admin_image" class="admin_image"></a>
            <p>Admin name</p>
        </div>

        <!-- buttons -->
        <div class="buttons">
            <button class="btn"><a href="insert_product.php" class="text-ceter">Insert Products</a></button>
            <button class="btn"><a href="" class="text-ceter">View Products</a></button>

            <!-- get variable (insert_category variable) -->
            <button class="btn"><a href="index.php?insert_category" class="text-ceter">Insert categories</a></button>

            <button class="btn"><a href="" class="text-ceter">View Categories</a></button>

            <button class="btn"><a href="index.php?insert_brand" class="text-ceter">Insert Brands</a></button>

            <button class="btn"><a href="" class="text-ceter">View Brands</a></button>
            <button class="btn"><a href="" class="text-ceter">All orders</a></button>
            <button class="btn"><a href="" class="text-ceter">All payments</a></button>
            <button class="btn"><a href="" class="text-ceter">list users</a></button>
            <button class="btn"><a href="" class="text-ceter">Logout</a></button>
        </div>
    </div>

    <!-- fourth child for insert categories -->
    <div class="category-container">
        <?php
            if(isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }

            if(isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }

        ?>
    </div>

</body>

</html>