<?php


/*-----------------------------------------------------------
    Custom Walker Function that strips out all the
	unnecessary classes and ID's from the menus.
-----------------------------------------------------------*/
 
class Simple_Walker extends Walker_Nav_Menu
{
	// add main/sub classes to li's and links
	function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;
	    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	  
	    foreach ($item->classes as $class)
	    {
	    	if ($class == 'menu-item-has-children') {
	    		$class_names = ' class="drop_down"';
	    	} else {
	    		$class_names = '';
	    	}
	    }

	    // build html
	    $output .= $indent . '<li' . $class_names . '>';
	  	
	  	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	  
	    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
	        $args->before,
	        $attributes,
	        $args->link_before,
	        apply_filters( 'the_title', $item->title, $item->ID ),
	        $args->link_after,
	        $args->after
	    );
	  
	    // build html
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*-----------------------------------------------------------
    Custom body class function that only
    displays the page name as an id.
-----------------------------------------------------------*/

function custom_body_class() {
	global $post;
	if ( is_page())
	{
		$id = 'page-' . $post->post_name;
	}
	else if( is_404() )
	{
		$id = 'page-404';
	}
	else
	{
		$id = 'page-' . $post->post_type;
	}
	echo 'id="' . $id . '"';
}

/*-----------------------------------------------------------
    Register theme menus.
-----------------------------------------------------------*/

function register_menus()
{
	register_nav_menu('main_menu',__( 'Main Menu' ));
}

add_action( 'init', 'register_menus' );

/*-----------------------------------------------------------
    Remove superflous code from the header
-----------------------------------------------------------*/

function remove_header_info() {
    remove_action( 'wp_head', 'rsd_link');
    remove_action( 'wp_head', 'wlwmanifest_link');
    remove_action( 'wp_head', 'wp_generator');
    remove_action( 'wp_head', 'start_post_rel_link');
    remove_action( 'wp_head', 'index_rel_link');
    remove_action( 'wp_head', 'adjacent_posts_rel_link');
    remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

add_action('init', 'remove_header_info');

/*-----------------------------------------------------------
    Remove sections from the admin menu
-----------------------------------------------------------*/

function remove_menus() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
}

if( function_exists('acf_add_options_page') )
{
	acf_add_options_page(
		array(
			'page_title' => 'Footer Settings',
			'menu_title' => 'Footer Settings',
			'menu_slug' => 'footer-settings',
			'capability' => 'edit_posts',
			'position' => '25',
			'redirect' => false,
			'icon_url' => false
		)
	);
}

add_action( 'admin_menu', 'remove_menus' );

function get_file_type($url) {
	$ext = pathinfo($url, PATHINFO_EXTENSION);
	if ( $ext == 'pdf' )
	{
		$class = 'icon-file-pdf';
	}
	else if ( $ext == 'xlsx' || $ext == 'xls' )
	{
		$class = 'icon-file-excel';	
	}
	else if ( $ext == 'docx' || $ext == 'doc' )
	{
		$class = 'icon-file-word';
	}
	else
	{
		$class = 'icon-doc-text';
	}
	return $class;
}


?>