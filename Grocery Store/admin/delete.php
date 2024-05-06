<?php
require_once("./includes/db_conn.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM products WHERE id = $id";
 $result = mysqli_query($con , $sql);

 if($result){
    $sql2 = mysqli_query($con ,"DELETE FROM categories WHERE id = $id");
    

    header("Location:products.php");

 }


?>