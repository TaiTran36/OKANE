<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();

$assignment = "SELECT intern_organization_request_assignment.*, intern_students.*
                FROM (intern_organization_request_assignment
                INNER JOIN intern_students ON intern_organization_request_assignment.student_id = intern_students.id)   
                WHERE intern_organization_request_assignment.organization_request_id = $id ";
$result        = $conn->getData($assignment);
?>

<div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:400px">
    <h3 class="w3-center">DANH SÁCH PHÂN CÔNG</h3>
    <div class="w3-padding">
        <?php if ((array($result)['0'])->num_rows == 0):?>
            <h4 class="w3-display-middle w3-text-dark-grey">Chưa có sinh viên nào được phân công !</h4>
            <a href="teacher.php?detail=list_student_unassigned&id=<?php echo $id ?>" class="w3-btn w3-blue  w3-margin w3-round btn-approve" value="">Danh sách chưa phân công</a>
        <?php else:?>
            <a href="teacher.php?detail=list_student_register&id=<?php echo $id ?>" class="w3-btn w3-green  w3-margin w3-round btn-approve">Danh sách đăng kí</a>
            <a href="teacher.php?detail=list_student_unassigned&id=<?php echo $id ?>" class="w3-btn w3-blue  w3-margin w3-round btn-approve" value="">Danh sách chưa phân công</a>
            <table class="w3-table-all w3-hoverable">
                <thead>
                <tr class="w3-light-grey">
                    <th>MSV</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                </tr>
                </thead>
                <?php foreach ($result as $item):?>
                    <tr>
                        <td><?php echo $item['student_code']?></td>
                        <td><?php echo $item['full_name']?></td>
                        <td><?php echo $item['class_name']?></td>
                        <td><?php echo $item['gender']?></td>
                        <td><?php echo date_format(new DateTime($item['date_of_birth']),"d/m/Y");?></td>
                    </tr>
                <?php endforeach;?>
            </table>

        <?php endif;?>
    </div>
</div>