<?php
include '../Connection.php';
if(isset($_POST['create_request'])) {
    $conn = new Connection();
    $connect = $conn->Conn();
    $organization_id = $_POST['organization_id'];
    $organ_request_position =  $_POST['organ_request_position'];
    $organ_request_amount = $_POST['organ_request_amount'];
    $organ_request_salary = $_POST['organ_request_salary'];
    $organ_request_date_submitted = $_POST['organ_request_date_submitted'];
    $organ_request_status = $_POST['organ_request_status'];
    $abilities = $_POST['abilities'];



    //insert request
    $sql_request = "INSERT INTO intern_organization_requests (organization_id, organ_request_position, organ_request_amount,organ_request_salary,organ_request_date_submitted,organ_request_status)
                VALUES ('$organization_id', '$organ_request_position', '$organ_request_amount', '$organ_request_salary',STR_TO_DATE('$organ_request_date_submitted', '%d-%m-%Y'),'$organ_request_status')";
    $request_id = null;
    $result = "";
    if ($connect->query($sql_request)) {
        if(strlen($abilities) != 0){
            $sql1 = $connect->query("SELECT intern_organization_requests.organ_request_id
                FROM intern_organization_requests
                WHERE organization_id = '$organization_id'
                ORDER BY organ_request_id DESC
                LIMIT 1");
            if (mysqli_num_rows($sql1) > 0) {
                while($row = mysqli_fetch_assoc($sql1)) {
                    $request_id = $row['organ_request_id'];
                }
                $abilities = explode(',', $abilities);
                $abilities = array_chunk($abilities,4);
                $i=0;
                while($i< count($abilities)){
                    array_splice($abilities[$i], 0, 1);
                    $sql = "";
                    $val1 = $request_id;
                    $val2 = $abilities[$i][0];
                    $val3 = $abilities[$i][1];
                    $val4 = $abilities[$i][2];
                    $sql .= "INSERT INTO intern_organization_request_abilities (organization_request_id, ability_id, ability_required,note)VALUES ('$val1','$val2','$val3','$val4');";
                    $i++;
                    if($connect->multi_query($sql)){
                        $result = "success";
                    }
                }
            }
        }
        header('Location: ../../Theme/Client/company/company.php',  true,  301);
    } else {
        echo "Error: " . $sql_request . "<br>" . $connect->error;
    }
    exit();
}
?>