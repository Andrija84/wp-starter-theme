<?php

    /*
		Template Name: HOME
	*/

 get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( 'nav' ); // Navigation bar (nav.php) ?>
<div class="homepage">
            <div class="container">
                 <div style="height:32px;"></div>
					       <div data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-duration="1000">
                    <h1>THIS IS WORDPRESS STARTER THEME</h1>
										<?php
										if (have_posts()) :
										   while (have_posts()) :
										      the_post();
										         the_content();
										   endwhile;
										endif;
										 ?>

                </div>
</div>
</div>
<?php	get_footer(); ?>
