$(document).ready(function() {
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 590 || document.documentElement.scrollTop > 590) {
		$('#menu').addClass('w3-white');
		$('.active').addClass('w3-dark-grey');
		$('.list_menu').addClass('w3-text-black w3-hover-dark-grey');
		$('.btn_login').removeClass('w3-hover-dark-grey');
	  }
	  else{
		$('#menu').removeClass('w3-white');
		$('.list_menu').removeClass('w3-text-black w3-hover-dark-grey');
		$('.active').removeClass('w3-dark-grey');
	  }
	}
	var slideIndex = 0;
	showSlides();
    
	function showSlides() {
	    var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000);
    }
	var modal1 = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal1) {
            $('.list_err').remove();
            $('.input_name').val("");
            $('.input_pass').val("");
			modal1.style.display = "none";

		}

	}
	//Display form login
	$('#sv').click(function(){
        $('.list_err').remove();
		$(this).addClass("w3-border-red");
		$('#gv').removeClass("w3-border-red");
		$('#dn').removeClass("w3-border-red");
        $('#form_sv').remove();
		$('#form_gv').remove();
		$('#form_dn').remove();
		$.ajax({
		   url: 'login/login_student.php',
		   success: function(html) {
			  $("#form_login").append(html);
		   }
		});
	});
	$('#gv').click(function(){
        $('.list_err').remove();
		$(this).addClass("w3-border-red");
		$('#sv').removeClass("w3-border-red");
		$('#dn').removeClass("w3-border-red");
        $('#form_gv').remove();
		$('#form_sv').remove();
		$('#form_dn').remove();
		$.ajax({
		   url: 'login/login_teacher.php',
		   success: function(html) {
			  $("#form_login").append(html);
		   }
		});
	});
	$('#dn').click(function(){
        $('.list_err').remove();
		$(this).addClass("w3-border-red");
		$('#sv').removeClass("w3-border-red");
		$('#gv').removeClass("w3-border-red");
        $('#form_dn').remove();
		$('#form_sv').remove();
		$('#form_gv').remove();
		$.ajax({
		   url: 'login/login_company.php',
		   success: function(html) {
			  $("#form_login").append(html);
		   }
		});
	});
	//ajax login student
	$('#form_login').submit(function(e){
		e.preventDefault();
		$('.list_err').remove();
		var username = $('.input_name').val();
		var pass = $('.input_pass').val();
        var action = $('.action_login').val();
        var url = "";
        var red = "";
        var err = "";
        if(action == 'stu'){
            url = '../../server/login/action_login_student.php';
            red = 'student.php';
            err = 'Mã sinh viên';
        }
        if(action == 'tea'){
            url = '../../server/login/action_login_teacher.php';
            red = 'teacher.php';
            err = 'Mã giáo viên';
        }
        if(action == 'comp'){
            url = '../../server/login/action_login_company.php';
            red = 'company.php';
            err = 'Mã số thuế';
        }
		$.ajax({
			url: url,
			type:'POST',
			data:{
				login:'login',
				username: username,
				pass: pass
			},
			success: function(response) {
				if(response=="success")
				{
					window.location.href = red;
				}
				else if(response == "error_name")
				{
					$('#error').append('<p class="w3-text-red list_err">'+err+' không đúng. Vui lòng kiểm tra lại</p>');
				}
				else if(response == "error_pass"){
					$('#error').append('<p class="w3-text-red list_err">Mật khẩu không đúng. Vui lòng kiểm tra lại</p>');
				}
			}
		});
	});

});
