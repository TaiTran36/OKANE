<?php


class Connection
{
    private $servername = "localhost";
    private $database = "db_web";
    private $username = "root";
    private $password = "";
    private $connect;

    function Conn(){
        $this->connect= new mysqli($this->servername,$this->username,$this->password,$this->database);
        if($this->connect->connect_errno){
           die('Connect error'.$this->connect->connect_error);
        }
        return $this->connect;
    }

}