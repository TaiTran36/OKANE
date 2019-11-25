<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();
$list_request = "SELECT intern_organization_requests.*, intern_organization_profile.*, COUNT(intern_student_register.student_id) AS count_stu_res
FROM ((intern_organization_requests 
INNER JOIN intern_organization_profile ON intern_organization_requests.organization_id = intern_organization_profile.id) 
LEFT JOIN intern_student_register ON intern_organization_requests.organ_request_id = intern_student_register.request_id) 
WHERE intern_organization_requests.organ_request_id = $id ";
$list = $conn->getData($list_request);
$count_stu_ass_query= "SELECT  COUNT(intern_organization_request_assignment.student_id) AS count_stu_ass
FROM intern_organization_request_assignment
WHERE intern_organization_request_assignment.organization_request_id = $id";
$count_stu_ass = $conn->getOneData($count_stu_ass_query);
$list_ability = "SELECT intern_organization_request_abilities.organization_request_id, intern_organization_request_abilities.ability_id, intern_ability_dictionary.ability_name, intern_organization_request_abilities.ability_required, intern_organization_request_abilities.note 
FROM (intern_organization_request_abilities
INNER JOIN intern_ability_dictionary ON intern_ability_dictionary.id = intern_organization_request_abilities.ability_id) 
WHERE intern_organization_request_abilities.organization_request_id = $id";
$list_ability = $conn->getData($list_ability);
?>
<?php foreach ($list as $item) : ?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:400px">
        <h3 class="w3-center">PHIẾU TUYỂN DỤNG</h3>
        <div class="w3-padding">
            <div class="w3-third w3-padding">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item["logo"] ).'" class="w3-image w3-border w3-hover-shadow"
                       style="height: 200px;width: 100%;">';?>
            </div>
            <div class="w3-twothird w3-padding">

                <p><?php echo $item['organization_name'] ?></p>
                <p>Tuyển vị trí: <?php echo $item['organ_request_position'] ?></p>
                <p>Số lượng tuyển: <?php echo $item['organ_request_amount'] ?></p>
                <p>Số lượng sinh viên đã đăng kí: <?php echo $item['count_stu_res'] ?> </p>
                <p>Số sinh viên được phân công: <?php echo $count_stu_ass['count_stu_ass'] ?></p>
                <p>Trạng thái: <?php
                    if ($item['organ_request_status'] == 2000) {
                        echo  "Chờ phê duyệt";
                    }elseif($item['organ_request_status'] == 3000){
                        echo "Chờ sinh viên đăng ký";
                    }elseif ($item['organ_request_status'] == 3000){
                        echo "Ngừng nhận đăng ký";
                    }else{
                        echo "Không được phê duyệt";
                    }
                    ?> </p>
                <p>Ngày đăng: <?php echo date_format(new DateTime($item['organ_request_date_submitted']),"d/m/Y"); ?></p>
                <p>Yêu cầu năng lực: </p>
                <ul class="list_ability">
                    <?php foreach ($list_ability as $item_ability) : ?>
                        <li class="w3-margin-top w3-margin-bottom abilities" data-id="<?php echo $item_ability['id']?>" >
                            <div class='w3-col' style='width:40%'><span class="w3-margin-right w3-green w3-padding"><?php echo $item_ability['ability_name'] ?></span></div>
                            <div class='w3-col' style='width:25%'><span class="w3-margin-right w3-padding w3-khaki">Mức đạt: <?php echo $item_ability['ability_required']?></span></div>
                            <div class='w3-col' style='width:35%'><span class="w3-margin-right w3-padding w3-pale-yellow"><?php echo $item_ability['note']?></span></div>
                        </li>
                        <br>
                        <br>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="w3-left w3-padding des" style=""><?php echo $item['description'] ?></div>
        <?php if($item['organ_request_status'] == 2000): ?>
            <a href="javascript:void(0)" class="w3-btn w3-blue w3-display-bottommiddle w3-margin w3-round btn-approve" value="<?php  echo $item['organ_request_id'] ?>">Duyệt
        <?php endif; ?>
            <a href="teacher.php?detail=&id=<?php echo $item['organ_request_id'] ?>" class="w3-btn w3-green w3-display-topright w3-margin btn_detail w3-round"" >Bảng phân công
            </a>
    </div>
<?php endforeach; ?>
<script>
    var $item = $('.request').on('resize', function(){
        var height = $(this).height() +$('.des').height()+$('.list_ability').height() +20;
        $(this).height(height);
    }).trigger('resize');
    $('.btn-approve').click(function (e) {
        e.preventDefault();
        var url = '../../../server/teacher_assignment/approve_request.php';
        var request_id = $(this).attr('value');
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                approve_request: 'approve_request',
                status: '3000',
                request_id:request_id
            },
            success: function (response) {
                if (response == "success") {
                    window.location.href = "teacher.php";
                    alert("Xét duyệt phiếu tuyển dụng thành công!");
                }
            }
        });
    })
</script>
