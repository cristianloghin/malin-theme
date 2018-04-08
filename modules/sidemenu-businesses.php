<?php
	function get_item_class($name)
	{

		$address = $_SERVER['REQUEST_URI'];
		$address = str_replace('/businesses/', '', $address);
		$address = str_replace('/', '', $address);
		
		if ($name == $address)
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
	<ul>
		<?php
			$args = array(
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
				'post_type' => 'business'
			);
			$businesses = get_posts($args);
			$item_id = 1;
			foreach ($businesses as $business)
			{
				echo '<li' . get_item_class( $business->post_name ) . ' id="tab-' . $item_id . '"><a href="/businesses/' . $business->post_name . '">' .$business->post_title. '</a></li>';
				$item_id++;
			}
		?>
	</ul>
</div>