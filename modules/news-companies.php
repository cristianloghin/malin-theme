<h1>Investee Company News</h1>
                       
<?php 	

  $args = array(
    'post_type' => 'news',
    'orderby' => 'date'
  );

  $news = new WP_Query( $args );

  if ( !$news->have_posts() ) {
?>

  <p class="intro">No information available at this time.</p>
  
<?php
  
  }
  
  while ( $news->have_posts() ) : $news->the_post(); ?>

  <div>
    <p><?php the_date(); ?></p>
    <h5>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h5>
  </div>
  
<?php
  endwhile;
  wp_reset_query();
?>