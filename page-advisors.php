<?php
/*
	Template Name: Advisors
*/
	get_header();
?>
<div class="container">
	<div class="main">
		<h1><?php the_title(); ?></h1>
		<div class="table_wrapper">
			<table>
				<thead>
					<tr>
						<th>Details</th>
						<th>Address</th>
						<th>Website</th>
					</tr>
				</thead>
				<tbody>
				<?php while( have_rows('advisor') ) : the_row(); ?>
					<tr>
						<td><?php the_sub_field('advisor_details'); ?></td>
						<td><?php the_sub_field('advisor_address'); ?></td>
						<td>
							<a class="purple" href="<?php the_sub_field('advisor_website'); ?>" target="_blank">
								<?php
									$address = get_sub_field('advisor_website');
									$address = preg_replace('#^https?://#', '', $address);
									$address = preg_replace('#/.*#', '', $address);
									echo $address;
								?>
							</a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php get_template_part( 'modules/sidemenu', 'global'); ?>
</div>
<?php get_footer(); ?>