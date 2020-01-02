<div id="myModal" class="w3-modal w3-top" style="display: none">
    <div class="w3-modal-content" >
        <div class="w3-container">
            <div class="w3-panel w3-border-bottom">
                <div class="w3-center w3-padding ">
                    <h2>NĂNG LỰC</h2>
                </div>
            </div>
            <div class="w3-panel w3-margin w3-padding-32" id="form_ability">
                <form action="../../../server/teacher_assignment/add_ability.php" method="POST">
                    <div class="w3-padding w3-margin-bottom">
                        <label for="">Tên năng lực</label>
                        <input class="w3-input" type="text" name="ability_name" placeholder="Nhập tên năng lực" value="" required>
                    </div>
                    <div class="w3-padding w3-margin-bottom">
                        <label for="">Loại năng lực</label>
                        <select class="w3-select sl" name="ability_type">
                            <option value="" disabled selected>Chọn loại năng lực</option>
                            <option value="1">Ngôn ngữ lập trình</option>
                            <option value="2">Môn học CNTT</option>
                            <option value="3">Chứng chỉ ngoại ngữ</option>
                        </select>
                    </div>
                    <div class="w3-padding w3-margin-bottom">
                        <label for="">Mức đánh giá</label>
                        <input class="w3-input status" type="text" name="ability_note" value="" readonly>
                    </div>
                    <div class="w3-padding w3-margin-bottom w3-center">
                        <button type="submit" class="w3-btn w3-green add" name="add">Thêm</button>
                    </div>
                </form>
                <script>
                    $("select.sl").change(function(){
                        var selectedType = $(this).children("option:selected").val();
                        if(selectedType === '1' || selectedType === '2'){
                            $('.status').val('1...10');
                            var a = $('.status');
                            a.prop('readonly', true);
                            if(selectedType === '1'){
                                $(this).children("option:selected").val('Ngôn ngữ lập trình');
                            }else{
                                $(this).children("option:selected").val('Môn học CNTT');
                            }
                        }
                        else{
                            var a = $('.status');
                            a.removeAttr('readonly');
                            $(this).children("option:selected").val('Chứng chỉ ngoại ngữ');
                        }
                    })
                </script>
            </div>
        </div>

    </div>
</div>