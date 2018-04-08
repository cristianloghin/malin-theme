<?php
/*
	Template Name: RNS Announcements
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
		?>
		<iframe src="http://ir1.euroinvestor.com/asp/ir/Malin/News.aspx" frameborder="0" scrolling="No" style="width: 100%; height: <?php the_field('rns_iframe_1_height'); ?>px"></iframe>
		<h3>Email alerts</h3>
		<iframe src="http://ir1.euroinvestor.com/asp/ir/Malin/emailAlerts.aspx" frameborder="0" scrolling="No" style="width: 100%; height: <?php the_field('rns_iframe_2_height'); ?>px"></iframe>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>