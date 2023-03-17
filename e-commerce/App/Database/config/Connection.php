<?php

namespace App\Database\config ;

use PDO,PDOException ;

class Connection{
    private PDO $conn ;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=ecommerce_laravel';
        $user = 'root';
        $pass = '';
        try {
            $this -> conn = new PDO($dsn, $user, $pass);
        }
        catch(PDOException $e){
            echo 'failed '.$e->getMessage() ;
        }
        
    }
    
    public function getConn()
    {
        return $this->conn;
    }
}