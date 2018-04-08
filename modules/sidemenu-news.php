<?php
	function get_item_class($id)
	{
		global $post;
		$page_id = $post->ID;

		if ( $post->post_type == 'news' )
		{
			if ($id == 31)
			{
				return ' class= "item active"';
			}
			else
			{
				return ' class="item"';
			}
		}
		else
		{
			if ($id == $page_id)
			{
				return ' class= "item active"';
			}
			else
			{
				return ' class="item"';
			}
		}
	}
?>
	<div class="sidebar">
		<h2>In this section</h2>
<?php
	$args = array(
		'sort_column' => 'menu_order',
		'hierarchical' => 0,
		'parent' => 13
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