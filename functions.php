<?php

//REMOVES ADMIN TOP FROM FRONT
show_admin_bar( false );

//REMOVES WELCOME DASH PANEL
remove_action('welcome_panel', 'wp_welcome_panel');

//DISABLE XML-RPC	
add_filter('xmlrpc_enabled', '__return_false');

//REMOVE QUERY STRING FOR STATIC FILES
function remove_cssjs_ver( $src ) {
if( strpos( $src, '?ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


/* REMOVE TAHANK YOU NOTIFICATION FROM DASHBOARD */
 function remove_footer_admin (){
    echo '<span id="footer-thankyou">Developed by <a href="https://oompa.de" target="_blank">Andrija Nikolic</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* REMOVE VERSION FROM DASHBOARD */
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' );

/* CUSTOM ADMIN LOGIN LOGO */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
		background-size: 100% 100%;
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );




//REDIRECT ADMIN LOGO TO HOME
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return esc_url( home_url( '/' ) );
}

//REMOVE WP VERSION
function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version');


/* HIDE WP UPDATE */
function hide_update_notice_to_all_but_admin() {
    if ( !current_user_can( 'update_core' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin', 1 );


/* REMOVE WP EMOJI SCRIPT */
function ah_disable_emoji_dequeue_script() {
    wp_dequeue_script( 'emoji' );   
}
add_action( 'wp_print_scripts', 'ah_disable_emoji_dequeue_script', 100 );
  

/* REMOVE HEAD LINKS */
add_action('init', 'ah_remheadlink');
function ah_remheadlink()
	{
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	//remove_action('wp_head', 'feed_links', 2);
	//remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'wp_shortlink_header', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	}  


/* ALLOW SVG FILES */
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

/* REMOVE DASHBOARD WIDGETS */
/*
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //*remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        //*remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        //*remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );
*/

/* DISABLE GUTENBERG */
add_filter('use_block_editor_for_post', '__return_false');



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
//DISPLAY IT INSIDE TEMPLATE
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


//GOOGLE MAP INIT. initMap is a js function name from custom-gmap.js
/*add_action('wp_head', 'wpb_add_googlemap');
function wpb_add_googlemap() { 
 echo ' <script src="https://maps.googleapis.com/maps/api/js?key=GOOGLEAPIKEY&callback=initMap" async defer></script>';

}

//GOOGLE API KEY FOR ACF MAP
function my_acf_google_map_api( $api ){	
	$api['key'] = '';	
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


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
*/

//DEFER SOME SCRIPTS TO LOAD AT BOTTOM AND LEAVE BANWIDTH FOR LOADING 
/*
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2
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


/* AUTO ASSIGN ALT TITLE TO MEDIA UPON UPLOAD */
function dcwd_title_to_words( $title ) {
	// Sanitize the title:  remove hyphens, underscores & extra spaces:
	$title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $title );
	// Sanitize the title:  capitalize first letter of every word (other letters lower case):
	$title = ucwords( strtolower( $title ) );
	return $title;
}
// Copied from: https://brutalbusiness.com/automatically-set-the-wordpress-image-title-alt-text-other-meta/
add_action( 'add_attachment', 'dcwd_set_image_meta_upon_image_upload' );
function dcwd_set_image_meta_upon_image_upload( $post_ID ) {
	// Check if uploaded file is an image, else do nothing
	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		$my_image_title = dcwd_title_to_words( $my_image_title );
		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID' => $post_ID,			// Specify the image (ID) to be updated
			'post_title' => $my_image_title,		// Set image Title to sanitized title
			// Damien: Omit setting the caption as I rarely use captions when I insert images.
			//'post_excerpt' => $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content' => $my_image_title,		// Set image Description (Content) to sanitized title
		);
		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );
		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );
	} 
}
// Enhanced version of: https://wordpress.org/plugins/automatic-image-alt-attributes/
add_filter('image_send_to_editor', 'dcwd_auto_alt_fix_1', 10, 2);
function dcwd_auto_alt_fix_1($html, $id) {
	$image_title = get_the_title( $id );
	$image_title = dcwd_title_to_words( $image_title );
	return str_replace('alt=""','alt="' . $image_title . '"',$html);
}
add_filter('wp_get_attachment_image_attributes', 'dcwd_auto_alt_fix_2', 10, 2);
function dcwd_auto_alt_fix_2($attributes, $attachment){
	if ( !isset( $attributes['alt'] ) || '' === $attributes['alt'] ) {
		$attributes['alt'] = dcwd_title_to_words( get_the_title( $attachment->ID ) );
	}
	return $attributes;
}
// From: https://mekshq.com/change-image-alt-tag-in-wordpress/
/* Replace alt attribute of post thumbnail with post title */
add_filter( 'post_thumbnail_html', 'meks_post_thumbnail_alt_change', 10, 5 );
function meks_post_thumbnail_alt_change( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
 
	$post_title = get_the_title();
	$html = preg_replace( '/(alt=")(.*?)(")/i', '$1'.esc_attr( $post_title ).'$3', $html );
 
	return $html;
 
}

/* AVOID SPECIAL CHARACTERS FOR MEDIA ON UPLOAD */
function wpartisan_sanitize_file_name( $filename ) {
 
    $sanitized_filename = remove_accents( $filename ); // Convert to ASCII
 
    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );
    $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
 
    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
 
    return $sanitized_filename;
}
 
add_filter( 'sanitize_file_name', 'wpartisan_sanitize_file_name', 10, 1 );

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


/* DISABLE LOGIN BY EMAIL */
remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );


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


/* IF NEEDED CRATE ADMIN USER */
/*
function wpb_admin_account(){
$user = 'Username';
$pass = 'Password';
$email = 'email@domain.com';
if ( !username_exists( $user )  && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','wpb_admin_account');
*/



/* REMOVES COMMENTS */
 
// Removes from admin menu

function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'my_remove_admin_menus' );

// Removes from post and pages
function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'remove_comment_support', 100 );

// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    
    $wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );



/* DISABLE JSON REST API */

add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');


/* DISABLE JQUERY MIGRATE */
add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});