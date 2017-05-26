<?php
session_start();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask Question</title>
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
            <li><a href="../Profile/profile.php">Profile</a></li>
            <li class="active"><a href="../AskQuestion/askQuestion.php">Ask Questions</a></li>
            <li><a href="../Questions/questions.php">My Questions</a></li>
            <li><a href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
</header>
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
                <h1>Have Any Question???</h1>
            </header>
            <content>
                <p>
                <form action="questionStore.php" method="POST">
                    <textarea rows="1" cols="50" name="title" placeholder="Question Title goes here" autofocus></textarea>
                    <textarea rows="6" cols="80" name="question" placeholder="Question Details goes here"></textarea>
                    <input type="submit" value="Ask Question">
                </form>
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