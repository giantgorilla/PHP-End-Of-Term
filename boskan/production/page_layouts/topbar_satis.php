<?php

function topBar($activeUserINFO){
	
  if(!$activeUserINFO)
  {
	$topBar = '
  <div class="top_nav">
  <div class="nav_menu">
    <ul class=" navbar-right">
        <li>
          <a href="login.php">
        <button type="button" class="btn btn-dark"><i class="fas fa-sign-in-alt	" style="font-size:15px;color:white"></i> Giriş Yap </button>
        </a>
        </li>
    </ul>
  </div>
  </div>
	          ';
  }
  else
  {
  $topBar = '
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
  }
  

	echo $topBar;	
}

?>