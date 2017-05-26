<?php
require_once("../../src/Question_Details/Question_Details.php");
$obj = new Question_Details();
$value = $obj->setData($_GET)->show();
session_start();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
$allData = $obj->setData($_GET)->showAnswer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deatailed view</title>
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
            <li><a href="../Logout/logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="maincontent">
    <div class="content">
        <article class="topcontent">
            <header>
                <h1><a href="../HomePage/search.php">Back To Your Search Page</a></h1>
                <p><b><?php echo '<b>Question: </b>' . $value['question'] ?></b></p>
            </header>
            <content>
                <p>
                    <?php
                    if (!empty($allData))
                    {
                    ?>
                <table>
                    <?php
                    $sl = 1;
                    foreach ($allData as $key => $value) {
                    echo '<b>Reply-' . $sl++ . ': </b>' . $value['answer'] . ' (' . $value['email'] . ')' . '<br>';
                    }
                    ?>
                </table>
                <?php
                }
                else {
                echo '<p>No answer availabe for this question right now.</p>';
                }
                ?>
                <a href="../Answer/answer.php?q_id=<?php echo $_GET['q_id'] ?>">Answer this Question</a>
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