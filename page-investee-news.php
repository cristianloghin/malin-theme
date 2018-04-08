<?php
/*
	Template Name: Investee News
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php 	
			$args = array(
				'post_type' => 'news',
				'orderby' => 'date'
			);
			$news = new WP_Query( $args );
			if ( !$news->have_posts() )
			{
				echo ' <p class="intro">No information available at this time.</p>';
			}
			else
			{
				while ( $news->have_posts() ) : $news->the_post();
		?>
				<a class="news_article" href="<?php the_permalink(); ?>">
					<span class="small">
						<?php the_time('F j, Y'); ?>
					</span>
					<span>
						<?php the_title(); ?>
					</span>
				</a>
		<?php
				endwhile;
				wp_reset_query();
			}
		?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>
<script>
	init_news(<?php the_field( 'news_articles_page' ); ?>);
</script>