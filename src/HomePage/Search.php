<?php

class User
{
    public $question = '';
    public function setData($data = '')
    {
        $this->question = $data;
        return $this;
    }

    public function search($noOfItems, $offset)
    {
        if ($this->question=='')
        {
            return '';
        }
        else
        {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $stmt = $pdo->prepare("SELECT * FROM `questions` WHERE question LIKE '%$this->question%' Limit $noOfItems OFFSET $offset");
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }
    }
    public function getNoOfRows()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM `questions` WHERE question LIKE '%$this->question%'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = count($stmt->fetchAll());
        return $data;
    }
}