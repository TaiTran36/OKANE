<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();
$assignment = "SELECT intern_organization_request_assignment.*, intern_students.*
                FROM (intern_organization_request_assignment
                INNER JOIN intern_students ON intern_organization_request_assignment.student_id = intern_students.id)   
                WHERE intern_organization_request_assignment.organization_request_id = $id";
$assignment_result = $conn->getData($assignment);
?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:500px">
        <h2 class="w3-center">BẢNG PHÂN CÔNG</h2>
        <?php if ($assignment_result->num_rows == 0):?>
            <h4 class="w3-display-middle">Chưa có sinh viên nào được phân công :((</h4>
        <?php else:?>
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
                        <td><?php echo date_format(new DateTime($item['date_of_birth']),"d/m/Y");?></td>
                        <td><?php echo $item['class_name']?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif;?>
    </div>
<script type="text/javascript" src="public/detail_request_action_update_request.js"></script>