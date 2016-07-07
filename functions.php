<?php
/*
  Custom functions designed specifically for Bare Responsive theme.
  Feel free to add your own dynamic functions, or clear out this file entirely.
  
*/

register_nav_menus( array( 'header-menu' => 'Header Menu' ) );

/**
 * Setting up theme support
 *
 */
add_theme_support( 'post-thumbnails' ); 

/**
 * Setting up custom sidebars
 *
 */
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'Responsive Sidebar',
		'id' => 'responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
}

/**
 * Customize the 'Read More' link text
 *
 */
function custom_more_link( $link, $link_text ) {
     return str_replace( $link_text, 'Read More...', $link);
}
add_filter( 'the_content_more_link', 'custom_more_link', 10, 2 );


/**
 * Remove the hash(#) from all 'Read More' links
 *
 */
function remove_more_jump($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump');



/**
 * Start theme options
 *
 */

if (get_option('2303_theme_options')) {
	$theme_options = get_option('2303_theme_options');
} else {
	add_option('2303_theme_options', array (
		'footer_text' => 'Creative with Design'
	));
	$theme_options = get_option('2303_theme_options');
}

add_action('admin_menu', 'theme_page_add');
function theme_page_add() {
	add_submenu_page('index.php', 'My Theme Options', 'Theme Options', 8, 'themeoptions', 'theme_page_options');
}

function theme_page_options() {

	echo '<h2>Theme Options</h2>';
	global $theme_options;

	echo '<div class="container">';
	echo '<p>Customize your theme options here.</p>';

	?>
	<form action="index.php?page=themeoptions" method="post">
		<label for="footer-text">Footer Text: </label><input name="footer_text" id="footer_text" value"<?php echo theme_options['footer_text'];?>" /><br /><br />
		<input type="submit" value="Update" name="submit" />
	</form>
	<?php

	echo '</div>';
}

 ?>