<?php

require_once( __DIR__ . '/functions/admin.php');
require_once( __DIR__ . '/functions/optimize.php');
require_once( __DIR__ . '/functions/google.php');


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
	//wp_enqueue_script( 'custom-gmap', $template_url . '/js/custom-gmap.js', array( 'jquery' ), null, true );	
	wp_enqueue_script( 'custom-script', $template_url . '/js/custom.js', array( 'jquery' ), null, true );	
	
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 1 );


/* LOAD CSS IN ADMIN AREA
function admin_screen_css() { 

    $template_url = get_template_directory_uri();
	wp_enqueue_style( 'admin-css', $template_url . '/css/admin.css' );

}
add_action( 'admin_head', 'admin_screen_css', 1 );
*/

//POST/PAGE tnative humbnails support 
//add_theme_support( 'post-thumbnails' );
//add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
//add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
//add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode
//use it on template  the_post_thumbnail( 'sidebar-thumb' ); 



/* REGISTER MENU */
function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu' ),
      'footer_menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*EXTEND MENU WALKER CLASS */
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

//REGISTER WIDGETS AREA
//DISPLAY INSIDE TEMPLATE
/*<?php dynamic_sidebar( 'SIDEBAR_SLUG' ); ?> */

/*
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1', //SLUG
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
*/

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



/* REGISTER CUSTOM POST TYPE TAXONOMY*/
/*
add_action( 'init', 'create_referenze_taxonomy' );

function create_referenze_taxonomy() {
	register_taxonomy(
		'type',
		'referenze',
		array(
			'label' => __( 'Type' ),
			'rewrite' => array( 'slug' => 'type' ),
			'hierarchical' => true,
		)
	);
}

*/

//CHANGE CHECKBOX TO RADIO BUTTONS FOR CUSTOM TAX TERM
/*
function taxonomy_checkbox_to_radio_tax( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'TAXONOMY_SLUG' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'tax_change_checkbox_to_radio_tax' ) ) {
                class tax_change_checkbox_to_radio_tax extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }

            $args['walker'] = new tax_change_checkbox_to_radio_tax;
        }
    }

    return $args;
}

add_filter( 'wp_terms_checklist_args', 'taxonomy_checkbox_to_radio_tax' );
*/


//REDIRECTS IF NEEDED
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


//DSIPLAY TEMRS/CATEGORIES ON TMEPLATE
//<?php echo get_news_categories();
/*
function get_news_categories() {
    $args = array(
    'taxonomy'   => "CUSTOM_TAX_SLUG", //Build in product taxonomy
  //'parent'     => 0,
  //'number'     => $number,
  //'orderby'    => $orderby,
  //'order'      => $order,
    'hide_empty' => true,
    'include'    => $ids
	);
	$terms = get_terms($args);

    $filters_html = false;
 
    if( $terms ):
        $filters_html = '<ul>';
 
        foreach( $terms as $term )
        {
            $term_id = $term->term_id;
            $term_name = $term->name;
			
            $filters_html .= '<li class=""><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
       
        }
        $filters_html .= '</ul>';
 
        return $filters_html;
    endif;
}
*/

//LOADS CUSTOM TAXONOMY TEMLATE INSTEAD OF DEFAULT ARCHIVE PAGE
/*
add_filter( 'template_include', 'custom_tax_page_template', 99 );
function custom_tax_page_template( $template ) {

	if ( is_category( 'TAX_SLUG' ) ) {
		$new_template = locate_template( array( 'FILENAME.php' ) );
		if ( !empty( $new_template ) ) {
			return $new_template;
		}
	}

	return $template;
}
*/


//AUTO ASSIGN PARENT TAXONOMY TERM
/*
add_action('save_post', 'assign_parent_terms', 10, 2);
function assign_parent_terms($post_id, $post){

    if($post->post_type != 'CPT_NAME')
        return $post_id;

    // get all assigned terms   
    $terms = wp_get_post_terms($post_id, 'TAX_SLUG' );
    foreach($terms as $term){
        while($term->parent != 0 && !has_term( $term->parent, 'TAX_SLUG', $post )){
            // move upward until we get to 0 level terms
            wp_set_post_terms($post_id, array($term->parent), 'TAX_SLUG', true);
            $term = get_term($term->parent, 'TAX_SLUG');
        }
    } 
}

*/


/* AUTO COPYRIGHT DATE <?php echo wpb_copyright(); ?> */
function wpb_copyright() {
global $wpdb;
 $copyright_dates = $wpdb->get_results("
 SELECT
 YEAR(min(post_date_gmt)) AS firstdate,
 YEAR(max(post_date_gmt)) AS lastdate
 FROM
 $wpdb->posts
 WHERE
 post_status = 'publish'
 ");
    $output = '';
   if($copyright_dates) {
      $copyright = "© " . $copyright_dates[0]->firstdate;
   if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
      $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
}




/* DISABLE SEARCH FUNCTION AT ALL */
function fb_filter_query( $query, $error = true ) {
 
if ( is_search() ) {
$query->is_search = false;
$query->query_vars[s] = false;
$query->query[s] = false;
 
// to error
if ( $error == true )
$query->is_404 = true;
}
}
 
add_action( 'parse_query', 'fb_filter_query' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );





