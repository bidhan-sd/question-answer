<?php

class Answer
{
    public $u_id = '';
    public $q_id = '';
    public $answer = '';

    public function setData($data = '')
    {
        if(array_key_exists('u_id',$data))
        {
            $this->u_id = $data['u_id'];
        }
        if(array_key_exists('q_id',$data))
        {
            $this->q_id = $data['q_id'];
        }
        if(array_key_exists('answer',$data))
        {
            $this->answer = $data['answer'];
        }
        return $this;
    }

   public function addAnswer()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('INSERT INTO `answers` (`ans_id`,`q_id`,`replier_id`,`answer`) VALUES(:ans_id,:q_id,:u_id,:answer)');
            $stmt->execute(array(
                ':ans_id' => null,
                ':q_id' => $this->q_id,
                ':u_id' => $this->u_id,
                ':answer' => $this->answer
            ));
            if ($stmt) {
                if($stmt)
                {
                    session_start();
                    $_SESSION['message']="Answer added successfully.";
                    header('location:answer.php?');
                }
            }
        }catch (PDOException $e) {
            session_start();
            $_SESSION['message']='Sorry! Something went wrong. Please retry.';
            header('location:answer.php');
        }

    }
}