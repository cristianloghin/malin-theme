<?php
	/*
	News article page template
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
			if ( get_field('news_link') == 'No link' )
			{
				// do nothing
			} 
			else if ( get_field('news_link') == 'Link to file' )
			{
				$url = get_field('news_link_file');
				echo '<a class="doc_link" href="' . $url . '" target="_blank"><span class="' . get_file_type($url) . '"></span><span>' . get_field('link_text') . '</span></a>';
			}
			else
			{
				echo '<a class="web_link" href="' . get_field('news_link_website') . '" target="_blank"><span class="icon-link-ext"></span><span>' . get_field('link_text') . '</span></a>';
			}
			
			if( get_field('news_company') )
			{
				$company_id = get_field('news_company');
				if ( get_field( 'business_website', $company_id[0] ) )
				{
					echo '<a class="web_link" href="' . get_field( 'business_website', $company_id[0] ) . '" target="_blank"><span class="icon-link-ext"></span><span>Company website</span></a>';
				}
			}
		?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'news'); ?>
</div>
<?php get_footer(); ?>