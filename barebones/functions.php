<?php 
// The best functions evar





// TinyMCE Styles Dropdown
function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );
function themeit_tiny_mce_before_init( $settings ) {
  $settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';
  $style_formats = array(
      array( 'title' => 'Button',         'inline' => 'span',  'classes' => 'button' ),
      array( 'title' => 'Green Button',   'inline' => 'span',  'classes' => 'button button-green' ),
      array( 'title' => 'Rounded Button', 'inline' => 'span',  'classes' => 'button button-rounded' ),
      array( 'title' => 'Other Options' ),
      array( 'title' => '&frac12; Col.',      'block'    => 'div',  'classes' => 'one-half' ),
      array( 'title' => '&frac12; Col. Last', 'block'    => 'div',  'classes' => 'one-half last' ),
      array( 'title' => 'Callout Box',        'block'    => 'div',  'classes' => 'callout-box' ),
      array( 'title' => 'Highlight',          'inline'   => 'span', 'classes' => 'highlight' )
  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );





// Hide Admin Menu
function hide_admin_menu()
{
	global $current_user;
	get_currentuserinfo();
 
	if($current_user->user_login != 'admin')
	{
		echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
	}
}
 
add_action('admin_head', 'hide_admin_menu');




// WP Page Navi
// Numeric Page Navi (built into the theme by default)
function wp_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ol class="wp_page_navi clearfix">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'bonestheme' );
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="bpn-current">'.$i.'</li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'bonestheme' );
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ol></nav>'.$after."";
} /* end page navi */





/************* CUSTOM LOGIN PAGE *****************/

function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');





/************* CUSTOMIZE ADMIN *******************/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e('Site by <a href="http://greenrisingmarketing.com" target="_blank">Green Rising Marketing</a> and <a href="http://periscopecreative.com" target="_blank">Periscope Creative</a>.', 'bonestheme');
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

function remove_menus () {
global $menu;
	$restricted = array( __('Links'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

function hide_admin_menu()
{
	global $current_user;
	get_currentuserinfo();
 
	if($current_user->user_login != 'Periscope')
	{
		echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
	}
}
 
add_action('admin_head', 'hide_admin_menu');