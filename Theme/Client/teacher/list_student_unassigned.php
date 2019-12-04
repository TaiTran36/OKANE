<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();

$assignment_sql = "SELECT  intern_students.*
FROM intern_students
WHERE NOT EXISTS (
SELECT DISTINCT intern_organization_request_assignment.student_id
    FROM intern_organization_request_assignment
    WHERE intern_organization_request_assignment.student_id = intern_students.id)";
$assignment = $conn->getData($assignment_sql);

?>
<div class="w3-padding  w3-margin w3-round w3-card w3-display-container unassigned" style="height:400px">
    <h3 class="w3-center">DANH SÁCH SINH VIÊN CHƯA ĐƯỢC PHÂN CÔNG </h3>
    <div class="w3-padding">
        <input type="hidden" class="request_id" value="<?php echo $id; ?>">
        <?php
        $date=getdate(date("U"));
        $current_date = "$date[mday]-$date[mon]-$date[year]";
        ?>
        <input type="hidden" class="date" value="<?php echo $current_date; ?>">
        <table class="w3-table-all w3-hoverable">
            <thead>
            <tr class="w3-light-grey">
                <th>MSV</th>
                <th>Tên sinh viên</th>
                <th>Lớp</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Tác vụ</th>
            </tr>
            </thead>
            <?php if ($assignment->num_rows > 0):?>
                <?php foreach ($assignment as $s):?>
                    <tr>
                        <td><?php echo ($s['student_code']); ?></td>
                        <td><?php echo $s['full_name'] ?></td>
                        <td><?php echo $s['class_name'] ?></td>
                        <td><?php echo $s['gender'] ?></td>
                        <td><?php echo date_format(new DateTime($s['date_of_birth']), "d/m/Y"); ?></td>
                        <td>
                            <button class="w3-green w3-btn w3-round add_assignment" value="<?php echo $s['id'] ?>">Thêm</button>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <p>Không tìm thấy sinh viên :((</p>
            <?php endif; ?>
        </table>
    </div>
</div>
<script>
    var $item = $('.unassigned').on('resize', function(){
        var height = $(this).height() +$('table').height();
        $(this).height(height);
    }).trigger('resize');

    $('button.add_assignment').click(function (e) {
        e.preventDefault();
        var student_id = $(this).attr('value');
        var request_id = $('.request_id').val();
        var date = $('.date').val();
        var url = "../../../server/teacher_assignment/add_student_assignment.php";
        if(confirm("Bạn chắc chắn muốn thêm sinh viên vào bảng phân công.")){
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    add_student_assignment: 'add_student_assignment',
                    request_id: request_id,
                    student_id:student_id,
                    date: date
                },
                success: function (response) {
                    if (response == "success") {
                        window.location.href = "teacher.php?detail=assignment&id="+request_id;
                        alert("Thêm sinh viên thành công!");
                    }
                }
            });
        }
    })
</script>