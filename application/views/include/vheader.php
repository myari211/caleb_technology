<div id="header" class="nav-up">
		   <div id="tophead" class="top-header">
			<div class="custom-container">
			  <div class="top-header-contact">
				<div class="icon-container">
				  <!--               ICON-MAIL-->
				  <div class="icon icon-mail">
					  <img src="<?php echo IMG_BASE_URL; ?>/icon/mail-.png"/>
				  </div>
				  <div class="icon-text">
					<span>admin@caleb-technology.com</span>
				  </div>
				</div>

				<div class="icon-container icon-container-phone">
				  <!--               ICON-PHONE-->
				  <div class="icon icon-phone">
					<img src="<?php echo IMG_BASE_URL; ?>/icon/phone-.png"/>
				  </div>
				  <div class="icon-text">
					<span>+6221 2928 5708</span>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <!-- MENU -->
		  <div class="container-fluid menu-container">
			<div class="custom-container">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed mobile-menu" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				  <!-- <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span> -->
				  <span>MENU</span>
				</button>
				<a class="navbar-left logo-container" href="<?php echo BASE_URL;?>/">
                                    <img src="<?php echo IMG_BASE_URL; ?>/logo.png" class="logo" height="100"/>
				</a>
			  </div>

			  <div id="navbar" class="navbar-collapse collapse menu-list">
				<ul class="nav navbar-nav navbar-right">
									<li><a class="<?php if(strtolower($controller) == 'home' ) { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>">HOME <span class="sr-only">(current)</span></a></li>                                    <li><a class="<?php if(strtolower($controller) == 'about') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/about">ABOUT</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'material') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/material">MATERIAL</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'projects') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/projects">PROJECTS</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'training') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/training">TRAINING</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'services') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/services">SERVICE</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'career') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/career">CAREER</a></li>                                    <li><a class="<?php if(strtolower($controller) == 'contact') { echo 'menu-active';} ?>" href="<?php echo BASE_URL;?>/contact">CONTACT</a></li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div>
		  </div>
	</div>