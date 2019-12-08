<?php
include '../Connection.php';
if(isset($_POST['approve_request_again'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $status = $_POST['status'];
    $request_id = $_POST['request_id'];

    $sql = "UPDATE intern_organization_requests SET organ_request_status='2000'
              WHERE organ_request_id='$request_id'";

    if ($connect->query($sql)) {
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}