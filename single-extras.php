<?php
	/*
		Extra pages template
	*/
	get_header();
?>
<div class="container">
	<div class="full_width">
		<h1><?php the_title(); ?></h1>
		<?php
			while ( have_posts() )
			{
				the_post();	
				the_content();
			}
			wp_reset_query();
		?>
	</div>
</div>
<?php get_footer(); ?>