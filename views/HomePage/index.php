<?php
require_once("../../src/Questions/Question.php");
session_start();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
$obj = new Queston();
$noOfItemsPerPage = 7;
$totalRows = $obj->getNoOfRows();
$totalPage = ceil($totalRows / $noOfItemsPerPage);
if (!empty($_GET['page'])) {
    $currentPage = $_GET['page'] - 1;
} else
    $currentPage = 0;
$offset = $currentPage * $noOfItemsPerPage;
$allData = $obj->index($noOfItemsPerPage, $offset);
$allData = $obj->index($noOfItemsPerPage, $offset);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User HomePage</title>
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="../Profile/profile.php">Profile</a></li>
            <li><a href="../AskQuestion/askQuestion.php">Ask Questions</a></li>
            <li><a href="../Questions/questions.php">My Questions</a></li>
            <li><a href="../Logout/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <div class="maincontent">
        <div class="content">
            <article class="topcontent">
                <header>
                    <h2><?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?></h2>
                    <h1>Search What You Need</h1>
                </header>
                <content>
                    <p>
                    <form action="search.php" method="POST">
                        <textarea rows="1" cols="50" maxlength="200" name="question">
</textarea>
                        <input type="submit" name="btn" value="Search For Question">
                    </form>
                    <h1>List of All Questions</h1>
                    <?php
                    if (!empty($allData)) {
                        ?>
                        <table width="90%" style="border:1px dotted black;">
                            <?php
                            $sl = $offset + 1;
                            foreach ($allData as $key => $value) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="section">
                                            <b><a href="../Question_Details/showQuestion.php?q_id=<?php echo $value['q_id'] ?>"><?php echo $sl++ . '. ' . $value['Q_title'] ?></a></b>
                                            </br><?php
                                            $question = $value['question'];
                                            if (strlen($question) > 160)
                                                $question = substr($question, 0, 160) . '<b>...</b>';
                                            echo 'Q. ' . $question;
                                            ?>
                                            <a class="more"
                                               href="../Question_Details/showQuestion.php?q_id=<?php echo $value['q_id'] ?>">Read
                                                More</a></p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php
                    }
                    if ($noOfItemsPerPage < $totalRows) {
                        for ($i = 1; $i <= $totalPage; $i++) {
                            ?>
                            <a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                            <?php
                        }
                    }
                    ?>
                </content>
            </article>
        </div>
    </div>
    <footer class="mainFooter">
        <p>Copyright:2017 <a href="#" title="Biplob">$_SESSION['BITM']</a></p>
    </footer>
</body>
</html>