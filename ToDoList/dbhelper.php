<?php
include 'C:\xampp\htdocs\nti\ToDoList\connection.php' ;

class DBHelper{

    public $conn = null ;

    function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->db_conn ;
    }

    function addTask($task)
    {
        $query = 'INSERT INTO tasks (task,role_id) VALUES (?,1) ';
        $out=$this->conn->prepare($query);
        $out-> bindParam( 1, $task);
        $out -> execute();
    }

    function allTasks()
    {
        $query = 'SELECT * FROM tasks';
        $out=$this->conn->prepare($query);
        $out -> execute();
        $data = $out->fetchAll();
        return $data ;
    }

    function clearAll()
    {
        $query = 'DELETE FROM tasks';
        $out=$this->conn->prepare($query);
        $out -> execute();
    }

    function removeTask($id)
    {
        $query = 'DELETE FROM tasks WHERE id = ?';
        $out=$this->conn->prepare($query);
        $out-> bindParam( 1, $id);
        $out -> execute();
    }

    function editTask($id,$task)
    {
        $query = 'UPDATE tasks SET task = ? WHERE id = ?';
        $out=$this->conn->prepare($query);
        $out-> bindParam( 1, $task);
        $out-> bindParam( 2, $id);
        $out -> execute();
    }

    function setFinished($id)
    {
        $query = 'UPDATE tasks SET role_id = ? WHERE id = ?';
        $out=$this->conn->prepare($query);
        $out-> bindParam( 1, 2);
        $out-> bindParam( 2, $id);
        $out -> execute(); 
    }

}