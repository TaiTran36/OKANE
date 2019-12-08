<?php
include $_SERVER["DOCUMENT_ROOT"] . "/okane/server/Connection.php";
$conn = new Connection();
$connect = $conn->Conn();

$abilities = "SELECT intern_ability_dictionary.* FROM intern_ability_dictionary";
$result = $conn->getData($abilities);
?>

<div class="w3-padding  w3-margin w3-round w3-card w3-display-container request" style="height:auto">
    <h3 class="w3-center">DANH SÁCH TỪ ĐIỂN NĂNG LỰC</h3>
    <div class="w3-padding">
        <button id="myBtn" class="w3-btn w3-blue  w3-margin w3-round">Thêm mới</button>
        <?php include('add_ability.php'); ?>
        <table class="w3-table-all w3-hoverable">
            <thead>
            <tr class="w3-light-grey">
                <th>Định danh năng lực</th>
                <th>Tên năng lực</th>
                <th>Loại năng lực</th>
                <th>Mức đánh giá</th>
            </tr>
            </thead>
            <?php foreach ($result as $item): ?>
                <tr data-id="<?php echo $item['id'] ?>">
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['ability_name'] ?></td>
                    <td><?php echo $item['ability_type'] ?></td>
                    <td><?php echo $item['ability_note'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>
<script type="text/javascript" src="public/assignment_action_delete.js"></script>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    btn.onclick = function () {
        modal.style.display = "block";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>