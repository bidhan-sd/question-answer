<?php
require_once("../../src/AskQuestion/AskQuestion.php");
$addQuestion = new AskQuestion();
session_start();
if (empty($_POST['question']) || empty($_POST['title'])) {
    $_SESSION['message'] = "<h1>Question and title can't be empty!</h1>";
    header('location:askQuestion.php');
} else {
    $question = array('u_id' => $_SESSION['u_id'], 'question' => $_POST['question'], 'title' => $_POST['title']);
    $addQuestion->setData($question)->addQuestion();
}