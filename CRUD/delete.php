<?php

require 'C:\xampp\htdocs\nti\CRUD\dbhelper.php';

$dbhelper = new DBHelper();
$result = $dbhelper -> deleteCustomer($_GET['deletedId']) ;

if($result){
    header("location:display.php");
}

?>