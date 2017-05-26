<?php

class Question_Details
{
    public $q_id = '';

    public function setData($data = '')
    {
        if (array_key_exists('q_id', $data)) {
            $this->q_id = $data['q_id'];
        }
        return $this;
    }

    public function show()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM `questions` WHERE q_id=$this->q_id");
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function showAnswer()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $query = "SELECT answers.ans_id,answers.answer,user_reg.email FROM `answers` JOIN user_reg 
WHERE answers.q_id=$this->q_id AND answers.replier_id=user_reg.u_id ORDER BY answers.ans_id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
}