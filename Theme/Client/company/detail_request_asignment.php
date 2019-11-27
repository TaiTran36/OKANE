<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();
$assignment = "SELECT student_code,full_name,date_of_birth,class_name FROM intern_students,intern_organization_request_assignment,intern_organization_requests
                WHERE intern_students.id = intern_organization_request_assignment.student_id
                AND intern_organization_requests.organ_request_id = $id";
$assignment_result = $conn->getData($assignment);
?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:500px">
        <h2 class="w3-center">BẢNG PHÂN CÔNG</h2>
        <div class="w3-container">
            <table class="w3-table-all w3-hoverable w3-large">
                <thead>
                <tr class="w3-light-grey">
                    <th>MSV</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                </tr>
                </thead>
                <?php foreach ($assignment_result as $item) : ?>
                <tr>
                    <td><?php echo $item['student_code']?></td>
                    <td><?php echo $item['full_name']?></td>
                    <td><?php echo $item['date_of_birth']?></td>
                    <td><?php echo $item['class_name']?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<script type="text/javascript" src="public/detail_request_action_update_request.js"></script>