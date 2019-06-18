<?php

//Removes admin bar from TOP
show_admin_bar( false );

/***  LOAD SCRIPTS  ****/
function theme_enqueue_scripts() {
	
	$template_url = get_template_directory_uri();

	//jQuery.
	wp_enqueue_script( 'jquery' );	
	//De-register WP Jquery and use latest from CDN
	//wp_deregister_script('jquery');
	//wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', false, '3.2.1');
	//wp_enqueue_script('jquery');
	
	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	//CSS
	wp_enqueue_style( 'swiper-css','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css' );	
	wp_enqueue_style( 'fontawesome-5', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
    wp_enqueue_style( 'fancybox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css' );	
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@next/dist/aos.css' );
	wp_enqueue_style( 'burger-menu', $template_url . '/css/burger_menu.css' );
	wp_enqueue_style( 'media_query', $template_url . '/css/media_query.css' );
	
    //JS
	wp_enqueue_script( 'fancybox-script', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js', array( 'jquery' ), null, false );
	wp_enqueue_script( 'nicescroll-js',  $template_url .'/js/jquery.nicescroll.min.js', array( 'jquery' ), null, true );	
	wp_enqueue_script( 'sticky-header', $template_url . '/js/sticky.header.js', array( 'jquery' ), null, true );		
	wp_enqueue_script( 'swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array( 'jquery' ), null, true );	
	wp_enqueue_script( 'custom-gmap', $template_url . '/js/custom-gmap.js', array( 'jquery' ), null, true );	
	wp_enqueue_script( 'custom-script', $template_url . '/js/custom.js', array( 'jquery' ), null, true );	
	


}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 1 );

/* Load css in admin area
function admin_screen_css() { 

    $template_url = get_template_directory_uri();
	wp_enqueue_style( 'admin-css', $template_url . '/css/admin.css' );

}
add_action( 'admin_head', 'admin_screen_css', 1 );
*/

//Add thumbnail, automatic feed links and title tag support
//add_theme_support( 'post-thumbnails' );
//add_theme_support( 'automatic-feed-links' );
//add_theme_support( 'title-tag' );
//add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
//add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
//add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode





/*  REGISTER MENU  */
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'main_menu' => 'Main Menu',
		  'mobile_menu' => 'Mobile Menu',
		  'footer_menu' => 'Footer Menu'
  		)
  	);
}

class Main_Menu_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

class Mobile_Main_Menu_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='mobile-sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

/*
add_action( 'init', 'register_cpt_projekte' );
//REGISTER CPT Projekte
function register_cpt_projekte() {
	$labels = array(
		'name'               => _x( 'Projekte', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Projekte', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Projekte', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Projekte', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'New Projekte', '', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'New Projekte', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Projekte', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Projekte', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Projekte', 'your-plugin-textdomain' ),
		'all_items'          => __( 'View All Projekte', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Projekte', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Projekte:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Projekte', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Projekte)', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projekte' ),	
		//'capabilities' => array(
		//'read_post'					=> 'read_foo',
		//'read_private_posts' 		=> 'read_private_foos',
		//'edit_post'					=> 'edit_foo',
		//'edit_posts'				=> 'edit_foos',
		//'edit_others_posts'			=> 'edit_others_foos',
		//'edit_published_posts'		=> 'edit_published_foos',
		//'edit_private_posts'		=> 'edit_private_foos',
		//'delete_post'				=> 'delete_student_foo',
		//'delete_posts'				=> 'delete_foos',
		//'delete_others_posts'		=> 'delete_others_foos',
		//'delete_published_posts'	=> 'delete_published_foos',
		//'delete_private_posts'		=> 'delete_private_foos',
		//'publish_posts'				=> 'publish_foos',
		//), 
	    //'map_meta_cap' =>      true,				
		//'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-home',
		'show_in_rest'       => true,
        'rest_base'          => 'projekte',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports'           => array( 'title','thumbnail')
	);	

	register_post_type( 'projekte', $args );    
	flush_rewrite_rules();
}
*/

/* ALLOW SVG FILES */
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );


//GOOGLE MAP INIT. initMap is a js function name from custom-gmap.js
add_action('wp_head', 'wpb_add_googlemap');
function wpb_add_googlemap() { 
 echo ' <script src="https://maps.googleapis.com/maps/api/js?key=GOOGLEAPIKEY&callback=initMap" async defer></script>';

}

//GOOGLE ANALYTICS
add_action('wp_head', 'wpb_add_googleanalytics');
function wpb_add_googleanalytics() { 
 echo '<script async src="https://www.googletagmanager.com/gtag/js?id=ANALITYCSID"></script>';
 echo '<script>';
 echo ' window.dataLayer = window.dataLayer || [];';
 echo ' function gtag(){dataLayer.push(arguments)};';
 echo " gtag('js', new Date());";
 echo " gtag('config', 'ANALITYCSID', { 'anonymize_ip': true });";
 echo '</script>';
}


//DEFER SOME SCRIPTS TO LOAD AT BOTTOM AND LEAVE BANWIDTH FOR LOADING 
/*
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('nicescroll','scroll-reveal','swiper-js', 'custom-script','materialize-js','aos-js');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
*/



//REDIRECTS IF NEEDED
//Remove direct access to some products, because they can be sold only in bundle
/*
function custom_restricts() {
	global $post;	
	$page_id = $post->ID;	
	     
    if( $page_id == 2337 )
    {
        wp_redirect( '/' );
        die;
    }    
}
add_action( 'template_redirect', 'custom_restricts' );
*/