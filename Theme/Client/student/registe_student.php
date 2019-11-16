<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();
$list_request = "SELECT intern_organization_requests.organ_request_id, intern_organization_profile.organization_name, intern_organization_requests.organ_request_position
FROM (intern_organization_requests 
INNER JOIN intern_organization_profile ON intern_organization_requests.organization_id = intern_organization_profile.id) 
WHERE intern_organization_requests.organ_request_id = $id ";
$list = $conn->getData($list_request);

?>
<?php foreach ($list as $item) : ?>
<div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:350px">
    <h3 class="w3-center">PHIẾU ĐĂNG KÍ ỨNG TUYỂN</h3>
    <div class="w3-padding">
        <h3 class="w3-center"><?php echo $item['organization_name'] ?></h3>
        <div class="w3-margin w3-padding">
            <h4 class="w3-margin-left">Vị trí tuyển dụng: <?php echo $item['organ_request_position'] ?></h4>
        </div>
        <div class="w3-margin w3-padding">
            <h4 class="w3-margin-left">Tên sinh viên: <?php echo $_SESSION['full_name'] ?></h4>
            <h4 class="w3-margin-left">Vị trí ứng tuyển: <?php echo $item['organ_request_position'] ?></h4>
        </div>

    </div>
    <form id="form_registe_request_stu" action="../../../server/regsite_student/action_regsite_request_student.php" method="POST">
        <?php
            $date=getdate(date("U"));
            $current_date = "$date[mday]-$date[mon]-$date[year]";
         ?>
        <input type="hidden" class="stu_id" name="stu_id" value="<?php echo $_SESSION['id_student'] ?>">
        <input type="hidden" class="organ_request_id" name="organ_request_id" value="<?php echo $id ?>">
        <input type="hidden" class="current_date" name="date" value="<?php echo $current_date ?>">
        <div class="w3-display-bottommiddle">
            <a  href="student.php" class="w3-btn w3-green w3-margin-bottom  btn_detail" >Trở về
            </a>
            <button  type="submit" class="w3-btn w3-green w3-margin-bottom btn_detail" name="regsite_request_student" >Đăng kí
            </button>
        </div>

    </form>

</div>
<?php endforeach;?>
<script>
    var $item = $('.request').on('resize', function(){
        var height = $(this).height() +$('.des').height()+$('.list_ability').height();
        $(this).height(height);
    }).trigger('resize');

    // $('#form_registe_request_stu').submit(function(e){
    //     e.preventDefault();
    //     var stu_id = $('.stu_id').val();
    //     var organ_request_id = $('.organ_request_id').val();
    //     var date = $('.current_date').val();
    //     var url = '../../server/regsite_student/action_regsite_request_student.php';
    //     $.ajax({
    //         url : url,
    //         type:'POST',
    //         data:{
    //             regsite_request_student:'regsite_request_student',
    //             stu_id:stu_id,
    //             organ_request_id: organ_request_id,
    //             date: date
    //         },
    //         success: function(response) {
    //             if(response=="success")
    //             {
    //                 window.location.href = red;
    //             }
    //         }
    //     });
    // });
</script>