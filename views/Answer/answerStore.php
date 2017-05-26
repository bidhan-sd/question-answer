<?php
require_once("../../src/Answer/ans.php");
$addAnswer = new Answer();
session_start();
if (empty($_POST['answer'])) {
    $_SESSION['message'] = "Answer can't be empty!";
    header('location:answer.php?');
} else {
    if (isset($_POST['q_id']))
        $_SESSION['q_id'] = $_POST['q_id'];
    $answer = array('q_id' => $_SESSION['q_id'], 'u_id' => $_SESSION['u_id'], 'answer' => $_POST['answer']);
    print_r($answer);
    $addAnswer->setData($answer)->addAnswer();
}