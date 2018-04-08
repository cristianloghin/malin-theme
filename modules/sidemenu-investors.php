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
<div class="side_menu">
	<ul>
		<?php
		$args = array(
			'sort_column' => 'menu_order',
			'post_type' => 'page',
			'parent' => 15
		);
		$pages = get_pages($args);
		foreach ($pages as $item)
		{
			echo '<li' . get_item_class( $item->ID ) . '><a href="' . get_permalink( $item->ID ) . '">' .$item->post_title. '</a></li>';
		}
		?>
	</ul>
</div>