<?php
/*
	Template Name: Shareholder Centre
*/
	get_header();
	$intro = get_field('sh_centre_intro');
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<p class="intro"><?php echo $intro; ?></p>
		<iframe src="http://ir1.euroinvestor.com/asp/ir/Malin/sharePriceTools.aspx" frameborder="0" scrolling="No" style="width: 100%; height: <?php the_field('sh_centre_iframe_height'); ?>px"></iframe>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global');	?>
</div>
<?php get_footer(); ?>