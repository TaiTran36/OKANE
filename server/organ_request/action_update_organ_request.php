<?php
include '../Connection.php';
if(isset($_POST['update_organ_request'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $id_p = $_POST['organ_request_id'];
    $position = $_POST['organ_request_position'];
    $amount = $_POST['organ_request_amount'];
    $salary = $_POST['organ_request_salary'];
    $status = $_POST['organ_request_status'];

    $abilityId = $_POST['ability_id'];
    $required = $_POST['ability_required'];
    $note = $_POST['note'];

    $sql1 = "UPDATE intern_organization_requests SET organ_request_position='$position', organ_request_amount='$amount', organ_request_salary='$salary', organ_request_status='$status' WHERE organ_request_id=$id_p";
    $sql2 = "UPDATE intern_organization_request_abilities SET ability_id='$abilityId', ability_required='$required', note='$note' WHERE organization_request_id=$id_p";
    if ($connect->query($sql1) === TRUE && $connect->query($sql2) === TRUE) {
        header('Location: ../../Theme/Client/company/company.php');
    } else {
        echo "Error: " . $sql1 . "<br>" . $connect->error;
    }

    $connect->close();
}