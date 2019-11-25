<?php
include '../Connection.php';
if(isset($_POST['update_status'])) {
    $conn = new Connection();
    $connect = $conn->Conn();
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];
    $sql = "UPDATE intern_organization_requests SET organ_request_status = '$status' WHERE organ_request_id='$request_id'";

    if ($connect->query($sql)) {
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}