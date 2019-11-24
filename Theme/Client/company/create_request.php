<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();
$abilities = "SELECT * FROM intern_ability_dictionary";
$abilities = $conn->getData($abilities);
?>
<div class="w3-padding  w3-margin w3-round w3-card w3-display-container create_request" style="height:500px">
    <h2 class="w3-center">TẠO PHIẾU TUYỂN DỤNG</h2>
    <div class="w3-padding">
        <div class="w3-panel w3-margin">
            <form id="form_update_organ_request" action="../../../server/organ_request/action_create_organ_request.php" method="POST">
                <div class=" w3-padding">
                    <p class="w3-xlarge"><b><?php echo $_SESSION['organization_name'] ?></b></p>
                    <input type="hidden" class="organ_id" name="organization_id" value="<?php echo $_SESSION['organ_id']?>">
                    <p class="w3-xlarge"><b></b></p>
                    <label class="w3-large">Tuyển vị trí: </label>
                    <input class="w3-input organ_request_position" type="text" name="organ_request_position" value=""><br/>
                    <label class="w3-large">Số lượng tuyển: </label>
                    <input class="w3-input organ_request_amount" type="number" name="organ_request_amount" value=""><br/>
                    <label class="w3-large">Mức lương: </label>
                    <input class="w3-input organ_request_salary" type="text" name="organ_request_salary" value=""><br/>
                    <?php
                        $date=getdate(date("U"));
                        $current_date = "$date[mday]-$date[mon]-$date[year]";
                    ?>
                    <input type="hidden" class="date" name="organ_request_date_submitted" value="<?php echo $current_date?>">
                    <input type="hidden" class="status" name="organ_request_status" value="1000">
                    <label class="w3-large">Yêu cầu năng lực: </label>
                    <!--                    Tạo button thêm và xoá-->
                    <div class="w3-right">
                        <span class=' w3-padding w3-round-large w3-hover-shadow w3-red del '><a
                                    href="javascript:void(0) " class="w3-text-white">Xoá</a></span>
                        <span class="w3-margin-left w3-padding w3-round-large w3-hover-shadow w3-green add"><a
                                    href="javascript:void(0)" class="w3-text-white">Thêm</a></span>
                    </div>
                    <!--                    Hiển thị danh sách các yêu cầu năng lực-->
                    <ul class="list_ability">
                        <input type="hidden" class="abilities" name="abilities" value="">
                    </ul>
                    <br>
                    <!--                    action chọn các loại năng lực-->
                    <div class="abili" style="height: 70px">
                        <input type="hidden" class="data_ability"  data-id_ability="" data_ability_required="" data_ability_name="">
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
                    <button  type="submit" class="w3-btn w3-green w3-margin-bottom" name="create_request" value="create_request">Tạo phiếu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    //Hiển thị chiều cao phiếu
    $( document ).ready(function() {
        var $item = $('.create_request').on('resize', function(){
            var height = $(this).height() +$('.list_ability').height() + $('.abili').height() +300;
            $(this).height(height);
        }).trigger('resize');
        //Thêm và xoá dữ liệu năng lực
        var list_ability = [];
        action_ability();
        function action_ability (){
            var count = -1;

            $('.del').on('click',function (e) {
                e.preventDefault();
                var atLeastOneIsChecked = $('input.check:checked');
                if(atLeastOneIsChecked.length > 0){
                    if (confirm("Bạn chắc chắn muốn xoá yêu cầu về năng lực?")) {
                        for(var i of atLeastOneIsChecked){
                            list_ability.splice(list_ability.indexOf(i.value),1);

                        }
                        var j = document.querySelectorAll("input.check:checked");
                        for (var i=0;i<j.length;i++){
                            j[i].parentNode.parentNode.remove();
                        }
                        $('input.abilities').val(list_ability);
                        console.log(list_ability);
                    }
                }
                else{
                    alert('Bạn chưa có yêu cầu về năng lực hoặc chưa chọn yêu cầu cần xoá!');
                }

            });
            $('.add').click(function (e) {
                e.preventDefault();
                if(confirm("Bạn chắc chắn muốn thêm yêu cầu về năng lực?")) {
                    count++;
                    var ability_id = $('.data_ability').attr('data-id_ability');
                    var ability_required = $('.data_ability').attr('data_ability_required');
                    var ability_note = $('.select_note').val();
                    var ability_name = $('.data_ability').attr('data_ability_name');
                    var abi= "<li class='w3-margin abilities' data-id = "+count+">\n" +
                        "<div class='w3-col' style='width:20%'><input class='check' name='check' value='"+count+"' type='checkbox'  ></div>\n"+
                        "<div class='w3-col' style='width:30%'><span class='w3-margin w3-green w3-padding '>"+ability_name+"</span></div>\n" +
                        "<div class='w3-col' style='width:20%'><span class='w3-margin w3-padding w3-khaki '>Mức đạt: "+ability_required+"</span></div>\n" +
                        "<div class='w3-col' style='width:30%'><span class='w3-margin w3-padding w3-pale-yellow '>"+ability_note+"</span></div>\n"+
                        "</li><br>";
                    $('.list_ability').append(abi);
                    var el = new Array();
                    el.push(count,ability_id,ability_required,ability_note);
                    list_ability.push(el);
                    $('input.abilities').val(list_ability);
                    console.log(list_ability);
                }
            })
        }
        // $('.create_request').submit(function (e) {
        //     e.preventDefault();
        //     var organization_id = $('.organ_id').val();
        //     var organ_request_position = $('.organ_request_position').val();
        //     var organ_request_amount = $('.organ_request_amount').val();
        //     var organ_request_salary = $('.organ_request_salary').val();
        //     var organ_request_date_submitted = $('.date').val();
        //     var organ_request_status = $('.status').val();
        //     var url = '../../../server/organ_request/action_create_organ_request.php';
        //     $.ajax({
        //         url: url,
        //         type: 'POST',
        //         data: {
        //             create_request: 'create_request',
        //             organization_id:organization_id,
        //             organ_request_position:organ_request_position,
        //             organ_request_amount:organ_request_amount,
        //             organ_request_salary:organ_request_salary,
        //             organ_request_date_submitted:organ_request_date_submitted,
        //             organ_request_status:organ_request_status,
        //             list_ability:list_ability
        //         },
        //         success: function (response) {
        //             if (response == "success") {
        //                 window.location.reload();
        //                 alert("Phiếu yêu cầu đã được tạo");
        //             }
        //         }
        //     });
        // });
    });
</script>
