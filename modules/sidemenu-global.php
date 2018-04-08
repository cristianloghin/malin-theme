<?php
	function get_item_class($id)
	{

		global $post;
		$page_id = $post->ID;

		if ($id == $page_id)
		{
			return ' class= "item active"';
		}
		else
		{
			return ' class="item"';
		}
	}
?>
	<div class="sidebar">
		<h2>In this section</h2>
<?php

	while ( have_posts() ) : the_post();
		
		$c_id = get_the_ID(); 
		$p_id = wp_get_post_parent_id($c_id);
	
	endwhile;
	
	$args = array(
		'sort_column' => 'menu_order',
		'hierarchical' => 0,
		'parent' => $p_id
	);
	$children = get_pages($args);
?>
	<ul>
<?php
	foreach ($children as $child)
	{
?>
		<li<?php echo get_item_class( $child->ID ); ?>>
			<a href="<?php echo get_permalink( $child->ID ); ?>"><?php echo $child->post_title; ?></a>
		</li>
<?php
	}
?>
	</ul>
	</div>