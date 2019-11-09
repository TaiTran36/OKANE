<?php
session_start();
if(!isset($_SESSION['full_name']) || $_SESSION['full_name'] == NULL){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OKANE</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	body,h1,h2,h3,h4,h5,h6{font-family: "Lato", sans-serif}
		.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
		.w3-menu{position: fixed !important;}
		footer{background-color: #242424}
        a{text-decoration: none !important}
    </style>
</head>
<body>
	<div class="w3-display-container">
		<header >
			<div class="w3-top">
			  <div class="w3-bar w3-left-align w3-large w3-light-green">
			  	<div class="w3-row">
			  		<div class="w3-col w3-padding w3-green " style="width:20%"><a href="#" class="w3-bar-item w3-button w3-hide-small w3-large w3-hover-none w3-hover-text-white" ><b>OKANE - Student</b></a></div>
	  				<div class="w3-col w3-padding" style="width:80%">
                        <div class="w3-left w3-padding">
                            <span class="glyphicon glyphicon-home w3-text-white"></span><a href="index.php" class="w3-text-white"><span class="w3-margin-left">HOMEPAGE</span></a>
                        </div>
	  					<div class="w3-right w3-third ">
	  						<div class="w3-quarter w3-padding">
	  							<i class="fas fa-bell w3-text-white"></i>
	  						</div>
	  						<div class="w3-threequarter">
	  							
	  							<div class="w3-quarter ">
	  								<img src="../../img/slide/Slide3-0.jpg" style="width:65%;height: 40px" class=" w3-right w3-round-xxlarge">
	  							</div>
	  							<div class="w3-threequarter w3-padding w3-text-white"><?php echo $_SESSION['full_name'] ?>
                                   
	  								<div class="w3-dropdown-click w3-right">
    									<span class="glyphicon glyphicon-triangle-bottom " onclick="myFunction()"></span>
    									 <div id="list" class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
    									    <a href="" class="w3-bar-item w3-button">Profile</a>
    									    <a href="../../server/logout/logout.php" class="w3-bar-item w3-button">Logout</a>
    									 </div>
								    </div>
	  							</div>
	  						</div>
	  					</div>
		  			</div>
			  	</div>
			  </div>
			</div>
		</header>
	</div>
	<section>
			<div class="w3-display-container">
				<div class="w3-col w3-padding-64 w3-green w3-dark-grey w3-menu" style="width:20%;height: 630px;position: fixed;">
					<div class="w3-padding w3-light-grey w3-margin w3-round" style="height: 100px;">
						<div class="w3-quarter">
  							<img src="../../img/slide/Slide3-0.jpg" style="width:75%;height: 40px" class=" w3-right w3-round-xxlarge">
  							</div>
  							<div class="w3-threequarter w3-padding "><?php echo $_SESSION['full_name'] ?></div>
					</div>
					
					<div class="w3-grey w3-serif w3-large w3-light-grey w3-round w3-margin">
						<div class="w3-padding-large w3-hover-grey">
							<span class="glyphicon glyphicon-dashboard"></span> Dashboard
						</div>
						<div class="w3-padding-large w3-hover-grey">
							<span class="glyphicon glyphicon-edit"></span> Đăng kí
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
						<div class="w3-padding-large w3-hover-grey">
							Lorem ipsum
						</div>
					</div>
				</div>
				<div class="w3-col w3-padding " style="width:75%">fasfd</div>
			</div>
            <div class="w3-col w3-right w3-padding-64 contant" style="width: 80%;height:auto;">
                <div id="list_job">
                    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container" style="height:300px">
                        <h3 class="w3-center">Phiếu yêu cầu</h3>
                        <div class="w3-padding">
                            <div class="w3-quarter w3-padding">
                                <img src="../../img/partner/House3D.jpg" class="w3-image w3-border w3-hover-shadow" style="height: 150px;width: 100%;">
                                <div class="w3-center w3-margin-top">Công ty House3D</div>
                            </div>
                            <div class="w3-threequarter w3-padding">
                                <p>Tuyển vị trí: Thực tập PHP, .NET</p>
                                <p>Yêu cầu kinh nghiệm: 1 năm kinh nghiệm</p>
                                <p>Số lượng tuyển: 4 người</p>
                                <p>Thời hạn: Hêt 30/12/2019</p>
                            </div>
                        </div>
                        <button class="w3-btn w3-green w3-display-bottomright w3-margin" onclick="document.getElementById('id02').style.display='block'">Xem chi tiết</button>
                        <div id="myModal" class="modal">
                            //<?php include 'popup.php' ?>
                        </div>
                    </div>
                    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container" style="height:300px">
                        <h3 class="w3-center">Phiếu yêu cầu</h3>
                        <div class="w3-padding">
                            <div class="w3-quarter w3-padding">
                                <img src="../../img/partner/inno.png" class="w3-image w3-border w3-hover-shadow" style="height: 150px;width: 100%;">
                                <div class="w3-center w3-margin-top">Công ty InnoDigi</div>
                            </div>
                            <div class="w3-threequarter w3-padding">
                                <p>Tuyển vị trí: Thực tập PHP, .NET</p>
                                <p>Yêu cầu kinh nghiệm: 1 năm kinh nghiệm</p>
                                <p>Số lượng tuyển: 4 người</p>
                                <p>Thời hạn: Hêt 30/12/2019</p>
                            </div>
                        </div>
                        <button class="w3-btn w3-green w3-display-bottomright w3-margin" onclick="document.getElementById('id02').style.display='block'">Xem chi tiết</button>
                        <div id="myModal" class="modal">
                        </div>
                    </div>
                    <div class="w3-padding  w3-margin w3-round w3-card w3-display-container" style="height:300px">
                        <h3 class="w3-center">Phiếu yêu cầu</h3>
                        <div class="w3-padding">
                            <div class="w3-quarter w3-padding">
                                <img src="../../img/partner/fpt.jpg" class="w3-image w3-border w3-hover-shadow" style="height: 150px;width: 100%;">
                                <div class="w3-center w3-margin-top">Công ty FPT</div>
                            </div>
                            <div class="w3-threequarter w3-padding">
                                <p>Tuyển vị trí: Thực tập PHP, .NET</p>
                                <p>Yêu cầu kinh nghiệm: 1 năm kinh nghiệm</p>
                                <p>Số lượng tuyển: 4 người</p>
                                <p>Thời hạn: Hêt 30/12/2019</p>
                            </div>
                        </div>
                        <button class="w3-btn w3-green w3-display-bottomright w3-margin" onclick="document.getElementById('id02').style.display='block'">Xem chi tiết</button>
                    </div>
                </div>
                <div class="registe_form_job w3-padding w3-margin w3-round w3-card " style="display: none;height: 500px;">
                    <form class="w3-display-container">
                        <h3 class="w3-center">PHIẾU ĐĂNG KÍ ỨNG TUYỂN</h3>
                        <h4 class="w3-right-align">Công ty InnoDigi</h4>
                        <div class="w3-padding ">
                            <div class="w3-half w3-display-container">
                                <div class="w3-padding " style="height: 320px;">
                                    <div class="w3-third">
                                        <img src="../../img/partner/inno.png" class="w3-image w3-border w3-hover-shadow" style="height: 200px;width: 100%;">
                                    </div>
                                   <div class="w3-twothird">
                                       <div class="w3-padding">
                                           <p>Họ và tên : <?php echo $_SESSION['username']?></p>
                                           <p>Sinh viên năm thứ 4</p>
                                           <p>Ngành MT&KHTT</p>
                                           <p>Trường Đại học Koa học Tự nhiên Hà Nội</p>
                                       </div>
                                   </div>

                                </div>
                                <div class="w3-display-bottomleft w3-margin-bottom w3-padding-32">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </div>
                                <button class="w3-btn w3-green w3-display-bottomright w3-margin-top" >Đăng kí ứng tuyển</button>
                            </div>
                            <div class="w3-half">
                                <div class="w3-padding">
                                    <p>Vị trí ứng tuyển: Thực tập PHP</p>
                                    <p>Kinh nghiệm: 1 năm kinh nghiệm</p>
                                    <p>Kỹ năng lập trình</p>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
	</section>

    <div id="id02" class="w3-modal w3-top" style="display: none">
        <div class="w3-modal-content" >
            <div class="w3-container">
                <div class="w3-panel w3-border-bottom">
                    <div class="w3-center w3-padding ">
                        <h3 class="w3-center">Phiếu yêu cầu</h3>
                    </div>
                </div>
                <div class="w3-panel w3-margin">
                    <div class="w3-half">
                        <div class="w3-padding">
                            <img src="../../img/partner/inno.png" class="w3-image w3-border w3-hover-shadow" style="height: 200px;width: 100%;">
                            <div class="w3-center w3-margin-top">Công ty InnoDigi</div>
                            <div class="w3-center w3-margin-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </div>
                        </div>
                    </div>
                    <div class="w3-half">
                        <div class="w3-padding">
                            <p>Tuyển vị trí: Thực tập PHP, .NET</p>
                            <p>Yêu cầu kinh nghiệm: 1 năm kinh nghiệm</p>
                            <p>Số lượng tuyển: 4 người</p>
                            <p>Thời hạn: Hêt 30/12/2019</p>
                        </div>
                    </div>
                </div>
                <button class="w3-btn w3-green w3-display-bottomright w3-margin" id="btn_register_job">Đăng kí ứng tuyển</button>
            </div>

        </div>
    </div>
	<script>
		function myFunction() {
		  var x = document.getElementById("list");
		  if (x.className.indexOf("w3-show") == -1) {
		    x.className += " w3-show";
		  } else { 
		    x.className = x.className.replace(" w3-show", "");
		  }
		}
        var modal2 = document.getElementById('id02');
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";

            }
        }
        $('#btn_register_job').click(function () {
            document.getElementById('id02').style.display = "none";
            $('#list_job').css('display','none');
            //document.getElementById('registe_form_job').style.display = "block";
             $('.registe_form_job').css('display','block');
        });
</script>
</body>
</html>