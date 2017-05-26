<?php
require_once("../../src/HomePage/Search.php");
session_start();
if (!isset($_SESSION['u_id'])) {
    header('location:../Login/login.php');
}
$oneSearch = new User();
if (isset($_POST['question'])) {
    $_SESSION['question'] = $_POST['question'];
} else if (empty($_SESSION['question'])) {
    $_SESSION['question'] = '';
}
$oneSearch->setData($_SESSION['question']);
$noOfItemsPerPage = 5;
$totalRows = $oneSearch->getNoOfRows();
$totalPage = ceil($totalRows / $noOfItemsPerPage);
if (!empty($_GET['page'])) {
    $currentPage = $_GET['page'] - 1;
} else
    $currentPage = 0;
$offset = $currentPage * $noOfItemsPerPage;
$allData = $oneSearch->search($noOfItemsPerPage, $offset);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Result</title>
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
            <li><a href="index.php">Home</a></li>
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
            </header>
            <content>
                <p>
                    <?php
                    if (!empty($allData))
                    {
                    ?>
                <h1>Search Results...</h1>
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
                if ($noOfItemsPerPage < $totalRows) {
                    for ($i = 1; $i <= $totalPage; $i++) {
                        ?>
                        <a href="search.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                        <?php
                    }
                }
                }
                else {
                    echo '<h1>No available search result!</h1>'; ?>
                    <img src="../../src/img/empty.jpg" height="350" width="600"><?php
                }
                ?>
                </p>
            </content>
        </article>
    </div>
</div>
<footer class="mainFooter">
    <p>Copyright:2017 <a href="#">$_SESSION['BITM']</a></p>
</footer>
</body>
</html>
