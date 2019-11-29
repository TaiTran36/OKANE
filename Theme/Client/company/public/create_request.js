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
                alert(ability_required);
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
});