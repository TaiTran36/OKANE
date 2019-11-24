<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();

$ability = "SELECT intern_organization_request_abilities.id, intern_organization_request_abilities.organization_request_id, intern_organization_request_abilities.ability_id, intern_ability_dictionary.ability_name, intern_organization_request_abilities.ability_required, intern_organization_request_abilities.note 
            FROM (intern_organization_request_abilities
            INNER JOIN intern_ability_dictionary ON intern_ability_dictionary.id = intern_organization_request_abilities.ability_id) 
            WHERE intern_organization_request_abilities.organization_request_id = $id";
$ability_result = $conn->getData($ability);

$abilities = "SELECT * FROM intern_ability_dictionary";
$abilities = $conn->getData($abilities);

$organ_request = "SELECT intern_organization_requests.*, intern_organization_profile.*, COUNT(intern_student_register.student_id) AS count_stu_res
                FROM ((intern_organization_requests 
                INNER JOIN intern_organization_profile ON intern_organization_requests.organization_id = intern_organization_profile.id) 
                LEFT JOIN intern_student_register ON intern_organization_requests.organ_request_id = intern_student_register.request_id) 
                WHERE intern_organization_requests.organ_request_id = $id ";
$result        = $conn->getData($organ_request);
?>

<?php foreach ($result as $item) : ?>
    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:500px">
        <h2 class="w3-center">PHIẾU TUYỂN DỤNG</h2>
        <div class="w3-padding">
            <div class="w3-third w3-padding">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($item["logo"]) . '" class="w3-image w3-border w3-hover-shadow"
                       style="height: 200px;width: 100%;">'; ?>
            </div>
            <form id="form_update_organ_request">
                <div class="w3-twothird w3-padding">
                    <input type="hidden" class="organ_request_id" value="<?php echo $id ?>">
                    <p class="w3-xlarge"><b><?php echo $item['organization_name'] ?></b></p>
                    <label>Tuyển vị trí: </label>
                    <input class="w3-input organ_request_position" type="text" name="organ_request_position" value="<?php echo $item['organ_request_position'] ?>"><br/>
                    <label>Số lượng tuyển: </label>
                    <input class="w3-input organ_request_amount" type="number" name="organ_request_amount" value="<?php echo $item['organ_request_amount'] ?>"><br/>
                    <label>Mức lương: </label>
                    <input class="w3-input organ_request_salary" type="text" name="organ_request_salary" value="<?php echo $item['organ_request_salary'] ?>"><br/>
                    <label>Yêu cầu năng lực: </label>
                    <ul class="list_ability">
                        <?php
                        if(isset($ability_result))
                            foreach ($ability_result as $item_ability) : ?>
                                <li class="w3-margin abilities" data-id="<?php echo $item_ability['id']?>">
                                    <span class="w3-margin w3-green w3-padding"><?php echo $item_ability['ability_name'] ?></span>
                                    <span class="w3-margin w3-padding w3-khaki">Mức đạt: <?php echo $item_ability['ability_required']?></span>
                                    <span class="w3-margin w3-padding w3-pale-yellow"><?php echo $item_ability['note']?></span>
                                    <span class="w3-margin w3-padding w3-round-large w3-hover-shadow w3-red  delete"><a
                                                href="javascript:void(0)" class="w3-text-white">Xoá</a></span>
                                </li>
                            <?php endforeach; ?>
                    </ul>
                    <br>
                    <div class="abili" style="height: 70px">
                        <input type="hidden" class="data_ability" data-id="<?php echo $id?>" data-id_ability="" data_ability_required="" data_ability_name="">
                        <div class="w3-col w3-margin-right" style="width: 30%">
                            <select class="w3-select select_name" name="select_ability">
                                <option value="" disabled selected>Chọn tên năng lực</option>
                                <?php foreach ($abilities as $ability):?>
                                    <option value="<?php echo $ability['id']?>" data-name="<?php echo $ability['ability_type']?>" data-id="<?php echo $ability['ability_name']?>"><?php echo $ability['ability_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="w3-col w3-margin-right" style="width: 20%">
                            <select class="w3-select select_rank" name="option">
                            </select>
                        </div>
                        <div class="w3-col w3-margin-right" style="width: 30%">
                            <input type="text" class="w3-input select_note" placeholder="Lựa chọn kinh nghiệm">
                        </div>
                        <div class="w3-col" style="width: 10%">
                                <span class="w3-margin w3-padding w3-round-large w3-hover-shadow w3-green add"><a
                                            href="javascript:void(0)" class="w3-text-white">Thêm</a></span>
                        </div>
                        <script>
                            $("select.select_name").change(function(){
                                var selectedCate = $(this).children("option:selected").data('name');
                                var selectedName = $(this).children("option:selected").data('id');
                                var selectId = $(this).children("option:selected").val();
                                $('.data_ability').attr("data-id_ability", selectId);
                                $('.data_ability').attr("data_ability_name", selectedName);
                                $('option.option').remove();
                                if(selectedCate === 'Ngôn ngữ lập trình' || selectedCate === 'Môn học CNTT'){
                                    var select = "<option class='option rank' value='' disabled selected>Đánh giá theo thang 10</option> </br>";
                                    var j = "";
                                    for(var i=1;i<11;i++){
                                        select = select.concat(j,"<option class='option' value='"+i+"'>"+i+"</option></br>");
                                    }
                                    $('select.select_rank').append(select);
                                }
                                else{
                                    var select = "<option class='rank' value='' disabled selected>Đánh giá theo chứng chỉ</option> </br>";
                                    if(selectedName === 'TOEIC'){
                                        var j = "";
                                        for(var i=0;i<21;i++){
                                            if(i==20) select = select.concat(j,"<option class='option' value='"+(i*50-10)+"'>"+(i*50-10)+"</option></br>");
                                            else
                                                select = select.concat(j,"<option value='' class='option' value='"+i*50+"'>"+i*50+"</option></br>");
                                        }
                                    }else{
                                        var j = "";
                                        for(var i=2;i<19;i++){
                                            select = select.concat(j,"<option value='' class='option' value='"+i*0.5+"'>"+i*0.5+"</option></br>");
                                        }
                                    }
                                    $('select.select_rank').append(select);
                                }
                            });
                            $("select.select_rank").change(function(){
                                var selectedVal = $(this).children("option:selected").val();
                                $('.data_ability').attr("data_ability_required", selectedVal);
                            });
                        </script>
                    </div>
                </div>
                <div class="w3-display-bottommiddle">
                    <button type="submit" class="w3-btn w3-green w3-margin-bottom "
                    >Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<script>
    //Tăng chiều cao cho phiếu
    var $item = $('.request').on('resize', function(){
        var height = $(this).height() +$('.list_ability').height() + $('.abili').height() +100;
        $(this).height(height);
    }).trigger('resize');

    $(document).ready(function () {
        var add = $('#fieldAdd').html();
        $('#add_ability').on('click', function () {
            $('#form-body').append(add);
        })
    });
    $('.delete').click(function (e) {
        e.preventDefault();
        if(confirm("Bạn chắc chắn muốn xoá yêu cầu về năng lực?")) {
            var id_ability = $('.delete').parent().data('id');
            // $(this).parent().remove();
            var url = '../../../server/organ_request/action_delete_ability_organ_request.php';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    delete_ability: 'delete_ability',
                    id_ability: id_ability
                },
                success: function (response) {
                    if (response == "success") {
                        window.location.reload();
                        alert("Yêu cầu năng lực của bạn đã được cập nhập vào hệ thống");
                    }
                }
            });
        }
    });
    $('.add').click(function (e) {
        e.preventDefault();
        if(confirm("Bạn chắc chắn muốn thêm yêu cầu về năng lực?")) {
            var request_id = $('.data_ability').data('id');
            var ability_id = $('.data_ability').attr('data-id_ability');
            var ability_required = $('.data_ability').attr('data_ability_required');
            var ability_note = $('.select_note').val();
            var url = '../../../server/organ_request/action_add_ability_organ_request.php';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    add_ability: 'add_ability',
                    request_id:request_id,
                    ability_id:ability_id,
                    ability_require:ability_required,
                    ability_note:ability_note
                },
                success: function (response) {
                    if (response == "success") {
                        window.location.reload();
                        alert("Yêu cầu năng lực của bạn đã được cập nhập vào hệ thống");
                    }
                }
            });
        }
    })
    $('#form_update_organ_request').submit(function(e){
        e.preventDefault();
        var request_id = $('.organ_request_id').val();
        var postion = $('.organ_request_position').val();
        var amount = $('.organ_request_amount').val();
        var salary = $('.organ_request_salary').val();
        url = "../../../server/organ_request/action_update_organ_request.php";
        $.ajax({
            url: url,
            type:'POST',
            data:{
                update_request:'update_request',
                request_id:request_id,
                postion:postion,
                amount: amount,
                salary: salary
            },
            success: function(response) {
                if(response=="success")
                {
                    window.location.reload();
                    alert("Phiếu tuyển dụng của bạn đã được cập nhập vào hệ thống");
                }

            }
        });
    })
</script>