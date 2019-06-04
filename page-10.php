<?php
  get_header(); ?>
   <?php
       if ( have_posts()) {
         while ( have_posts() ) {
           the_post();
   ?>
     <h1> <?php  the_title(); ?> </h1>
     <br/><small> Developed On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
   <?php
         }
       }
    ?>

 <?php get_footer(); ?>
