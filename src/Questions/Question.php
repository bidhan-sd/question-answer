<?php

class Queston
{
    public function index($noOfItems, $offset)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM `questions` ORDER BY q_id DESC Limit $noOfItems OFFSET $offset";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function getNoOfRows()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM `questions` ORDER BY q_id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = count($stmt->fetchAll());
        return $data;
    }
}