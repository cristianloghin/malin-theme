<?php
/**
 * The template part for displaying results in search pages
 */
?>

<a class="news_article" href="<?php echo get_permalink(); ?>">
	<span class="small"><?php echo get_post_type(); ?></span>
	<h3><?php the_title(); ?></h3>
	<?php the_excerpt(); ?>
</a>

