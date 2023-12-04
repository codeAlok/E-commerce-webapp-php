<!-- including db connection file -->
<?php
    include("../includes/connect.php");

    if(isset($_POST['insert_cat'])) {
        $category_title = $_POST['cat_title'];

        // --select data from database and insert only unique category --
        $select_query = "select * from categories where category_title = '$category_title'"; 

        // execute given query (connection_var, query)
        $result_select = mysqli_query($con, $select_query);

        $number = mysqli_num_rows($result_select); // count no. of rows with matched data

        if($number > 0) {
            echo "<script> alert('This category is already present') </script>";
        }else {
             // table_name and column should match from db
            $insert_query = "insert into categories (category_title) values ('$category_title')";

            // to execute the given query (con_variable , query)
            $result = mysqli_query($con, $insert_query);

            if($result) {
                echo "<script> alert('Category has been inserted successfully') </script>";
            }
        }
    }
?>

<!-- html part -->
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post">
    <div>
        <span>@</span>
        <input type="text" name="cat_title" placeholder="Insert categories" >
    </div>
    <div>
        <input type="submit" name="insert_cat" value="Insert Categories" >
    </div>
</form>