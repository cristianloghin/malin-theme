<?php
/*
	Template Name: Main Contact
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php if( get_field('contact_intro') ): ?>
			<p class="intro"><?php the_field('contact_intro'); ?></p>
		<?php endif; ?>
		<?php 
			$form = get_field( 'contact_form' );
			echo do_shortcode( $form );
		?>
	</div>
	<div class="sidebar">
		<h2>Contact Details</h2>
		<?php the_field('contact_sidebar'); ?>
	</div>		
</div>
<?php get_footer(); ?>