    
	<div id="banner" class="container bg-light mt-2" style="border-radius: 5px; ">
	<div class="row">
	<div class = "col-11">
        <h1 class="text-center display-2" style="font-family :'Open Sans', sans-serif ; color: #800000;">CRM for VDIEC</h1> 
        </div>
<div class = "text-center display-8 col-1">
        <?php if(isset($_SESSION['valid_user'])):?>

                <a href="logout.php" style="color:red">Log Out</a>
           
                <?php else: ?>
                
                 <a href="index.php">Log in</a>
                </li>
                <?php endif; ?>
                </div>
                </div>

    </div>
