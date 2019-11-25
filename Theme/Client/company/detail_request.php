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
                    <ul class="w3-margin-top w3-margin-bottom list_ability" style="padding: 0">
                        <?php
                        if(isset($ability_result))
                            foreach ($ability_result as $item_ability) : ?>
                                <li class="w3-margin-top w3-margin-bottom abilities" data-id="<?php echo $item_ability['id']?>" >
                                    <div class='w3-col' style='width:37%'><span class="w3-margin-right w3-green w3-padding"><?php echo $item_ability['ability_name'] ?></span></div>
                                    <div class='w3-col' style='width:23%'><span class="w3-margin-right w3-padding w3-khaki">Mức đạt: <?php echo $item_ability['ability_required']?></span></div>
                                    <div class='w3-col' style='width:37%'><span class="w3-margin-right w3-padding w3-pale-yellow"><?php echo $item_ability['note']?></span></div>
                                    <div class='w3-col' style='width:3%'><span class="w3-margin-right w3-padding w3-round-large w3-hover-shadow w3-red  delete"><a
                                                    href="javascript:void(0)" class="w3-text-white">Xoá</a></span></div>
                                </li>
                                <br>
                                <br>
                            <?php endforeach; ?>
                    </ul>
                    <br>
                    <br>
                    <div class=" w3-margin-top abili" style="height: 70px">
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
                        <script type="text/javascript" src="public/detail_request_change_select_ability.js"></script>
                    </div>
                </div>
                <div class="w3-display-bottommiddle">
                    <?php if($item['organ_request_status'] == 1000):?>
                        <button type="submit" class="w3-btn w3-green w3-margin-bottom status" value="1000">Xét duyệt</button>
                    <?php else:?>
                        <button type="submit" class="w3-btn w3-green w3-margin-bottom ">Cập nhật</button>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<script type="text/javascript" src="public/detail_request_action_update_request.js"></script>