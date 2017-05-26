<?php
session_start();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
require_once("../../src/Question_Details/Question_Details.php");
$question = new Question_Details();
if (!empty($_GET['q_id']))
    $_SESSION['q_id'] = $_GET['q_id'];
$value = $question->setData($_SESSION)->show();
$allData = $question->showAnswer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Answer of Question</title>
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
            <li><a href="../AskQuestion/askQuestion.php">Ask Questions</a></li>
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
                <h4><?php
                    echo '<b>Question: </b> ' . $value['question'];
                    ?></h4>
            </header>
            <content>
                <p>
                    <?php
                    if (!empty($allData))
                    {
                    ?>
                <table>
                    <?php
                    echo '<b>Last Reply: </b>' . $allData[0]['answer'] . ' (' . $allData[0]['email'] . ')' . '<br>';
                    /*$sl = 1;
                    foreach ($allData as $key => $value) {
                        echo '<b>Reply-' . $sl++ . ': </b>' . $value['answer'] . ' (' . $value['email'] . ')' . '<br>';
                    }*/
                    ?>
                </table>
                <?php
                }
                else {
                    echo '<p>No answer availabe for this question right now.</p>';
                }
                ?>
                <form action="answerStore.php" method="POST">
                        <textarea rows="10" cols="100" name="answer" autofocus>
</textarea>
                    <input type="submit" value="Submit Your Answer">
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