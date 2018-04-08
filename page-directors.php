<?php
/*
	Template Name: Directors
*/

	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php the_field('directors_intro'); ?>
		<ul class="layout">
		<?php while( have_rows('director_profile') ) : the_row(); ?>
			<li>
				<span><?php the_sub_field('director_position'); ?></span>
				<span><?php the_sub_field('director_name'); ?></span>
			</li>
		<?php endwhile; ?>
		</ul>
		<h3><?php the_field('directors_prof_intro'); ?></h3>
		<?php $id = 1; ?>
		<?php while( have_rows('director_profile') ) : the_row(); ?>
		<div class="tab">
			<div id="tab-<?php echo $id; ?>">
				<span><?php the_sub_field('director_name'); ?> &mdash; <?php the_sub_field('director_position'); ?></span>
				<span class="<?php if( $id == 1 ) { echo 'icon-angle-up'; } else { echo 'icon-angle-down'; } ?>"></span>
			</div>
			<div<?php if ($id == 1) { echo ' class="open"'; } ?>>
				<span>
					<p><?php the_sub_field('director_bio'); ?></p>
				</span>
			</div>
		</div>
		<?php $id++; ?>
		<?php endwhile; ?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>
<script>
	jQuery.data( document.body, 'active_tab', 'tab-1' );
</script>