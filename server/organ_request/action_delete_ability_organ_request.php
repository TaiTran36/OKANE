<?php
include '../Connection.php';
if(isset($_POST['delete_ability'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $id_ability = $_POST['id_ability'];
    $sql = "DELETE FROM intern_organization_request_abilities WHERE id ='$id_ability'";

    if ($connect->query($sql)) {
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}