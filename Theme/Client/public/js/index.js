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
		    var modal = document.getElementById('id01');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
			$('#sv').click(function(){
				$(this).addClass("w3-border-red");
				$('#gv').removeClass("w3-border-red");
				$('#dn').removeClass("w3-border-red");
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
				$(this).addClass("w3-border-red");
				$('#sv').removeClass("w3-border-red");
				$('#dn').removeClass("w3-border-red");
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
				$(this).addClass("w3-border-red");
				$('#sv').removeClass("w3-border-red");
				$('#gv').removeClass("w3-border-red");
				$('#form_sv').remove();
				$('#form_gv').remove();
				$.ajax({
			       url: 'login/login_company.php',
			       success: function(html) {
			          $("#form_login").append(html);
			       }
			    });
			});
		});
