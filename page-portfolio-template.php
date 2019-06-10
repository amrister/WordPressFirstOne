<?php
    /*
      Template Name: Portfolio Template
    */
    get_header();
    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col-9'>";
    $args = array(
      'post_type' => 'portfolio',
      'posts_per_page' => 5,
    );
    $getPortPosts = new WP_Query($args);
    if ( $getPortPosts->have_posts()) {
       while ( $getPortPosts->have_posts() ) {
         $getPortPosts->the_post();
         get_template_part( 'mypostformat','archive');
      }
    }

    echo "</div>";

    echo "</div>";
    echo "</div>";
    get_footer();
?>
