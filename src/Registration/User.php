<?php

class User
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
    public function signup()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('INSERT INTO `user_reg` (`u_id`,`email`,`password`) VALUES(:id,:email,:password)');
            $stmt->execute(array(
                ':id' => null,
                ':email' => $this->email,
                ':password' => $this->password
            ));
            $id=$pdo->lastInsertId();
            if ($stmt) {
                try {
                    $stmt1 = $pdo->prepare('INSERT INTO `profile` (`u_id`) VALUES(:id)');
                    $stmt1->execute(array(
                        ':id' => $pdo->lastInsertId()
                    ));
                    session_start();
                    $_SESSION['u_id']=$pdo->lastInsertId();
                    if($stmt1)
                    {
                        return $id;
                    }
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();

                }
            }
        }catch (PDOException $e) {
            session_start();
            $_SESSION['message']='Sorry! Something went wrong. Please retry.';
            header('location:create.php');
        }

    }
}