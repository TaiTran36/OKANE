<div class="w3-top">
    <div class="w3-bar w3-left-align w3-large w3-teal">
        <div class="w3-row">
            <div class="w3-col w3-padding w3-deep-purple " style="width:20%"><a href="#" class="w3-bar-item w3-button w3-hide-small w3-large w3-hover-none w3-hover-text-white" ><b>OKANE - Teacher</b></a></div>
            <div class="w3-col w3-padding" style="width:80%">
                <div class="w3-left w3-padding">
                    <span class="glyphicon glyphicon-home w3-text-white"></span><a href="../index.php" class="w3-text-white"><span class="w3-margin-left">HOMEPAGE</span></a>
                </div>
                <div class="w3-right w3-third ">
                    <div class="w3-quarter w3-padding">
                        <i class="fas fa-bell w3-text-white"></i>
                    </div>
                    <div class="w3-threequarter">

                        <div class="w3-quarter ">
                            <img src="../../../img/slide/Slide3-0.jpg" style="width:65%;height: 40px" class=" w3-right w3-round-xxlarge">
                        </div>
                        <div class="w3-threequarter w3-padding w3-text-white"><?php echo $_SESSION['full_name'] ?>
                            <div class="w3-dropdown-click w3-right">
                                <span class="glyphicon glyphicon-triangle-bottom " onclick="myFunction()"></span>
                                <div id="list" class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
                                    <a href="" class="w3-bar-item w3-button">Profile</a>
                                    <a href="../../../server/logout/logout.php" class="w3-bar-item w3-button">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>