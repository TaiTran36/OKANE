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
    </style>
</head>
<body>
	<div class="w3-display-container">
		<header >
			<div class="w3-top">
			  <div class="w3-bar w3-left-align w3-large w3-teal">
			  	<div class="w3-row">
			  		<div class="w3-col w3-padding w3-deep-purple " style="width:20%"><a href="#" class="w3-bar-item w3-button w3-hide-small w3-large w3-hover-none w3-hover-text-white" ><b>OKANE - Teacher</b></a></div>
	  				<div class="w3-col w3-padding" style="width:80%">
	  					<div class="w3-right w3-third ">
	  						<div class="w3-quarter w3-padding">
	  							<i class="fas fa-bell w3-text-white"></i>
	  						</div>
	  						<div class="w3-threequarter">
	  							
	  							<div class="w3-quarter ">
	  								<img src="../../img/slide/Slide3-0.jpg" style="width:65%;height: 40px" class=" w3-right w3-round-xxlarge">
	  							</div>
	  							<div class="w3-threequarter w3-padding w3-text-white">Trần Thanh Tài 
	  								<div class="w3-dropdown-click w3-right">
 										<span class="glyphicon glyphicon-triangle-bottom " onclick="myFunction()"></span>
									  <div id="list" class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
									    <a href="" class="w3-bar-item w3-button">Profile</a>
									    <a href="" class="w3-bar-item w3-button">Logout</a>
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
  							<div class="w3-threequarter w3-padding ">Trần Thanh Tài</div>
					</div>
					
					<div class="w3-grey w3-serif w3-large w3-light-grey w3-round w3-margin">
						<div class="w3-padding-large w3-hover-grey">
							<span class="glyphicon glyphicon-dashboard w3-margin-right"></span> Dashboard
						</div>
						<div class="w3-padding-large w3-hover-grey">
							<i class="fas fa-copy w3-margin-right"></i> Danh sách phiếu
						</div>
						<div class="w3-padding-large w3-hover-grey">
							<span class="glyphicon glyphicon-list w3-margin-right"></span>Danh sách phân công
						</div>
						<div class="w3-padding-large w3-hover-grey">
							<i class="fas fa-user-plus w3-margin-right"></i>Thêm sinh viên
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
	</section> 
	
	
	<script>
		function myFunction() {
		  var x = document.getElementById("list");
		  if (x.className.indexOf("w3-show") == -1) {
		    x.className += " w3-show";
		  } else { 
		    x.className = x.className.replace(" w3-show", "");
		  }
		}
</script>
</body>
</html>