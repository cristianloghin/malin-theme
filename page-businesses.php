<?php
/*
	Template Name: Businesses
*/
	get_header();

	function get_open_class($name)
	{

		$address = $_SERVER['REQUEST_URI'];
		$address = str_replace('/businesses/', '', $address);
		$address = str_replace('/', '', $address);
		if ($address == '') { $address = '3d4-medical';	}

		if ($name == $address)
		{
			return 'open';
		}
		else
		{
			return '';
		}
	}
	function get_icon_class($name)
	{

		$address = $_SERVER['REQUEST_URI'];
		$address = str_replace('/businesses/', '', $address);
		$address = str_replace('/', '', $address);
		if ($address == '') { $address = '3d4-medical';	}

		if ($name == $address)
		{
			return 'icon-angle-up';
		}
		else
		{
			return 'icon-angle-down';
		}
	}

?>

<!-- Businesses Intro Page -->
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php
			$args = array(
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
				'post_type' => 'business'
			);
			$businesses = get_posts($args);
			$bus_id = 1;
			foreach ($businesses as $business) :
		?>
		<div class="tab">
			<div id="tab-<?php echo $bus_id; ?>">
				<span><?php echo $business->post_title; ?></span>
				<span class="<?php echo get_icon_class($business->post_name); ?>"></span>
			</div>
			<div class="<?php echo get_open_class($business->post_name); ?>">
				<span>
					<span class="logo_block">
						<p class="logo_holder" style="background-image: url(<?php the_field('business_logo', $business->ID); ?>)"></p>
						<p class="bus_desc">
							<span>
								<span>
									<?php echo get_post_field('post_content', $business->ID); ?>
								</span>
							</span>
						</p>
					</span>
					<?php
						if ( get_field( 'business_website', $business->ID ) ) :
					?>
					<a class="web_link" href="<?php the_field( 'business_website', $business->ID ); ?>" target="_blank">
						<span class="icon-link-ext"></span>
						<span>Company website</span>
					</a>
					<?php
						endif;
						$business_id = $business->ID;
						include(locate_template('modules/news-business.php'));
					?>
				</span>
			</div>
		</div>
		<?php
			$bus_id++;
			endforeach;
		?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'businesses'); ?>
</div>
<?php get_footer(); ?>
<script>
	businesses_page = true;
	$('.tab').each( function()
	{
		if( $(this).children(':last-child').hasClass('open') )
		{
			current_id = $(this).children(':first-child').attr('id');
		}
	});
	jQuery.data( document.body, 'active_tab', current_id );

	console.log('from page:', jQuery.data( document.body, 'active_tab' ));
</script>