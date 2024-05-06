<?php
require_once "./auth.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile - Ogani</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- navbar include -->
    <?php require_once("./includes/navbar.php") ?>

    <!-- sidebar include -->
    <?php require_once("./includes/sidebar.php") ?>

    <div class="content-body">
    <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./register.php"><button class="btn btn-primary">Add users</button></a></li>
                        <li class="breadcrumb-item "><a href="./view-user.php"><button class="btn btn-success">View User</button></a></li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid mt-3">

        <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                <td><img src="./image/users/<?php echo $_SESSION['image'] ?>" height="80px" width="80px" alt=""></td>
                                    <div class="media-body ms-5">
                                        <h3 class="mb-0"><?= $row['name']?></h3>
                                        <p class="text-muted mb-0"><?= $_SESSION['role']?></p>
                                    </div>
                                </div>
                                
                               
                           

                                <h4>About Me</h4>
                                <p class="text-muted">Hi, I'm <span><?= $_SESSION['name']?></span>, has been the industry standard dummy text ever since the 1500s.</p>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <?= $_SESSION['mobile']?></li>
                                    <li><strong class="text-dark mr-4">Email</strong>  <?= $_SESSION['email'] ?></span></li>
                                </ul>
                            </div>
                        </div>  
                    </div>
                 
                                </form>
                            </div>
                        </div>

                       

        </div>

        </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>
</body>

</html>