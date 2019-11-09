<?php
session_start();
?>
<div class="w3-display-container">
	<!-- Tạo thanh menu -->
	<header>
		<div id="menu" class="w3-top">
		  <div class="w3-bar w3-card w3-left-align w3-large">
		  	<div class="w3-row">
		  		<div class="w3-col w3-padding" style="width:10%"><a href="#" class="w3-bar-item w3-button w3-hide-small w3-white w3-large w3-hover-white" ><b>OKANE</b></a></div>
  				<div class="w3-col w3-padding" style="width:60%">
  					<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			    
				    <a href="#"  class="active w3-bar-item w3-button w3-hide-small w3-white w3-hover-white w3-large">TRANG CHỦ</a>
				    <a href="#" class="list_menu w3-bar-item w3-button w3-hide-small w3-hover-white w3-large w3-text-white">VỀ CHÚNG TÔI</a>
				    <a href="#" class="list_menu w3-bar-item w3-button w3-hide-small w3-hover-white w3-large w3-text-white">NỀN TẢNG OKANE</a>
				    <a href="#" class="list_menu w3-bar-item w3-button w3-hide-small w3-hover-white w3-large w3-text-white">ĐỐI TÁC</a>
				    <a href="#" class="list_menu w3-bar-item w3-button w3-hide-small w3-hover-white w3-large w3-text-white">LIÊN HỆ</a>
	  			</div>
		  		<div class="w3-col w3-padding w3-right" style="width:30%">
		    		<?php 
			    		if(isset($_SESSION['full_name']) && $_SESSION['full_name'] != NULL){
			    	
			    			if(isset($_SESSION['user'])){
			    			 	$url = $_SESSION['user'].'.php';
			    			}
			    			echo '<div class="w3-col w3-margin-right " style="width:45%">',
			    			'<div class="w3-border w3-round-xxlarge w3-hover-shadow">',
			    			"<span class='btn_login list_menu w3-button w3-large w3-hide-small w3-hover-none w3-text-white' style='width:auto;'>"
			    			.$_SESSION['full_name'].
			    			'</span>',
			    			'</div>',
			    			'</div>',
			    			'<div class="w3-col" style="width:50%">',
			    			 '<div class="w3-border w3-round-xxlarge w3-center w3-hover-shadow">',
			    			 '<span class=" btn_login list_menu w3-button w3-large w3-hover-none w3-text-white" style="width:auto;"><span class="glyphicon glyphicon-repeat"></span><a href="
			    			 	'.$url.'
			    			 	">Quay lại</a></span>',
			    			 '</div>',
			    			 '</div>';

			    		}
			    		else if(isset($_SESSION['organization_name']) && $_SESSION['organization_name'] != NULL){
			    			if(isset($_SESSION['user'])){
			    			 	$url = $_SESSION['user'].'.php';
			    			}
			    			echo '<div class="w3-col w3-margin-right " style="width:45%">',
			    			'<div class="w3-border w3-round-xxlarge w3-hover-shadow">',
			    			"<span class='btn_login list_menu w3-button w3-large w3-hide-small w3-hover-none w3-text-white' style='width:auto;'>".
			    			$_SESSION['organization_name'].
			    			'</span>',
			    			'</div>',
			    			'</div>',
			    			'<div class="w3-col" style="width:50%">',
			    			 '<div class="w3-border w3-round-xxlarge w3-center w3-hover-shadow">',
			    			 '<span class=" btn_login list_menu w3-button w3-large w3-hover-none w3-text-white" style="width:auto;"><i class="list_menu fas fa-user index_fontawe w3-margin-right"></i><a href="
			    			 	'.$url.'
			    			 	">Quay lại</a></span>',
			    			 '</div>',
			    			 '</div>';
			    		}
			    		else {
			    			echo '<div class="w3-col w3-margin-right " style="width:45%">',
			    			'<div class="w3-border w3-round-xxlarge w3-hover-shadow">',
			    			 "<span class='btn_login list_menu w3-button w3-large w3-hide-small w3-hover-none w3-text-white' style='width:auto;'>",
			    			'<i class="fas fa-user-plus index_fontawe w3-margin-right list_menu" ></i>',
			    			 'ĐĂNG KÍ',
			    			 '</span>',
			    			 '</div>',
			    			 '</div>',
			    			 '<div class="w3-col" style="width:50%">',
			    			 '<div class="w3-border w3-round-xxlarge w3-center w3-hover-shadow">',
			    			 '<span class=" btn_login list_menu w3-button w3-large w3-hover-none w3-text-white" onclick="document.getElementById(',"'id01'",').style.display=',"'block'",'" style="width:auto;"><i class="list_menu fas fa-user index_fontawe w3-margin-right"></i>ĐĂNG NHẬP</span>',
			    			 '</div>',
			    			 '</div>';
			    		}
		    	 	?>			  			
		  		</div>
		  	</div>
		   
		  </div>
		</div>
	</header>
<!-- 	Tạo slide show -->
	<section>
		<div class="w3-row">
			 <div class="mySlides slide" stt="1">
              	<img src="../../img/slide/Slide3-0.jpg" class="w3-image">
            </div>
             <div class="mySlides slide" stt="3" style="display:none">
              	<img src="../../img/slide/Slide10.jpg" class="w3-image">
            </div>
            <div class="mySlides slide" stt="2" style="display:none;">
             	<img src="../../img/slide/Slide2-1.jpg" class="w3-image">
            </div>
           
		</div>
		<div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </div>
	</section>
	<!-- form login -->
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
</div>