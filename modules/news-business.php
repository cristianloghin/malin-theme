<?php
		
	$news_args = array(
		'post_type' => 'news',
		'orderby' => 'date',
		'posts_per_page' => 1,
		'meta_query' => array(
			array(
				'key' => 'news_company',
				'value' => '"' . $business_id . '"',
				'compare' => 'LIKE'
			)
		)
	);
	$news = new WP_Query( $news_args );
	
	if ( $news->have_posts() )
	{
		echo '<h4>Recent company news</h4>';
		while ( $news->have_posts() )
		{
			$news->the_post();
			echo '<p class="small">';
				the_time('F j, Y');
			echo '</p>';
			echo '<p class="newsTitle">';
				$news_link = get_permalink();
				echo '<a href="' . $news_link . '">';
					the_title();
				echo '</a>';
			echo '</p>';
		}
		wp_reset_query();
	}

?>