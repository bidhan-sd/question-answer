<?php
session_start();
unset($_SESSION['u_id']);
unset($_SESSION['question']);
header('location:../../index.php');