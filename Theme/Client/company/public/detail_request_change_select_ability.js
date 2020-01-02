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
                    select = select.concat(j,"<option class='option' value='"+i*50+"'>"+i*50+"</option></br>");
            }
        }else{
            var j = "";
            for(var i=2;i<19;i++){
                select = select.concat(j,"<option class='option' value='"+i*0.5+"'>"+i*0.5+"</option></br>");
            }
        }
        $('select.select_rank').append(select);
    }
});
$("select.select_rank").change(function(){
    var selectedVal = $(this).children("option:selected").val();
    $('.data_ability').attr("data_ability_required", selectedVal);
});