<?php
/*
	Template Name: ESM Rule 26
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<p class="intro"><?php the_field('esm_intro'); ?></p>
		<?php while( have_rows('esm_rules') ) : the_row(); ?>
			<div class="esm_rule_box">
				<div class="left">
					<h5><?php the_sub_field('esm_rule_title'); ?></h5>
				</div>
				<div class="right">
					<?php the_sub_field('esm_rule_text'); ?>
					<?php
						if( have_rows( 'esm_docs' ) )
						{
							echo '<ul>';
							while ( have_rows( 'esm_docs' ) )
							{
								the_row();
								$title = get_sub_field('esm_doc_title');
								$field = get_sub_field( 'esm_doc_file' );
								$url = $field['url'];
								echo '<li>';
								if ( get_sub_field('esm_doc_disc') )
								{
									$content = get_post( get_sub_field('esm_doc_disc_page') )->post_content;
									$content = apply_filters('the_content', $content);
									$content = str_replace(']]>', ']]&gt;', $content);
									echo '<script>make_modal(' . json_encode( $content ) . ', ' . json_encode( $url ) . ');</script>';
									echo '<a class="open_modal" href="#">';
								}
								else
								{
									echo '<a href="' . $url . '" target="_blank">';
								}
								echo $title . '</a>';
								echo '</li>';
							}
							echo '</ul>';
						}
						if( get_sub_field('esm_rule_updated') )
						{
							echo '<span>Last Updated: <span>' . get_sub_field('esm_rule_updated') .'</span></span>';
						}
						if( get_sub_field('esm_rule_link') )
						{
							$id = get_sub_field('esm_rule_link');
							echo '<span>Link: <span><a href="' . get_permalink($id) . '">' . get_the_title($id) . '</a></span></span>';
						}
					?>
				</div>
			</div>
		<?php endwhile; ?>
		<p><?php the_field('esm_note') ?> <a href="<?php the_field('esm_note_link'); ?>" target="_blank">Read more</a></p>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>