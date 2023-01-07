<?php

function adminNavbar($activePersonelINFO){
	
	$navbar = '
      <div class="top_nav">
      <div class="nav_menu">
          <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="logout.php">
            <button type="button" class="btn btn-primary">Çıkış Yap <i class="fas fa-sign-out-alt" style="font-size:15px;color:white"></i></button>
            </a>
          </li>
        </ul>
          </nav>
        </div>
      </div>
	';
	
	echo $navbar;	
}

?>