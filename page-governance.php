<?php
/*
	Template Name: Corporate Governance
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php
			while( have_posts() ):
			the_post();
			the_content();
			endwhile;
			$url = get_field('governance_link');
		?>
		<a class="doc_link" href="<?php echo $url; ?>" target="_blank">
			<span class="<?php echo get_file_type($url); ?>"></span>
			<span><?php the_field('governance_link_text'); ?></span>
		</a>
	</div>	
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>