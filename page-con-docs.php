<?php
/*
	Template Name: Constitutional Documents
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php
			if( get_field('condoc_intro') ) {
				echo '<p class="intro">' . get_field('condoc_intro') . '</p>';
			}
			
			while( have_rows('condoc_docs') ) {
				the_row();
				$field = get_sub_field('condoc_docs_file');
				$url = $field['url'];
				echo '<a class="fin_link" href="' . $url .'" target="_blank">';
			 		echo '<span class="title">' . get_sub_field('condoc_docs_title') . '</span>';
			 		echo '<span class="' . get_file_type($url) . '"></span>';
				echo '</a>';
			}
		?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>