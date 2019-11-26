<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();

$student_register_sql = $connect->query("SELECT intern_students.*
FROM (intern_student_register
INNER JOIN intern_students ON intern_student_register.student_id = intern_students.id)
WHERE intern_student_register.request_id = '$id'");

$assignment_sql = $connect->query("SELECT DISTINCT intern_students.id
FROM (intern_organization_request_assignment
INNER JOIN intern_students ON intern_organization_request_assignment.student_id = intern_students.id) ");
?>
<?php
    $student_register = array();
if (mysqli_num_rows($student_register_sql) > 0) {
    while ($row = mysqli_fetch_assoc($student_register_sql)) {
        array_push($student_register,$row);
    }
}

$assignment = array();
if (mysqli_num_rows($assignment_sql) > 0) {
    while ($row = mysqli_fetch_assoc($assignment_sql)) {
        array_push($assignment,$row['id']);
    }
}
$student_assignment = array();
foreach ($student_register as $s){
    if(!in_array($s['id'],$assignment)){
        array_push($student_assignment,$s);
    }
}
?>
<div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:400px">
    <h3 class="w3-center">DANH SÁCH SINH VIÊN ĐĂNG KÍ </h3>
    <h4 class="w3-center">(Chưa được phân công)</h4>
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
            <?php if (count($student_assignment) > 0):?>
                <?php foreach ($student_assignment as $s):?>
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