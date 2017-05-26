<?php

class AskQuestion
{
    public $u_id = '';
    public $title='Untitled';
    public $question = '';

    public function setData($data = '')
    {
        if (array_key_exists('u_id', $data)) {
            $this->u_id = $data['u_id'];
        }
        if (array_key_exists('question', $data)) {
            $this->question = $data['question'];
        }
        if (array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }
        return $this;
    }

    public function addQuestion()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('INSERT INTO `questions` (`q_id`,`u_id`,`Q_title`,`question`) VALUES(:q_id,:u_id,:title,:question)');
            $stmt->execute(array(
                ':q_id' => null,
                ':u_id' => $this->u_id,
                ':title' =>$this->title,
                ':question' => $this->question
            ));
            if ($stmt) {
                if ($stmt) {
                    session_start();
                    $_SESSION['message'] = "<h1>Question added successfully.</h1>";
                    header('location:../Questions/questions.php');
                }
            }
        } catch (PDOException $e) {
            session_start();
            $_SESSION['message'] = 'Sorry! Something went wrong. Please retry.';
            header('location:askQuestion.php');
        }

    }
}