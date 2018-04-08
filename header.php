<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title>
		<?php
			if(is_front_page())
			{
				echo 'Welcome - ';
				bloginfo('name'); 
			}
			else
			{
				bloginfo('name');
				wp_title();
			}
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Source Design Consultants">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/unslider.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
	
	<?php wp_head(); ?>

</head>
<body <?php custom_body_class(); ?>>
	<div class="page_wrapper"><!-- page wrapper -->
	<header>
		<div class="wrapper"><!-- Wrapper -->
		<div class="container"><!-- Container -->
			
			<?php get_template_part( 'modules/shareprice'); ?>

		
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span></span>
				</a>
			</div>
			<!-- MAIN MENU -->
			<div class="main_menu">
				<div class="open_menu">
					<div>
						<span>Menu</span>
						<span class="icon-menu"></span>
					</div>
				</div>
				<ul>
			<?php

				function get_menu_class($id) {
					
					global $post;
					$page_id = $post->ID; // get the current page id
    				$page_parent_id = wp_get_post_parent_id($page_id); // get the current page parent id

    				if ( $page_parent_id != 0 )
					{
						if ( $id == $page_parent_id )
						{
							return ' class="item active"';
						}
						else
						{
							return ' class="item"';
						}
					}
					else
					{
						if ( $post->post_type == 'page' )
						{
							if ( $id == $page_id ) 
							{
								return ' class="item active"';
							}
							else
							{
								return ' class="item"';
							}
						}
						else if( $post->post_type == 'business' )
						{
							if( $id == 11 )
							{
								return ' class="item active"';
							}
							else
							{
								return ' class="item"';
							}
						}
						else
						{
							if( $id == 13 )
							{
								return ' class="item active"';
							}
							else
							{
								return ' class="item"';
							}
						}
					}
				}

				// Main menu top level pages
				
				$args = array(
					'sort_column' => 'menu_order',
					'parent' => 0
				);
				$pages = get_pages($args);
				
				foreach($pages as $key => $item)
				{
					$args = array(
						'sort_column' => 'menu_order',
						'hierarchical' => 0,
						'parent' => $item->ID
					);
					
					$children = get_pages($args);



					$class = get_menu_class( $item->ID );
					
					if ( count($children) > 0 || $item->post_name == 'businesses' )
					{
						echo '<li'. $class .'><span class="submenu_toggle" id="smenu-' . $key . '">' . $item->post_title . '<span class="icon-down-dir"></span></span>';
					}
					else if ( $item->post_name != 'search' )
					{
						echo '<li'. $class .'><a href="' . get_permalink( $item->ID ) . '">' . $item->post_title . '</a></li>';
					}

					// make submenus
					if ( count($children) > 0 && $item->post_name != 'businesses' )
					{
						echo '<ul id="submenu-' . $item->post_name . '">';
						foreach ($children as $child)
						{
							echo '<li><a href="'. get_permalink( $child->ID ) .'">' . $child->post_title . '</a></li>';
						}
						echo '</ul></li>';
					}
					else if ( $item->post_name == 'businesses' )
					{
						echo '<ul id="submenu-' . $item->post_name . '">';
						$args = array(
							'posts_per_page' => -1,
							'orderby' => 'title',
							'order' => 'ASC',
							'post_type' => 'business'
						);
						$businesses = get_posts($args);
						foreach ($businesses as $business)
						{
							echo '<li><a href="/businesses/' . $business->post_name . '">' .$business->post_title. '</a></li>';
						}
						echo '</ul></li>';
					}
				}

			?>
					<li><!-- Search Form -->		
						<?php get_search_form(); ?>
					</li>
				</ul>
			</div><!-- #MAIN MENU -->		
		</div><!-- #Container -->
		</div><!-- #Wrapper -->
	</header>
	<div class="page_container"><!-- OPEN THE PAGE CONTAINER -->

