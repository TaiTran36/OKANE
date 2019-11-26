<?php
include '../Connection.php';
if(isset($_POST['add_student_assignment'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $student_id = $_POST['student_id'];
    $request_id = $_POST['request_id'];
    $date = $_POST['date'];

    $sql = "INSERT INTO intern_organization_request_assignment (organization_request_id, student_id, start_date,status)
                VALUES ('$request_id', '$student_id', STR_TO_DATE('$date', '%d-%m-%Y'), '1')";


    if ($connect->query($sql)) {
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}