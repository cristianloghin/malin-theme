<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */


	get_header();

?>
<div class="container">
    <div class="main">	
	   <h1><?php the_title(); ?></h1>
        <?php
            while ( have_posts() ) : the_post();
        ?>
        <?php the_content(); ?>
    </div>

<?php
    
    $c_id = get_the_ID();
    $p_id = wp_get_post_parent_id($c_id);

    endwhile;

    if ($p_id != 0) {
       get_template_part( 'modules/sidemenu', 'global');
    }
    wp_reset_query();

?>

</div>
<?php
	get_footer();

?>