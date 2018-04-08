<div id="rns_data" style="display: none">
	<?php 
		function strip_html_tags( $text )
		{
			$text = preg_replace(
				array(
					// Remove invisible content
					'@<head[^>]*?>.*?</head>@siu',
					'@<style[^>]*?>.*?</style>@siu',
					'@<script[^>]*?.*?</script>@siu',
					'@<object[^>]*?.*?</object>@siu',
					'@<embed[^>]*?.*?</embed>@siu',
					'@<applet[^>]*?.*?</applet>@siu',
					'@<noframes[^>]*?.*?</noframes>@siu',
					'@<noscript[^>]*?.*?</noscript>@siu',
					'@<noembed[^>]*?.*?</noembed>@siu',
					'@<input[^>]*?.*?>@siu',
					'@<div id="newsPDF[^>]*?.*?</div>@siu',
					'@<span style="[^>]*?.*?</span>@siu'
				),
				array(
					'', '', '', '', '', '', '', '', '', '', '', ''
				),
				$text );
			return $text;
		}
		// Initialise a cURL object
        $ch = curl_init(); 

        // Set url and other options
        curl_setopt($ch, CURLOPT_URL, "http://ir1.euroinvestor.com/asp/ir/Malin/NewsContent.aspx");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // Get the page contents
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);
		
		$output = strip_html_tags( $output );
		echo $output;

	?>
</div>

<div>
	<h3 class="top_border light">Malin RNS announcements</h3>
	<div id="rns_display"></div>
	<span class="link small"><a class="purple" href="/news/malin-rns-announcements">View all RNS announcements</a></span>
</div>
<div>
<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 2,
		'orderby' => 'date'
	);
	
	$news = new WP_Query( $args );
	
	if( $news->have_posts() ) { ?>

		<h3 class="top_border light">Investee Company News</h3>
		<?php
		while ( $news->have_posts() ) : $news->the_post(); ?>
		<p class="small"><?php the_time('F j, Y'); ?></p>
		
		<span class="newsTitle">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</span>

		<?php
		endwhile;
		?>

		<span class="link small"><a class="purple" href="/news/investee-company-news">View all news items</a></span>
	<?php
	}
	wp_reset_query();
?>
</div>
	