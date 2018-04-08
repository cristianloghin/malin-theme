<?php
/*
	Template Name: IR Contact
*/
	get_header();
?>
<div class="container">
	<div class="main">	
		<h1><?php the_title(); ?></h1>
		<?php if( get_field('ir_contact_intro') ): ?>
		<p class="intro"><?php the_field('ir_contact_intro'); ?></p>
		<?php
			endif;	
			$form = get_field( 'ir_contact_form' );
			echo do_shortcode( $form );
		?>
	</div>	
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>