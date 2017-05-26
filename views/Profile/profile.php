<?php
require_once("../../src/Profile/Profile.php");
$profileUpdate = new Profile();
$value = $profileUpdate->show();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../../src/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table td {
            padding: 5px 80px;
        }
    </style>
</head>
<body class="body">
<header class="mainheader">
    <div class="logo">
        <img src="../../src/img/logo.png">
    </div>
    <div class="banner">
        <img src="../../src/img/banner.jpg">
    </div>
    <nav>
        <ul>
            <li><a href="../HomePage/index.php">Home</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
            <li><a href="../AskQuestion/askQuestion.php">Ask Questions</a></li>
            <li><a href="../Questions/questions.php">My Questions</a></li>
            <li><a href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
</header>
    <?php
    if (isset($_SESSION['message']))
    {
        echo "<h1>".$_SESSION['message']."</h1>";
        unset($_SESSION['message']);
    }
    ?>
</header>
<div class="maincontent">
    <div class="content">
        <article class="topcontent">
            <header>
                <?php if (empty($value['photo'])) {
                    ?>
                    <img src="uploads/img.jpg" height="130px" width="130px">
                    <?php
                } else {
                    ?>
                    <img src="uploads/<?php echo $value['photo'] ?>" height="130px" width="130px">
                    <?php
                }
                ?>
                <a href="profileUpdate.php">Edit Profile</a>
            </header>
            <content>
                <p>
                <fieldset>
                    <legend>User Information</legend>
                    <form id="signupForm" action="store.php" method="POST">
                        <table>
                            <tr>
                                <th>Name:</th>
                                <td><?php
                                    if ($value['fname'] == '' && $value['mname'] == '' && $value['lname'] == '') {
                                        echo 'Not set yet';
                                    } else
                                        echo $value['fname'] . ' ' . $value['mname'] . ' ' . $value['lname'];
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td><?php
                                    if ($value['gender'] == '') {
                                        echo 'Not set yet';
                                    } else
                                        echo $value['gender'] ?></td>
                            </tr>
                            <tr>
                                <th>DoB:</th>
                                <td><?php
                                    if ($value['dob_year'] == '' && $value['dob_month'] == '' && $value['dob_day'] == '') {
                                        echo 'Not set yet';
                                    } else
                                        echo $value['dob_day'] . '-' . $value['dob_month'] . '-' . $value['dob_year'] ?></td>
                            </tr>
                            <tr>
                                <th>Hobby1:</th>
                                <td><?php
                                    if ($value['interest1'] == '') {
                                        echo 'Not set yet';
                                    } else
                                        echo $value['interest1'] ?></td>
                            </tr>
                            <tr>
                                <th>Hobby2:</th>
                                <td><?php
                                    if ($value['interest2'] == '') {
                                        echo 'Not set yet';
                                    } else
                                        echo $value['interest2'] ?></td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
                </p>
            </content>
        </article>
    </div>
</div>
<footer class="mainFooter">
    <p>Copyright:2017 <a href="#" title="Biplob">$_SESSION['BITM']</a></p>
</footer>
</body>
</html>