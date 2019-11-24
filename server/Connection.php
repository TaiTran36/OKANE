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
        mysqli_query($this->connect, "Set names 'utf8'");
        if($this->connect->connect_errno){
            die('Connect error'.$this->connect->connect_error);
        }
        return $this->connect;
    }
    //lay ra list cac ban ghi tu db
    function getData($sql){
        $conn = $this->Conn();
        $result = mysqli_query($conn, $sql);
        $array = [];
        while (true) {
            $row = mysqli_fetch_assoc($result);
            if ($row == null) {
                break;
            }
            $array[] = $row;
        }

        return $result;
    }
    //lay 1 ban ghi duy nhat
    function getOneData($sql){
        $conn = $this->Conn();
        $resultSet = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($resultSet);
    }
    //dump die
    function dd($data = ''){
        echo "<pre>";
        var_dump($data);
        die();
    }
}