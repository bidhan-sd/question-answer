<?php
class LogIn
{
    public $email = '';
    public $password = '';

    public function setData($data = '')
    {
        if(array_key_exists('email',$data))
        {
            $this->email = $data['email'];
        }
        if(array_key_exists('pwd',$data))
        {
            $this->password = $data['pwd'];
        }
        return $this;
    }
    public function login()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM `user_reg` WHERE email='$this->email' AND password=$this->password");
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}