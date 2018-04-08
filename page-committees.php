<?php
/*
	Template Name: Board Committees
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php the_field('committees_intro'); ?>
		<?php $id = 1; ?>
		<?php while( have_rows('board_committee') ) : the_row(); ?>
		<div class="tab">
			<div id="tab-<?php echo $id; ?>">
				<span><?php the_sub_field('board_committee_title'); ?></span>
				<span class="<?php if( $id == 1 ) { echo 'icon-angle-up'; } else { echo 'icon-angle-down'; } ?>"></span>
			</div>
			<div<?php if ($id == 1) { echo ' class="open"'; } ?>>
				<span>
					<?php the_sub_field('board_committee_desc'); ?>
					<?php $url = get_sub_field('board_committee_pdf'); ?>
					<a class="doc_link" href="<?php echo $url; ?>" target="_blank">
						<span class="<?php echo get_file_type($url); ?>"></span>
						<span><?php the_sub_field('board_committee_pdf_text'); ?></span>
					</a>
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