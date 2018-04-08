<?php
/*
	Template Name: Search Page
*/
	get_header();
?>
<div class="container">
	<?php if ( have_posts() ) : ?>

		<?php //print_r($wp_query); ?>

		
		<h1>
			<?php printf( __( $wp_query->found_posts . ' results found for: %s', 'shape' ), '<span class="s_query">' . get_search_query() . '</span>' ); ?>
		</h1>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php ?>

				<?php get_template_part( 'modules/search_results' ); ?>
			<?php endwhile; ?>
	<?php else : ?>
		<div class="page_search">
			<h1>We're sorry, your search returned no results.</h1>
			<h3>Search again?</h3>
			<?php get_search_form(); ?>
			<p style="margin-top: 20px">or return to the <a href="<?php echo get_home_url(); ?>">homepage</a>.</p>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>