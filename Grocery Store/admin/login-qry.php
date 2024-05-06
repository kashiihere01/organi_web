<?php

session_start();

    require_once "./includes/db_conn.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] == "login") {

        $email = $_POST['email'];
        $password = $_POST['password'];

    

       // verify inputs are correct ?

       if($email == "" || $password == ""){
        $_SESSION['error'] = "All feilds are requireds...!";
        header("Location:login.php");
        exit;
       }

        // verify user is exist ?
        $sel_sql = "SELECT * FROM users WHERE email='$email' ";
        $exists = mysqli_query($con, $sel_sql);

        if(mysqli_num_rows($exists) === 0 ) {

            $_SESSION['error'] = "invalid credentials email...!";
            header("Location:login.php");
            exit;
            
        }

        
        // if user exists then verify its password is correct ?
        $user = mysqli_fetch_assoc($exists);

        if($password !== $user['passward']) {
            $_SESSION['error'] = "invalid credentials ...!";
            header("Location:login.php");
            exit;        }
        


        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];

        header("Location:profile.php");

    }



?>