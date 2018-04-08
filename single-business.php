<?php
	/*
	Business page template
	*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php
			while ( have_posts() ) : the_post();
			the_content();
			endwhile; 
			wp_reset_query();  
			if ( get_field('business_website') ) :
		?>
			<a class="web_link" href="<?php the_field('business_website'); ?>" target="_blank">
				<span class="icon-link-ext"></span>
				<span>Company website</span>
			 </a>
		<?php
			$args = array(
				'post_type' => 'news',
				'orderby' => 'date',
				'posts_per_page' => 5,
				'meta_query' => array(
					array(
						'key' => 'news_company',
						'value' => '"' . get_the_ID() . '"',
						'compare' => 'LIKE'
					)
				)
			);
			$news = new WP_Query( $args );
			if ( $news->have_posts() )
			{
				echo '<h4>Recent news</h4>';
				while ( $news->have_posts() ) : $news->the_post();
		?>
				<p class="small">
					<?php the_date(); ?>
				</p>
				<span class="newsTitle">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</span>
		<?php
				endwhile;
				wp_reset_query();
			}
		?>
		<?php endif; ?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'businesses'); ?>
</div>
<?php
	get_footer();

?>