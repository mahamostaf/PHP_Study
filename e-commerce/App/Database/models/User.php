<?php

namespace App\Database\models;

use App\Database\config\Connection , PDO, App\Validation\Validation;

include './vendor/autoload.php';

class User extends Connection
{
    private $id, $fname, $lname, $phone, $email, $password, $gender, $status,
        $email_verified_at, $verification_code, $created_at, $updated_at;
        private PDO $conn ;
        function __construct()
    {
        $db_conn = new Connection();
        $this->conn = $db_conn->getConn();
    }

    function all() {
        $query = 'SELECT * FROM users' ;
        $res = $this -> conn -> prepare($query);
        $res -> execute();
        $res = $res -> fetchAll();
    }

    function addUser()
    {
        $query = 'INSERT INTO users (fname, lname, phone_number, email, `password`, gender, `status`, verification_code, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $res = $this -> conn -> prepare($query);
        $res -> bindParam(1, $this->fname);
        $res -> bindParam(2, $this->lname);
        $res -> bindParam(3, $this->phone);
        $res -> bindParam(4, $this->email);
        $res -> bindParam(5, $this->password);
        $res -> bindParam(6, $this->gender);
        $res -> bindParam(7, $this->status);
        $res -> bindParam(8, $this->verification_code);
        $res -> bindParam(9, $this->created_at);
        $res -> execute();
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fname
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set the value of fname
     *
     * @return  self
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get the value of lname
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    /**
     * Get the value of verification_code
     */
    public function getVerification_code()
    {
        return $this->verification_code;
    }

    /**
     * Set the value of verification_code
     *
     * @return  self
     */
    public function setVerification_code($verification_code)
    {
        $this->verification_code = $verification_code;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}

$db = new User();
$db->all();
