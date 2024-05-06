<?php
require_once "./auth.php";
// db connection

require_once "./includes/db_conn.php";
require_once "./includes/helpers.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

        // upload image
        $data = uploadImage("users", $_FILES['image'],3,"register");

        if ($data['errors'] === false) {
            // save info into db
            $name = $data['result'];

            // echo $name;
            // exit;

            $query = "INSERT INTO `users`(`name`, `email`, `passward`, `mobile`, `image`, `city`,`description`) 
            VALUES ('$_POST[name]','$_POST[email]' ,'$_POST[password]','$_POST[mobile]','$name','$_POST[city]','$_POST[description]') ";
    
            if (mysqli_query($con, $query)) {
                header("Location:view-user.php");
            }
            else{
                echo "<div class='alert alert-danger mt-2 uploadingErr'>Query Failed</div>";
            }
        }
        else{
            
          echo  "<div class='alert alert-danger mt-2 uploadingErr'> $data[result]</div>";

        }

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add user</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- navbar include -->
    <?php require_once("./includes/navbar.php") ?>

    <!-- sidebar include -->
    <?php require_once("./includes/sidebar.php") ?>

    <div class="content-body p-3">




        <!-- view categories container -->
        <div class="container mt-3 bg-white p-4">
            <h3> <i class="fa fa-plus text-success"></i> Add user</h3>
            <hr>

            <div class="d-flex justify-content-end">
                <a href="view-user.php" class="btn btn-success text-white"><i class="fa fa-eye"></i> View user</a>
            </div>

            <div class="form-container">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row">

                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter here..." required>
                    </div>


                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter here..." required>
                    </div>



                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="city">City <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter here..." required>
                    </div>



                    <div class="col-lg-4 ">
                        <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-4 ">
                        <label class="form-label" for="password">Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter here..." required>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="image">Image <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-12 mb-2">
                        <label class="form-label" for="val-username">Description <span class="text-danger">*</span>
                        </label>
                        <textarea name="description" class="form-control" id="" rows="5"></textarea>
                    </div>

                    <div class="offset-8 col-lg-4 mb-2">
                        <label for=""></label>

                        <button class="btn btn-success text-white btn-lg mt-2 w-100"> <i class="fa fa-plus"></i> Add Product</button>
                    </div>

                </form>
            </div>

        </div>






    </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>




</body>

</html>