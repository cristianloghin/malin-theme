<?php
/*
	Template Name: Financial Results
*/
	get_header();
	$flag = false;
	
	for ($x = 2015; $x <= 2020; $x++)
	{
		if( have_rows( 'financial_reports_'. $x ) )
		{
			while( have_rows( 'financial_reports_'. $x ) )
			{
				the_row();
				$p_date = get_sub_field('report_date');
				if ( $p_date <= time() )
				{
					$flag = true;
				}
			}
		}
	}
	
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<?php
			if($flag) {
				echo '<div class="fin_nav">';
				for ( $x = 2015; $x <= 2020; $x++)
				{
					if( have_rows( 'financial_reports_'. $x ) )
					{
						$current_year = date('Y');
						echo ( $x == $current_year ) ? '<span class="active" id="bt-' . $x . '" data-id="' . $x . '">' . $x . '</span>' : '<span id="bt-' . $x . '" data-id="' .$x. '">' . $x . '</span>';
					}
				}
				echo '</div>';
				for ( $x = 2015; $x <= 2020; $x++)
				{
					if( have_rows( 'financial_reports_'. $x ) )
					{
						$current_year = date('Y');
						echo ( $x == $current_year ) ? '<div class="fin_list" id="block-' . $x . '">' : '<div class="fin_list" style="display: none" id="block-' . $x . '">';
						while( have_rows( 'financial_reports_'. $x ) )
						{
							the_row();
							$date = gmdate("F j, Y", get_sub_field('report_date'));
							$field = get_sub_field('select_file');
							$url = $field['url'];
							echo '<a class="fin_link" href="' . $url . '" target="_blank">';
							echo '<span class="small">' . $date .'</span>';
							echo '<span class="title">' . get_sub_field('report_title') . '</span>';
							echo '<span class="' . get_file_type($url) . '"></span>';
							echo '</a>';
						}
						echo '</div>';
					}
				}
			}
			else
			{
				echo '<p class="intro">' . get_field('financial_reports_message') .'</p>';
			}
		?>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>
<script>
	init_fin();
</script>