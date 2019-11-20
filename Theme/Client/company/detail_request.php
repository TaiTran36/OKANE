<?php
$id = $_REQUEST['id'];
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn    = new Connection();
$connect = $conn->Conn();

$ability        = "SELECT intern_organization_request_abilities.organization_request_id, intern_organization_request_abilities.ability_id, intern_ability_dictionary.ability_name, intern_organization_request_abilities.ability_required, intern_organization_request_abilities.note 
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
            <form id="form_update_organ_request" action="../../../server/organ_request/action_update_organ_request.php"
                  method="post">
                <div class="w3-twothird w3-padding">
                    <input type="hidden" name="organ_request_id" value="<?php echo $id ?>">

                    <h3><?php echo $item['organization_name'] ?></h3>
                    <label>Số lượng sinh viên đã đăng kí: <?php echo $item['count_stu_res'] ?> </label> <br/>
                    <br/>

                    <label>Tuyển vị trí: </label>
                    <input type="text" name="organ_request_position" value="<?php echo $item['organ_request_position'] ?>"><br/>
                    <label>Số lượng tuyển: </label>
                    <input type="text" name="organ_request_amount" value="<?php echo $item['organ_request_amount'] ?>"><br/>
                    <label>Mức lương: </label>
                    <input type="text" name="organ_request_salary" value="<?php echo $item['organ_request_salary'] ?>"><br/>
                    <input type="hidden" name="organ_request_status" value="2000">
                    <label>Ngày đăng: <?php echo date_format(new DateTime($item['organ_request_date_submitted']), "d/m/Y"); ?></label><br/>
                    <label>Yêu cầu năng lực: </label>
                    <button type="button" id="add_ability" class="w3-btn w3-green w3-tiny" onclick="">+</button><br />
<!--                    <ul class="list_ability">-->
                        <?php foreach ($ability_result as $temp) : ?>
                            <!--                            <li class="w3-margin">-->
                            <select name="ability_id">
                                <?php foreach ($abilities as $abi) : ?>
                                        <option
                                                <?php if ($abi['id'] == $temp['ability_id']) : ?>
                                                    <?php echo "selected" ?>
                                                <?php endif; ?>
                                                value="<?php echo $abi['id'] ?>"><?php echo $abi['ability_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                            </select>
                            <input type="text" name="ability_required" value="<?php echo $temp['ability_required'] ?>">
                            <input type="text" name="note" value="<?php echo $temp['note'] ?>">
                            <button type="button" id="delete_ability" class="w3-btn w3-red w3-tiny" onclick="">-</button>
                            <!--                            </li>-->
                        <?php endforeach; ?>
<!--                    </ul>-->
                </div>
                <div class="w3-display-bottommiddle">
                    <button type="submit" class="w3-btn w3-green w3-margin-bottom btn_update"
                            name="update_organ_request">Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<script>
    $(document).ready(function () {
        var add = $('#fieldAdd').html();
        $('#add_ability').on('click', function () {
            $('#form-body').append(add);
        }
    });

    $(document).on('click', '#delete_ability', function () {
        $(this).parent().parent().remove();
    }
</script>

<div id="fieldAdd" class="field" style="display: none">
    <div>
        <select name="ability_id">
            <?php foreach ($abilities as $abi) : ?>
                <option>Chọn năng lực</option>
                <option value="<?php echo $abi['id'] ?>"><?php echo $abi['ability_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="ability_required" value="">
        <input type="text" name="note" value="">
        <button type="button" id="delete_ability" class="w3-btn w3-red w3-tiny" onclick="">-</button>
    </div>
</div>
