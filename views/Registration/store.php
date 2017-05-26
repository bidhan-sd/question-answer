<?php
require_once("../../src/Registration/User.php");
$oneSignup = new User();
$signup = $oneSignup->setData($_POST)->signup();
session_start();
$_SESSION['u_id'] = $signup;
header('location:../Profile/profileUpdate.php');