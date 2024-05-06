<?php
session_start();
require_once "./includes/db_conn.php";

if (!isset($_SESSION['login'])  || $_SESSION['login'] == false) {
    header("location: login.php");
}

$sel_sql = "SELECT * FROM users WHERE id='$_SESSION[user_id]' ";
$exists = mysqli_query($con, $sel_sql);


$row = mysqli_fetch_assoc($exists);
$_SESSION['name']=$row['name'];
$_SESSION['email']=$row['email'];
$_SESSION['passward']=$row['passward'];
$_SESSION['image']=$row['image'];
$_SESSION['cuty']=$row['city'];
$_SESSION['description']=$row['description'];
$_SESSION['mobile']=$row['mobile'];
$_SESSION['role']=$row['role'];

?>