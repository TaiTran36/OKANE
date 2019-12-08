<style>
    .des{
        white-space: nowrap;
        word-wrap: break-word;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();
$list_request = "SELECT intern_organization_requests.*, intern_organization_profile.*,  COUNT(intern_student_register.student_id) AS count_stu_res
                    FROM ((intern_organization_requests
                    INNER JOIN intern_organization_profile ON intern_organization_requests.organization_id = intern_organization_profile.id)
                    LEFT JOIN intern_student_register ON intern_organization_requests.organ_request_id = intern_student_register.request_id)
                    WHERE intern_organization_requests.organ_request_status = '3000' OR intern_organization_requests.organ_request_status = '4000'
                    GROUP BY intern_organization_requests.organ_request_id
                    ORDER BY intern_organization_requests.organ_request_status ASC, intern_organization_requests.organ_request_date_submitted DESC
                    ";

$list = $conn->getData($list_request);

//$id= isset($_GET['organ_request_id']) ? $_GET['organ_request_id'] : "";

$id_student = $_SESSION['id_student'];

$list_register = "SELECT * FROM intern_student_register";
$register = $conn->getData($list_register);
?>
<?php foreach ($list as $item) : ?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container" style="height:350px">
        <h3 class="w3-center">PHIẾU TUYỂN DỤNG</h3>
        <div class="w3-padding" style="height: 180px">
            <div class="w3-third w3-padding">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item["logo"] ).'" class="w3-image w3-border w3-hover-shadow"
                   style="height: 150px;width: 100%;">';?>
            </div>
            <div class="w3-twothird w3-padding">
                <p><?php echo $item['organization_name'] ?></p>
                <p>Tuyển vị trí: <?php echo $item['organ_request_position'] ?></p>
                <p>Số lượng tuyển: <?php echo $item['organ_request_amount'] ?></p>
                <p>Số lượng sinh viên đã đăng kí: <?php echo $item['count_stu_res'] ?> </p>
                <p>Ngày đăng: <?php echo date_format(new DateTime($item['organ_request_date_submitted']),"d/m/Y"); ?></p>
            </div>

        </div>
        <?php if($item['organ_request_status'] == 3000 ):?>
            <div class="w3-display-topright w3-panel w3-green w3-margin w3-round w3-padding">
                Trong thời hạn
            </div>

            <?php foreach ($register as $regis) : ?>
                <?php if($item['organ_request_id'] == $regis['request_id'] && $regis['student_id'] == $id_student) :?>
                    <button  class="w3-btn w3-red w3-margin w3-display-topright btn_detail" style="margin-right: 150px!important">Đã đăng kí</button>
                <?php endif;?>
            <?php endforeach; ?>
        <?php else :?>
            <div class="w3-display-topright w3-panel w3-red w3-margin w3-round w3-padding">
                Hết hạn
            </div>

            <?php foreach ($register as $regis) : ?>
                <?php if($item['organ_request_id'] == $regis['request_id'] && $regis['student_id'] == $id_student) :?>
                    <button  class="w3-btn w3-red w3-margin w3-display-topright btn_detail" style="margin-right: 110px!important">Đã đăng kí</button>
                <?php endif;?>
            <?php endforeach; ?>
        <?php endif ?>
        <a href="student.php?detail=detail_request&id=<?php echo $item['organ_request_id'] ?>" class="w3-btn w3-green w3-display-bottomright w3-margin btn_detail w3-round" >Xem chi tiết
        </a>
        <div class="w3-left w3-padding des" style=""><?php echo $item['description'] ?></div>
    </div>
<?php endforeach; ?>
