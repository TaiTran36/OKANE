<?php
include '../Connection.php';
$conn = new Connection();
$connect = $conn->Conn();
$id_assignment = $_POST['id_assignment'];
$sql = "DELETE FROM intern_organization_request_assignment WHERE student_id ='$id_assignment'";
if ($connect->query($sql)) {
    echo 'success';
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
