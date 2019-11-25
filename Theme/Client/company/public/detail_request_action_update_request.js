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
$('button.status').click(function (e) {
    e.preventDefault();
    var request_id = $('.data_ability').data('id');
    var url = '../../../server/organ_request/action_update_status_organ_request.php';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            update_status: 'update_status',
            status: '2000',
            request_id:request_id
        },
        success: function (response) {
            if (response == "success") {
                window.location.reload();
                alert("Gửi yêu cầu xét duyệt phiếu tuyển dụng thành công!");
            }
        }
    });
})
$('.delete').click(function (e) {
    e.preventDefault();
    if(confirm("Bạn chắc chắn muốn xoá yêu cầu về năng lực?")) {
        var id_ability = $('.delete').parent().parent().data('id');
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
                ability_required:ability_required,
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