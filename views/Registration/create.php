<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        label.error{
            color: red
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
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
            <li><a href="../../index.php">Home</a></li>
            <li class="active"><a href="create.php">Sign Up</a></li>
            <li><a href="../Login/login.php">Log In</a></li>
        </ul>
    </nav>
</header>
</header>
<div class="maincontent">
    <div class="content">
        <article class="topcontent">
            <header>
                <?php
                session_start();
                if (isset($_SESSION['message']))
                {
                    echo "<h1>".$_SESSION['message']."</h1>";
                    unset($_SESSION['message']);
                }
                ?>
                <h1>Sign up for new account</h1>
            </header>
            <content>
                <fieldset>
                    <legend>User Information</legend>
                    <form id="signupForm" action="store.php" method="POST">
                        <input type="email" name="email" id="email" placeholder="Enter Valid email address"><br><br>
                        <input type="password" name="pwd" id="pwd" placeholder="Enter Password"><br><br>
                        <input type="password" name="rpwd" id="rped" placeholder="Re-type password"><br><br>
                        <input type="submit" name="btn" value="Sign Up">
                    </form>
                </fieldset>
            </content>
        </article>
    </div>
</div>
<footer class="mainFooter">
    <p>Copyright:2017 <a href="#" title="Biplob">$_SESSION['BITM']</a></p>
</footer>
<script>
    $(document).ready(function(){
        $("#signupForm").validate({
            rules: {

                email: {
                    required: true,
                    email: true
                },

                pwd: {
                    required: true,
                    minlength: 6
                },
                rpwd: {
                    required: true,
                    minlength: 6,
                    equalTo: "#pwd"
                }
            },
            messages: {

                email: "Please enter a valid email address",

                pwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                rpwd: {
                    required: "Please provide a password",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
    });
</script>

</body>
</html>