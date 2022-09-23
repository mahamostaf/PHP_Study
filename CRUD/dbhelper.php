<?php

require 'C:\xampp\htdocs\nti\CRUD\connection.php' ;

Class DBHelper{

    public $conn ;

    function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this -> conn -> db_conn ;
    }

    function addCustomer($name, $email, $phone, $pass){
        $query  = 'INSERT INTO crud (name,email,phone,password) VALUES (?, ?, ?, ?)';
        $result = $this -> conn -> prepare($query);
        $result -> bindParam(1, $name) ;
        $result -> bindParam(2, $email);
        $result -> bindParam(3, $phone);
        $result -> bindParam(4, $pass) ;
        $result = $result -> execute();
        return $result; 
    }

    function allUsers(){
        $query = 'SELECT * FROM crud';
        $result = $this -> conn -> prepare($query);
        $result -> execute();
        $result = $result -> fetchAll();
        return $result ;
    }

    function deleteCustomer($id){
        $query  = 'DELETE FROM crud WHERE id = (?)';
        $result = $this -> conn -> prepare($query);
        $result -> bindParam(1, $id) ;
        $result = $result -> execute();
        return $result; 
    }

    function updateCustomer($id, $name, $email, $phone, $pass){
        $query  = 'UPDATE crud SET name=(?), email=(?), phone=(?), password=(?) WHERE id=(?)';
        $result = $this -> conn -> prepare($query);
        $result -> bindParam(1, $name) ;
        $result -> bindParam(2, $email);
        $result -> bindParam(3, $phone);
        $result -> bindParam(4, $pass) ;
        $result -> bindParam(5, $id) ;
        $result = $result -> execute();
        return $result; 
    }

    function selectById($id){
        $query  = 'SELECT * FROM crud WHERE id = (?)';
        $result = $this -> conn -> prepare($query);
        $result -> bindParam(1, $id) ;
        $result -> execute();
        $result = $result -> fetch();
        return $result ; 
    }

}