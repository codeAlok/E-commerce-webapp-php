<!-- conncection file including here -->
<?php
    include('../includes/connect.php');
?>

<!-- Insert product page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products || Admin</title>


</head>
<body>
    <div>
        <h1> Insert Products</h1>


        <!-- form -->
        <!-- to insert images/ something not related to text you have to use "enctype" attribute -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div>
                <label for="product_title">Product title</label>
                <input type="text" name="product_title" id="product_title" placeholder="Enter product title" autocomplete="off" required>
            </div>

             <!-- discription -->
             <div>
                <label for="product_description">Product description</label>
                <input type="text" name="product_description" id="product_description" placeholder="Enter product description" autocomplete="off" required>
            </div>

              <!-- keywords -->
              <div>
                <label for="product_keywords">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" placeholder="Enter product keywords" autocomplete="off" required>
            </div>

            <!-- categories -->
            <div>
                <select name="product_category" id="" >
                    <option value="">select a Category</option>

                    <!-- php logic to insert/ provide category options from database -->
                    <?php
                        $select_query = "select * from categories";
                        $result_query = mysqli_query($con, $select_query);

                        while($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];

                            // here category_id is being passed to display the matched id product
                            // can pass title also, but should have to match string, keep simple
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>

                </select>
            </div>

            <!-- Brands -->
            <div>
                <select name="product_Brand" id="" >
                    <option value="">select a Brand</option>

                    <!-- to provide brand options from database -->
                    <?php
                        $select_query = "select * from brands";
                        $result_query = mysqli_query($con, $select_query);

                        while($row = mysqli_fetch_assoc($result_query)) {
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];

                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div>
                <label for="product_image1">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" required>
            </div>

            <!-- Image 2 -->
            <div>
                <label for="product_image2">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" required>
            </div>

            <!-- Image 3 -->
            <div>
                <label for="product_image3">Product image3</label>
                <input type="file" name="product_image3" id="product_image3" required>
            </div>

            <!-- price -->
            <div>
                <label for="product_price">Product price</label>
                <input type="text" name="product_price" id="product_price" placeholder="Enter product price" autocomplete="off" required>
            </div>

            <!-- submit button -->
            <div>
                <input type="submit" name="insert_product" value="insert Product">
            </div>
        </form>
    </div>
</body>
</html>