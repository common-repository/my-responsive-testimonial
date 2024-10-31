<?php 
/*
  Plugin Name: Responsive Wordpress Testimonial
  Plugin URI: http://envatobd.com/plugins/responsive-wordpress-testimonial/
  Description: Responsive Wordpresss Testimonial is an excellent Wordpress plugin to show testimonials on your Wordpress website. This responsive plugin is very lightweight, easy-to-use, and can be placed anywhere in your website using TinyMCE shortcode button. This testimonial plugin has excellent auto cycling and hovering effect with wow.js and animate.css
  Version: 1.0
  Author: Azizul Haque
  Author URI: http://envatobd.com/plugins 
 */
 
/* Register Script */ 

add_action('wp_enqueue_scripts', 'rwpt_scripts');
function rwpt_scripts() {
    global $post;
    wp_enqueue_script('jquery');
	wp_register_style('rwpt_style_css', plugins_url('/css/testimonials.css', __FILE__));
    wp_enqueue_style('rwpt_style_css');
	wp_register_style('rwpt_animate_css', plugins_url('/css/animate.css', __FILE__));
    wp_enqueue_style('rwpt_animate_css');
	wp_register_style('rwpt_fontawesome_css', plugins_url('/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('rwpt_fontawesome_css');
    wp_register_script('rwpt_localscroll_js', plugins_url('js/jquery.localScroll.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('rwpt_localscroll_js');
	wp_register_script('rwpt_js', plugins_url('js/rwpt_script.js', __FILE__));
    wp_enqueue_script('rwpt_js');
	wp_register_script('rwpt_wow_js', plugins_url('js/wow.min.js', __FILE__));
    wp_enqueue_script('rwpt_wow_js');
}
add_action('admin_enqueue_scripts', 'rwpt_admin_scripts');
function rwpt_admin_scripts() {
	wp_register_style('rwpt_admin_css', plugins_url('/css/rwpt_admin.css', __FILE__));
    wp_enqueue_style('rwpt_admin_css');
}

/* Register TinyMCE */

if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

class myTestimonial
{
	function __construct() {
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
	}
	
	function action_admin_init() {
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_buttons', array( $this, 'filter_mce_button' ) );
			add_filter( 'mce_external_plugins', array( $this, 'filter_mce_plugin' ) );
		}
	}
	
	function filter_mce_button( $buttons ) {
		// add a separation before our button, here our button's id is "rwpt_button"
		array_push( $buttons, '|', 'rwpt_button' );
		return $buttons;
	}
	
	function filter_mce_plugin( $plugins ) {
		// this plugin file will work the magic of our button
		$plugins['rwpt_button'] = plugin_dir_url( __FILE__ ) . 'tinymce/rwpt_tinymce.js';
		return $plugins;
	}
}

$myTestimonial = new myTestimonial();

/* Register Testimonial Post Type */

function rwpt_post_function() {

	$labels = array(
		'name'                => 'Awesome Testimonial',
		'singular_name'       => 'Testimonial',
		'menu_name'           => 'My Testimonials',
		'parent_item_colon'   => 'Parent Testimonial Item:',
		'all_items'           => 'All Testimonials',
		'view_item'           => 'View Testimonial Item',
		'add_new_item'        => 'Add New Testimonial',
		'add_new'             => 'Add New Testimonial',
		'edit_item'           => 'Edit Testimonial',
		'update_item'         => 'Update Testimonial',
		'search_items'        => 'Search Testimonial',
		'not_found'           => 'No Testimonial found',
		'not_found_in_trash'  => 'No Testimonial found in Trash',
	);
	$args = array(
		'label'               => 'testimonial',
		'description'         => 'Add New Testimonial',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 90,
		'menu_icon'           => plugins_url('tinymce/icon.png', __FILE__),
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'rwpt_custom_post', $args );

}

add_action( 'init', 'rwpt_post_function', 0 );

/* Disable Rich Editor*/

add_filter( 'user_can_richedit', 'rwpt_richedit_disable');

function rwpt_richedit_disable($c) {
    global $post_type;
    if ('rwpt_custom_post' == $post_type)
        return false;
    return $c;
}

/* Remove Media Button */

add_action('admin_head', 'rwpt_mediabuttons_remove');

function rwpt_mediabuttons_remove()
{
    global $post;
    if($post->post_type == 'rwpt_custom_post' && current_user_can('edit_post') )
    {
        remove_action( 'media_buttons', 'media_buttons' );
    }
}

/* Adding Metaboxes */

add_action( 'add_meta_boxes', 'add_rwpt_metaboxes' );

function add_rwpt_metaboxes() {
	add_meta_box('rwpt_custom_post', 'Client\'s Info', 'rwpt_metabox_function', 'rwpt_custom_post', 'normal', 'default');
}

function rwpt_metabox_function() {
	global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="wpcpmeta_noncename" id="wpcpmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the location data if its already been entered
	
	$client = get_post_meta($post->ID, 'client_name', true);
	$client_info = get_post_meta($post->ID, 'client_info', true);
	$link_website = get_post_meta($post->ID, 'link_website', true);
	$social_fb = get_post_meta($post->ID, 'social_fb', true);
	$social_ln = get_post_meta($post->ID, 'social_ln', true);
	$social_tw = get_post_meta($post->ID, 'social_tw', true);
	$social_gp = get_post_meta($post->ID, 'social_gp', true);
	
	// Echo out the field
?>
	
	<div class="rwpt_metaboxes">
	
		<!-- # Client's Name  ------------------->
		<div id="client_info">
			<p class="label">Client's Name:</p>
			<p class="input">
				<input type="text" name="client_name" value="<?php echo $client; ?>" class="client" />
			</p>
		</div>
		<!-- # Client's Info ------------------->
		<div id="client_info">
			<p class="label">Client's Company:</p>
			<p class="input">
				<input type="text" name="client_info" value="<?php echo $client_info; ?>" class="client_info" />
			</p>
		</div>
		<!-- # Social Media Website ------------------->
		<div id="client_info">
			<p class="label">Website Link:</p>
			<p class="input">
				<input type="url" name="link_website" value="<?php echo $link_website; ?>" class="link_website" />
			</p>
		</div>
		<!-- # Social Media Facebook ------------------->
		<div id="client_info">
			<p class="label">Facebook Profile:</p>
			<p class="input">
				<input type="url" name="social_fb" value="<?php echo $social_fb; ?>" class="social_fb" />
			</p>
		</div>
		<!-- # Social Media Linked ------------------->
		<div id="client_info">
			<p class="label">LinkedIn Profile:</p>
			<p class="input">
				<input type="url" name="social_ln" value="<?php echo $social_ln; ?>" class="social_ln" />
			</p>
		</div>
		<!-- # Social Media Twitter ------------------->
		<div id="client_info">
			<p class="label">Twitter Profile:</p>
			<p class="input">
				<input type="url" name="social_tw" value="<?php echo $social_tw; ?>" class="social_tw" />
			</p>
		</div>
		<!-- # Social Media Google Plus ------------------->
		<div id="client_info">
			<p class="label">Google Plus Profile:</p>
			<p class="input">
				<input type="url" name="social_gp" value="<?php echo $social_gp; ?>" class="social_gp" />
			</p>
		</div>
		
	</div>

<?php
}

// Save the Metabox Data

add_action('save_post', 'rwpt_save__meta', 1, 2);

function rwpt_save__meta($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['wpcpmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}
	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$rwpt_meta['client_name'] = $_POST['client_name'];
	$rwpt_meta['client_info'] = $_POST['client_info']; 
	$rwpt_meta['link_website'] = $_POST['link_website']; 
	$rwpt_meta['social_fb'] = $_POST['social_fb']; 
	$rwpt_meta['social_ln'] = $_POST['social_ln']; 
	$rwpt_meta['social_tw'] = $_POST['social_tw']; 
	$rwpt_meta['social_gp'] = $_POST['social_gp']; 
	
	// Add values of $events_meta as custom fields
	foreach ($rwpt_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}

/* Show columns in list view */

add_filter('manage_edit-rwpt_custom_post_columns', 'add_new_rwpt_columns');
function add_new_rwpt_columns($rwpt_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('<b>Testimonial Title</b>', 'column name');
	$new_columns['client_face'] = _x('<b>Client Face</b>', 'column name');
	$new_columns['client_name'] = __('<b>Client\'s Name</b>');
	$new_columns['company'] = __('<b>Company</b>');
	$new_columns['date'] = _x('<b>Date</b>', 'column name');
	return $new_columns;
}

/*
 * ADMIN COLUMN - CONTENT
 */
 
add_action('manage_rwpt_custom_post_posts_custom_column', 'manage_concerts_columns', 10, 2);
function manage_concerts_columns($column_name, $id) {
	global $post;
	switch ($column_name) {
		case 'client_face':
		if ( has_post_thumbnail() ) {
			echo the_post_thumbnail( 'thumbnail' );
			} else {
			$template= plugins_url();
			echo '<img src="'.$template.'/responsive-wordpress-testimonial/img/default_client_img.png" height="80" width="80" />';
			}
			break;

		case 'client_name':
			echo get_post_meta( $post->ID , 'client_name' , true );
			break;
		case 'company':
			echo get_post_meta( $post->ID , 'client_info' , true );
			break;
		default:
			break;
	}
}

/*------------------------------------------------------------------------------------
	remove quick view for link
------------------------------------------------------------------------------------*/

add_filter( 'post_row_actions', 'remove_row_actions', 10, 2 );
function remove_row_actions( $actions, $post )
{
  global $current_screen;
	if( $current_screen->post_type != 'rwpt_custom_post' ) return $actions;
	// unset( $actions['edit'] );
	unset( $actions['view'] );
	// unset( $actions['trash'] );
	unset( $actions['inline hide-if-no-js'] );
	//$actions['inline hide-if-no-js'] .= __( 'Quick&nbsp;Edit' );

	return $actions;
}

/* Register Shortcode */

function testimonial_shortcode($atts, $content = null) {
   extract(shortcode_atts(array(
	  'heading' => 'What Our Clients Are Saying?',
	  'header_bg' => '#3498db',
	  'hd_color' => '#FFF',
	  'hd_size' => '40px',
	  'quote_color' => '#FFF',
	  'rwpt_bg' => '#34495e',
	  'quote_style' => 'bounceInLeft',
	  'client_color' => '#FFF',
	  'company_color' => '#666',
	  'client_info_bg' => '#f39c12',
	  'client_info_style' => 'bounceInRight',
	  'icon_color' => '#3498DB',
	  'iconhover_color' => '#9ED750',
	  'imgrotate' => '0',
	  'imground' => '0',
	  'img_border' => '0px solid #eee',
	  'img_style' => 'bounceInRight',
	  
   ), $atts));
   
   $return_string = '<style>
	   .rwpt_testimonials {
		background-color: '.$header_bg.';
		-webkit-animation: slideInRight 2s;
		}
		.rwpt_testimonials h3 {
		color: '.$hd_color.' !important;
		font-size: '.$hd_size.' !important;
		}
		.rwpt_testimonials .rwpt_container {
		background-color: '.$rwpt_bg.';
		}
		.rwpt_testimonials .rwpt_quotes ul li p {
		color: '.$quote_color.' !important;
		}
		.rwpt_testimonials .rwpt_photos .rwpt_author:before {
		border-color: transparent transparent transparent '.$rwpt_bg.';
		}
		.rwpt_testimonials .rwpt_photos .rwpt_author {
		background-color: '.$client_info_bg.';
		color: '.$client_color.';
		}
		.rwpt_testimonials .rwpt_photos .rwpt_author span.company {
		color: '.$company_color.';
		}
		.rwpt_testimonials .rwpt_photos ul li img {
		border-radius: '.$imground.'%;
		border: '.$img_border.';
		}
		.rwpt_testimonials .rwpt_photos ul li.active a img {
			    -ms-transform: rotate('.$imgrotate.'deg); /* IE 9 */
			-webkit-transform: rotate('.$imgrotate.'deg); /* Chrome, Safari, Opera */
		    transform: rotate('.$imgrotate.'deg); /* Standard syntax */ 
			-webkit-animation: '.$img_style.' 2s;
			animation: '.$img_style.' 2s;
			border-radius: '.$imground.';
			border: '.$img_border.';
		}
		.rwpt_testimonials .rwpt_quotes ul li.active {
			-webkit-animation: '.$quote_style.' 2s;
			animation: '.$quote_style.' 2s;
		}
		.rwpt_testimonials .rwpt_author p.active {
			-webkit-animation: '.$client_info_style.' 2s;
			animation: '.$client_info_style.' 2s;
		}
		.rwpt_testimonials .rwpt_author p span.social_icons a {
		color:'.$icon_color.';
		}
		.rwpt_testimonials .rwpt_author p span.social_icons a:hover {
		color:'.$iconhover_color.';
		}
		@media only screen and (max-width: 1139px) {
			.rwpt_testimonials .rwpt_photos .rwpt_author:before{
				border-color: transparent transparent '.$rwpt_bg.' transparent;
			}
		}
   </style>';
   $return_string .= '<div class="rwpt_testimonials"><div class="rwpt_wrap">';
   $return_string .= '<h3>'.$heading.'</h3>';
   $return_string .= '<div class="rwpt_container"><div class="rwpt_photos"><ul class="rwpt_clearfix">';
   
   query_posts(array( 'post_type' => 'rwpt_custom_post', 'orderby' => 'date', 'order' => 'DESC' , 'showposts' => 10));
   if (have_posts()) :
      while (have_posts()) : the_post();
	global $post;
	$client = get_post_meta($post->ID, 'client_name', true);
	$client_info = get_post_meta($post->ID, 'client_info', true);
	  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'rwpt_thumb' );
	  $url = $thumb['0'];
	  $idd = get_the_ID();
	  if ( has_post_thumbnail() ) {
			$return_string .= '<li><a href="#"><img src="'.$url.'" alt="'.$client.' - '.$client_info.'" /></a></li>';
		} else {
		$template= plugins_url();
		$return_string .= '<li><a href="#"><img src="'.$template.'/responsive-wordpress-testimonial/img/default_client_img.png" alt="'.$client.' - '.$client_info.'" /></a></li>';
		}
      endwhile;
   endif;
   $return_string .= '</ul>';
   $return_string .= do_shortcode($content);
   $return_string .= '</div></div></div>';
   
   wp_reset_query();
   return $return_string;
}
add_shortcode('testimonial', 'testimonial_shortcode');

function testimonial_author_shortcode(){
    global $post;
    $q = new WP_Query(
        array('posts_per_page' => 10, 'post_type' => 'rwpt_custom_post')
        );
    $list = '<div class="rwpt_author">';
    while($q->have_posts()) : $q->the_post();
	global $post;
		$client = get_post_meta($post->ID, 'client_name', true);
		$client_info = get_post_meta($post->ID, 'client_info', true);
		$link_website = get_post_meta($post->ID, 'link_website', true);
		$social_fb = get_post_meta($post->ID, 'social_fb', true);
		$social_ln = get_post_meta($post->ID, 'social_ln', true);
		$social_tw = get_post_meta($post->ID, 'social_tw', true);
		$social_gp = get_post_meta($post->ID, 'social_gp', true);
		$idd = get_the_ID();
		$list .= '<p class="clients_info"><span class="cl_name">'.$client.' - <span class="company"> '.$client_info.' </span></span><span class="social_icons">';
		if($link_website) {
			$list .= '<a href="'.$link_website.'" target="_blank"><i class="fa fa-globe"></i></a>';
		}
		if($social_fb) {
			$list .= '<a href="'.$social_fb.'" target="_blank"><i class="fa fa-facebook-square"></i></a>';
		}
		if($social_ln) {
			$list .= '<a href="'.$social_ln.'" target="_blank"><i class="fa fa-linkedin-square"></i></a>';
		}
		if($social_tw) {
			$list .= '<a href="'.$social_tw.'" target="_blank"><i class="fa fa-twitter-square"></i></a>';
		}
		if($social_gp) {
			$list .= '<a href="'.$social_gp.'" target="_blank"><i class="fa fa-google-plus-square"></i></a>';
		}
		$list .= '</span></p>';      
    endwhile;
	$list .= '</div></div>';  
    wp_reset_query();
    return $list;
}

add_shortcode('client_info', 'testimonial_author_shortcode');

function testimonial_text_shortcode(){
    global $post;
    $q = new WP_Query(
        array('posts_per_page' => 10, 'post_type' => 'rwpt_custom_post')
        );
    $list = '<div class="rwpt_quotes"><ul>';
    while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
        $list .= '<li><p>'.get_the_content().'</p></li>';        
    endwhile;
    $list .= '</ul></div>';
    wp_reset_query();
    return $list;
}

add_shortcode('rwpt_quote', 'testimonial_text_shortcode');

?>