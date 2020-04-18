	<header class="nav-down">
			<div class="container">
				<div class="header-container">

						  <div class="logo">
							<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""></img></a>
						  </div>
						  <div class="burger"> <span></span></div>
							<nav>
							  <ul class="main-menu-list">
							  <div>
								<?php wp_nav_menu(array(
											'theme_location'   => 'main_menu',
											'walker' => new Main_Menu_Sublevel_Walker(),
											'container_class' => 'main-menu'
								)); ?>
							  </div>
							  </ul>
							</nav>
              <!--  If needed to set mobile menu with multiple sub levels. Currently set to display none
							<div class="mobile-menu-list">
								<?php wp_nav_menu(array(
											'theme_location'   => 'mobile_menu',
											'walker' => new Mobile_Main_Menu_Sublevel_Walker()
								)); ?>
							</div>
						-->

							<div class="overlay"></div>
				</div>
			</div>
	</header>
