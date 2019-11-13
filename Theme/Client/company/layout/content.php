<?php
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();
$list_request = "SELECT intern_organization_requests.*, intern_organization_profile.*,  COUNT(intern_student_register.student_id) AS count_stu_res
                    FROM ((intern_organization_requests
                    INNER JOIN intern_organization_profile ON intern_organization_requests.organization_id = intern_organization_profile.id)
                    LEFT JOIN intern_student_register ON intern_organization_requests.id = intern_student_register.request_id)
                    WHERE intern_organization_requests.organization_id = $_SESSION[organ_id]
                    GROUP BY intern_organization_requests.id
                    ORDER BY intern_organization_requests.date_submitted DESC 
                    ";
$list = $conn->getData($list_request);
?>

<?php foreach ($list as $item) : ?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container" style="height:300px">
        <h3 class="w3-center">Phiếu tuyển dụng</h3>
        <div class="w3-padding">
            <div class="w3-third w3-padding">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item["logo"] ).'" class="w3-image w3-border w3-hover-shadow"
                       style="height: 150px;width: 100%;">';?>
                <div class="w3-center w3-margin-top">

                </div>
            </div>
            <div class="w3-twothird w3-padding">
                <p><?php echo $item['organization_name'] ?></p>
                <p>Tuyển vị trí: <?php echo $item['position'] ?></p>
                <p>Số lượng tuyển: <?php echo $item['amount'] ?></p>
                <p>Số lượng sinh viên đã đăng kí: <?php echo $item['count_stu_res'] ?> </p>
                <p>Ngày đăng: <?php echo $item['date_submitted'] ?></p>
            </div>
        </div>
        <div class=""></div>
        <button class="w3-btn w3-green w3-display-bottomright w3-margin btn_detail" >Xem chi tiết
        </button>
    </div>
<?php endforeach; ?>

<script>

</script>