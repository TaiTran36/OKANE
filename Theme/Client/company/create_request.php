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
                        <script type="text/javascript" src="public/create_request_change_select_ability.js"></script>
                    </div>
                </div>
                <div class="w3-display-bottommiddle">
                    <button  type="submit" class="w3-btn w3-green w3-margin-bottom" name="create_request" value="create_request">Tạo phiếu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="public/create_request.js"></script>
