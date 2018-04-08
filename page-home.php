<?php
/*
	Template Name: Home
*/

	get_header();
	$intro = get_field('home_intro');
	$desc = get_field('home_desc');
?>
	<div class="container">
		<div class="main top_border">
			<?php get_template_part( 'modules/home-banner'); ?>
			<p class="intro"><?php echo $intro; ?></h2>
			<p><?php echo $desc; ?></p>
		</div>
		<div class="sidebar">
			<?php get_template_part( 'modules/home-news'); ?>
		</div>
	</div>
<?php
	get_footer();
?>