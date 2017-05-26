<?php
require_once("../../src/Profile/Profile.php");
$profileUpdate = new Profile();
$value = $profileUpdate->show();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
if (empty($value['gender'])) {
    $value['gender'] = 'Male';
}
if (empty($value['dob_year'])) {
    $value['dob_year'] = 2000;
}
if (empty($value['dob_month'])) {
    $value['dob_month'] = 'January';
}
if (empty($value['dob_day'])) {
    $value['dob_day'] = 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Update</title>
    <link rel="stylesheet" href="../../src/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<h1></h1>
</header>
<div class="maincontent">
    <div class="content">
        <article class="topcontent">
            <header>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </header>
            <content>
                <fieldset>
                    <legend><b>Profile Update</b></legend>
                    <form id="myform" action="update.php" method="POST" enctype="multipart/form-data">
                        Frist name: <input type="text" name="fname" id="fname"
                                           value="<?php echo $value['fname'] ?>">
                        Middle name:<input type="text" name="mname" id="mname"
                                           value="<?php echo $value['mname'] ?>">
                        Last name:<input type="text" name="lname" id="lname"
                                         value="<?php echo $value['lname'] ?>"><br><br>
                        <b>Gender:</b>
                        <input type="radio" name="gender" value="Male" <?php if ($value['gender'] == 'Male') {
                            echo 'checked';
                        } ?>> Male
                        <input type="radio" name="gender" value="Female" <?php if ($value['gender'] == 'Female') {
                            echo 'checked';
                        } ?>> Female<br><br>
                        <b>Date of Birth:</b> <br>
                        <select id="dob_month" name="dob_month">
                            <option value="<?php echo $value['dob_month'] ?>"
                                    selected><?php echo $value['dob_month'] ?></option>
                            <?php
                            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September",
                                "October", "November", "December");
                            foreach ($months as $oneMonth) {
                                if ($oneMonth != $value['dob_month']) {
                                    ?>
                                    <option value="<?php echo $oneMonth ?>"><?php echo $oneMonth ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <select id="dob_day" name="dob_day">
                            <option value="<?php echo $value['dob_day'] ?>"
                                    selected><?php echo $value['dob_day'] ?></option>
                            <?php
                            $day = 1;
                            while ($day <= 31) {
                                if ($day != $value['dob_day']) {
                                    ?>
                                    <option value="<?php echo $day ?>"><?php echo $day ?></option>
                                    <?php
                                }
                                $day++;
                            }
                            ?>
                        </select>
                        <select id="dob_year" name="dob_year">
                            <option value="<?php echo $value['dob_year'] ?>"
                                    selected><?php echo $value['dob_year'] ?></option>
                            <?php
                            $year = 1970;
                            while ($year <= 2010) {
                                if ($year != $value['dob_year']) {
                                    ?>
                                    <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                    <?php
                                }
                                $year++;
                            }
                            ?>
                        </select><br><br>
                        <b>Hobby :</b><br>
                        <input type="text" name="interest1" id="interest1" value="<?php echo $value['interest1'] ?>">
                        <input type="text" name="interest2" id="interest2"
                               value="<?php echo $value['interest2'] ?>"><br><br>
                        <b>Photo:</b>
                        <input type="file" name="image" id="image"><br><br>
                        <input type="submit" name="btn" value="Update Profile">
                    </form>
                </fieldset>
            </content>
        </article>
    </div>
</div>
<footer class="mainFooter">
    <p>Copyright:2017 <a href="#" title="Biplob">$_SESSION['BITM']</a></p>
</footer>
</body>
</html>