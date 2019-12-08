$('.delete').click(function (e) {
    e.preventDefault();
    if(confirm("Bạn chắc chắn muốn xoá bản ghi này?")) {
        var id_assignment = $('.delete').parent().parent().data('id');
        var url = '../../../server/teacher_assignment/assignment_delete_action.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                delete_ability: 'delete_ability',
                id_assignment: id_assignment
            },
            success: function (response) {
                if (response == "success") {
                    window.location.reload();
                    alert("Xóa bản ghi thành công !");
                }
            }
        });
    }
});