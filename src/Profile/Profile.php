<?php

class Profile
{
    public $fname = '';
    public $mname = '';
    public $lname = '';
    public $dob_day = '';
    public $dob_month = '';
    public $dob_year = '';
    public $gender = '';
    public $interest1 = '';
    public $interest2 = '';
    public $image = '';

    public function setData($data = '')
    {
        if (array_key_exists('fname', $data)) {
            $this->fname = $data['fname'];
        }
        if (array_key_exists('mname', $data)) {
            $this->mname = $data['mname'];
        }
        if (array_key_exists('lname', $data)) {
            $this->lname = $data['lname'];
        }
        if (array_key_exists('dob_day', $data)) {
            $this->dob_day = $data['dob_day'];
        }
        if (array_key_exists('dob_month', $data)) {
            $this->dob_month = $data['dob_month'];
        }
        if (array_key_exists('dob_year', $data)) {
            $this->dob_year = $data['dob_year'];
        }
        if (array_key_exists('gender', $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists('interest1', $data)) {
            $this->interest1 = $data['interest1'];
        }
        if (array_key_exists('interest2', $data)) {
            $this->interest2 = $data['interest2'];
        }
        if (array_key_exists('name', $data)) {
            $this->image = $data['name'];
        }
        return $this;
    }

    public function show()
    {
        session_start();
        $u_id = $_SESSION['u_id'];
        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM `profile` WHERE u_id=$u_id");
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function profile_update()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!empty($this->image))
            {
                $query = 'UPDATE `profile` SET fname=:fname,mname=:mname,lname=:lname,dob_day=:dob_day,dob_month=:dob_month,
dob_year=:dob_year,gender=:gender,interest1=:interest1,interest2=:interest2,photo=:image WHERE u_id=:u_id';
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':u_id' => $_SESSION['u_id'],
                    ':fname' => $this->fname,
                    ':mname' => $this->mname,
                    ':lname' => $this->lname,
                    ':dob_day' => $this->dob_day,
                    ':dob_month' => $this->dob_month,
                    ':dob_year' => $this->dob_year,
                    ':gender' => $this->gender,
                    ':interest1' => $this->interest1,
                    ':interest2' => $this->interest2,
                    ':image' => $this->image
                ));
                if ($stmt) {
                    session_start();
                    $_SESSION['message'] ="Profile updated successfully.";
                    header('location:profile.php');
                }
            }
            else
            {
                $query = 'UPDATE `profile` SET fname=:fname,mname=:mname,lname=:lname,dob_day=:dob_day,dob_month=:dob_month,
dob_year=:dob_year,gender=:gender,interest1=:interest1,interest2=:interest2 WHERE u_id=:u_id';
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':u_id' => $_SESSION['u_id'],
                    ':fname' => $this->fname,
                    ':mname' => $this->mname,
                    ':lname' => $this->lname,
                    ':dob_day' => $this->dob_day,
                    ':dob_month' => $this->dob_month,
                    ':dob_year' => $this->dob_year,
                    ':gender' => $this->gender,
                    ':interest1' => $this->interest1,
                    ':interest2' => $this->interest2
                ));
                if ($stmt) {
                    session_start();
                    $_SESSION['message'] ="Profile updated successfully.";
                    header('location:profile.php');
                }
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}