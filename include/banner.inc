    
	<div id="banner" class="container mt-0" style="border-radius: 5px; font-family : "Font Awesome"; " >
	<div class="row">
	<div class = "col-11">
        <h6 class="text-center display-6" style="font-family :'verlag', sans-serif ; color: #1160b7;"><a class="navbar-brand" href="https://www.vdiec.com"><img src="images/logo.png" alt="logo" style="width:120px; "></a> Please Login to Access Control Panel</h6> 
        </div>
<div class = "text-center display-8 col-1">
        <?php if(isset($_SESSION['valid_user'])):?>

                <a href="logout.php" style="color:#1160b7">LOGOUT</a>
           
                <?php else: ?>
                
                <i class="fa fa-user fa-2x"></i> <a href="index.php">LOGIN </a>
                </li>
                <?php endif; ?>
                </div>
                </div>

    </div>
