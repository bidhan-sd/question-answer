<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <li><a href="../Registration/create.php">Sign Up</a></li>
            <li class="active"><a href="login.php">Log In</a></li>
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
            </header>
            <content>
                <fieldset>
                    <legend>User Information</legend>
                    <form action="store.php" method="POST">
                        <input type="email" name="email" placeholder="Enter Valid email address"><br><br>
                        <input type="password" name="pwd" placeholder="Enter password"><br><br>
                        <input type="submit" name="btn" value="LogIn">
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