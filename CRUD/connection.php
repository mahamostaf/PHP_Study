<?php

class Connection{
    public $db_conn = null;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=crudoperations';
        $user = 'root';
        $pass = '';
        try {
            $this -> db_conn = new PDO($dsn, $user, $pass);
        }
        catch(PDOException $e){
            echo 'failed '.$e->getMessage() ;
        }
        
    }
}