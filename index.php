<?php
    get_header();
    echo "<div class='container'>";

    if (have_posts()) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'mypostformat', get_post_format());
      }
    }

    get_sidebar();

    echo "</div>";
    get_footer();
?>
