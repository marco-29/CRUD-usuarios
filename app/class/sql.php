<?php
class sql{
    public $conn;

    public function __construct(){
        $user = "root";
        $pass = "";
        $serv = "localhost";
        $db = "agenda2023";

        $this->conn = new mysqli($serv, $user, $pass, $db);
    }

    public function select($sql){
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>