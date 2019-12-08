<?php
include '../Connection.php';
if(isset($_POST['add'])) {
    $conn = new Connection();
    $connect = $conn->Conn();
    $ability_name = $_POST['ability_name'];
    $ability_type = $_POST['ability_type'];
    $ability_note = $_POST['ability_note'];

    $sql = "INSERT INTO intern_ability_dictionary (ability_name, ability_type, ability_note)
                VALUES ('$ability_name', '$ability_type', '$ability_note')";

    if ($connect->query($sql)) {
        header('Location: ../../Theme/Client/teacher/teacher.php?detail=list_ability');
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}