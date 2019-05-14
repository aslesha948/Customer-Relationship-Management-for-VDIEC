    <nav class="container navbar navbar-expand-lg bg-dark navbar-dark" style="border-radius: 5px; font-family: 'Permanent Marker', cursive;">
	<a class="navbar-brand" href="https://www.vdiec.com"><img src="images/logo.png" alt="logo" style="width:90px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <!-- md-auto: left, ml-auto: right, mx-auto: center -->
            <ul class="navbar-nav md-auto">
                <li class="nav-item"><a class="nav-link" id="0" onClick="nav_item_selected(0)" href="index.php">My Dashboard</a></li>
				<li class="nav-item">
                    <a class="nav-link" href="admin.php" id="1" onClick="nav_item_selected(1)">Admin Management</a>
                </li>
				
                <li class="nav-item">
                    <a class="nav-link" href="lead.php" id="2" onClick="nav_item_selected(3)">Lead Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calling.php" id="3" onClick="nav_item_selected(3)">Calling Management</a>
                </li>
                
				<<?php if(isset($_SESSION['valid_user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" id="4" onClick="nav_item_selected(4)">Sign-out</a>
                </li>

                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" id="4" onClick="nav_item_selected(4)">Sign-in</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
		
    </nav>

