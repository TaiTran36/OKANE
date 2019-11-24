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

$list_ability = "SELECT intern_organization_request_abilities.organization_request_id, intern_organization_request_abilities.ability_id, intern_ability_dictionary.ability_name, intern_organization_request_abilities.ability_required, intern_organization_request_abilities.note 
FROM (intern_organization_request_abilities
INNER JOIN intern_ability_dictionary ON intern_ability_dictionary.id = intern_organization_request_abilities.ability_id) 
WHERE intern_organization_request_abilities.organization_request_id = $id";
$list_ability = $conn->getData($list_ability);
?>
<?php foreach ($list as $item) : ?>
<div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:350px">
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
            <p>Ngày đăng: <?php echo date_format(new DateTime($item['organ_request_date_submitted']),"d/m/Y"); ?></p>
            <p>Yêu cầu năng lực: </p>
            <ul class="list_ability">
                <?php foreach ($list_ability as $item_ability) : ?>
                <li class="w3-margin"><span class="w3-margin w3-green w3-padding"><?php echo $item_ability['ability_name'] ?></span> <span class="w3-margin w3-padding w3-khaki">Mức đạt: <?php echo $item_ability['ability_required']?></span> <span class="w3-margin w3-padding w3-pale-yellow"><?php echo $item_ability['note']?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="w3-left w3-padding des" style=""><?php echo $item['description'] ?></div>
    <a href="student.php?detail=registe&id=<?php echo $item['organ_request_id'] ?>" class="w3-btn w3-green w3-display-bottomright w3-margin btn_detail" >Đăng kí
    </a>
</div>
<?php endforeach; ?>
<script>
    var $item = $('.request').on('resize', function(){
        var height = $(this).height() +$('.des').height()+$('.list_ability').height() +20;
        $(this).height(height);
    }).trigger('resize');
</script>
