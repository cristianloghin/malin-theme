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
			'parent' => 9
		);
		$pages = get_pages($args);
		foreach ($pages as $page) {
			$link = get_permalink( $page->ID );
		?>
			<li<?php get_item_class( $page->ID ); ?>>
				<a href="<?php echo $link; ?>"><?php echo $page->post_title; ?></a>
			</li>
		<?php
		}
		?>
	</ul>
</div>