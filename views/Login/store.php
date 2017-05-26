<?php
require_once("../../src/Login/LogIn.php");
$oneLogin = new LogIn();
$value = $oneLogin->setData($_POST)->login();
if ($value != null) {
    session_start();
    $_SESSION['u_id'] = $value['u_id'];
    header('location:../HomePage/index.php');
} else {
    session_start();
    $_SESSION['message'] = "Login failed! Please insert correct information.";
    header('location:login.php');
}