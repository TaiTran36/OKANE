<?php
include '../Connection.php';

if(isset($_POST['regsite_request_student'])){
    $conn = new Connection();
    $connect = $conn->Conn();

    $student_id = addslashes($_POST['stu_id']);
    $organ_request_id = addslashes($_POST['organ_request_id']);
    $date  = $_POST['date'];

    $sql = "INSERT INTO intern_student_register (student_id, request_id, submit_date)
            VALUES ($student_id, $organ_request_id, STR_TO_DATE('$date', '%d-%m-%Y'))";
    if ($connect->query($sql) === TRUE) {
        header('Location: ../../Theme/Client/student/student.php');
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}