<div id="id01" class="w3-modal w3-top" style="display: none">
    <div class="w3-modal-content" >
        <div class="w3-container">
            <div class="w3-panel w3-border-bottom">
                <div class="w3-center w3-padding ">
                    ĐĂNG NHẬP
                </div>
            </div>
            <div class="w3-panel w3-margin">
                <div id="sv" class="w3-third w3-padding-16 w3-border-bottom w3-center w3-border-red">
                    Bạn là sinh viên
                </div>
                <div id="gv" class="w3-third w3-padding-16 w3-border-bottom w3-center">
                    Bạn là giáo viên
                </div>
                <div id ="dn" class="w3-third w3-padding-16 w3-border-bottom w3-center">
                    Bạn là doanh nghiệp
                </div>
            </div>
            <div class="w3-panel w3-margin w3-padding-32" id="form_login">
                <div id="error" class="w3-margin w3-padding-small" >

                </div>
                <div id="list_form">
                    <?php include('login/login_student.php'); ?>
                </div>

            </div>
        </div>

    </div>
</div>