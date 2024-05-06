<?php

// db connection

require_once "./includes/db_conn.php";
require_once "./includes/helpers.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        // upload image
        $data = uploadImage("Product", $_FILES['image'],3,"products");

        if ($data['errors'] === false) {
            // save info into db
            $name = $data['result'];

            // echo $name;
            // exit;

            $query = "INSERT INTO `products`(`name`, `unit_price`, `category_id`, `quantity`, `image`, `description`) 
            VALUES ('$_POST[name]','$_POST[unit_price]' ,'$_POST[category]','$_POST[quantity]','$name','$_POST[description]') ";
    
            if (mysqli_query($con, $query)) {
                header("Location:products.php");
            }
            else{
                $_SESSION['error'] = "Warning! Query Failed";
                exit;
            }
        }
        else{
            
            $_SESSION['success'] = "congralation! successfully submit";

        }

    exit;
}


?>