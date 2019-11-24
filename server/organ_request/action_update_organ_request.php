<?php
include '../Connection.php';
if(isset($_POST['update_request'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $request_id = $_POST['request_id'];
    $postion = $_POST['postion'];
    $amount = $_POST['amount'];
    $salary = $_POST['salary'];



    $sql1 = "UPDATE intern_organization_requests SET organ_request_position='$postion', organ_request_amount='$amount', organ_request_salary='$salary' WHERE organ_request_id='$request_id'";

    if ($connect->query($sql1)) {
        echo 'success';
    } else {
        echo "Error: " . $sql1 . "<br>" . $connect->error;
    }

    $connect->close();
}