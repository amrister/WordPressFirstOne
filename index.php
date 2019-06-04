<?php get_header(); ?>

  <?php
      if ( have_posts()) {
        while ( have_posts() ) {
          the_post();
  ?>

  <br/>
  <div class='post'>
    <h3> <?php  the_title(); ?> </h3>
    <br/><small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
    <p><?php the_content(); ?></p>
  </div>

  <?php
        }
      }
   ?>

<?php get_footer(); ?>
