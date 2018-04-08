<?php

$flag = false;
if( have_rows( 'home_banners' ) )
{
	while( have_rows( 'home_banners' ) )
	{
		the_row();
		$p_date = get_sub_field('banner_date');
		if ( $p_date <= time() )
		{
			$flag = true;
		}
	}
}
// display banners
if( $flag )
{
	echo '<div class="my-slider">';
	echo '<ul>';
	$id = 1;
	while( have_rows( 'home_banners' ) )
	{
		the_row();
		$p_date = get_sub_field('banner_date');
		if ( $p_date <= time() )
		{
			echo '<li><div class="banner ' . get_sub_field('banner_theme') . '" id="banner-' . $id . '" style="background-image: url(' . get_sub_field('banner_image') . ')">';
			if ( get_sub_field('banner_title') != '')
			{
				echo '<p class="banner_title">' . get_sub_field('banner_title') . '</p>';
			}	
			if ( get_sub_field('banner_subtitle') != '')
			{
				echo '<p class="banner_subtitle">' . get_sub_field('banner_subtitle') . '</p>';
			}
			if ( get_sub_field('banner_text') != '')
			{
				echo '<p class="banner_text">' . get_sub_field('banner_text') . '</p>';
			}
			if ( get_sub_field('banner_link') == 'Site link')
			{
				echo '<a class="button" href="' . get_sub_field('banner_site_link') . '">' . get_sub_field('banner_link_text') . '</a>';
			}
			else if ( get_sub_field('banner_link') == 'External link' )
			{
				echo '<a class="button" href="' . get_sub_field('banner_external_link') . '" target="_blank">' . get_sub_field('banner_link_text') . '</a>';
			}
			echo '</div></li>';
			$id++;
		}		
	}
	echo '</ul>';
	echo '</div>';
}

if ($id > 2)
{
	echo '<script>$(".my-slider").unslider({infinite: true});</script>';
}
else if ($id == 2) {
	echo '<script>$(".my-slider").css({ "margin-top": "-25px", "margin-bottom": "20px" });</script>';
}
?>