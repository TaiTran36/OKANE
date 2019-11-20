<?php
include '../Connection.php';
if(isset($_POST['add_ability'])) {
    $conn = new Connection();
    $connect = $conn->Conn();

    $request_id = $_POST['request_id'];
    $ability_id = $_POST['ability_id'];
    $ability_required = $_POST['ability_required'];
    $ability_note = $_POST['ability_note'];

    $sql = "INSERT INTO intern_organization_request_abilities (organization_request_id, ability_id, ability_required,note)
                VALUES ('$request_id', '$ability_id', '$ability_required', '$ability_note')";

    if ($connect->query($sql)) {
        echo 'success';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
}