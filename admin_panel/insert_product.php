<!-- conncection file including here -->
<?php
    include('../includes/connect.php');

    // name attribute value of insert_product to check if it is clicked
    if(isset($_POST['insert_product'])) {
        
        // name attribute values of each one to target that field
        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        // accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='') {

            echo "<script> alert('Please fill all the available fields')</script>";
            exit();

        }else {
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            // insert query
            $insert_products = "insert into products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) values ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

            $result_query = mysqli_query($con, $insert_products);

            if($result_query){
                echo "<script> alert('successfully inserted the products') </script>";
            }
        }
    }
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
                <input type="text" name="description" id="description" placeholder="Enter product description" autocomplete="off" required>
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
                <select name="product_brand" id="" >
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