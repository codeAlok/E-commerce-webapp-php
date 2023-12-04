<!-- including db connection file -->
<?php
    include("../includes/connect.php");

    if(isset($_POST['insert_brand'])) {
        $brand_title = $_POST['brand_title'];

        // --select data from database and insert only unique category --
        $select_query = "select * from brands where brand_title = '$brand_title'"; 

        // execute given query (connection_var, query)
        $result_select = mysqli_query($con, $select_query);

        $number = mysqli_num_rows($result_select); // count no. of rows with matched data

        if($number > 0) {
            echo "<script> alert('This brand is already present') </script>";
        }else {
             // table_name and column should match from db
            $insert_query = "insert into brands (brand_title) values ('$brand_title')";

            // to execute the given query (con_variable , query)
            $result = mysqli_query($con, $insert_query);

            if($result) {
                echo "<script> alert('Brand has been inserted successfully') </script>";
            }
        }
    }
?>


<!-- html part -->
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post">
    <div>
        <span>@</span>
        <input type="text" name="brand_title" placeholder="Insert brands" >
    </div>
    <div>
        <input type="submit" name="insert_brand" value="Insert Brands" >
    </div>
</form>