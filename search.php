<?php
    get_header();
    echo "<div class='container'>";
    get_search_form();
    echo "<div class='row'>";
    if (have_posts()) {
      while ( have_posts() ) {
        the_post();
        echo "<div class='col-12'>";
        get_template_part( 'mypostformat','search');
        echo "</div>";
      }
    }
    echo "</div>";
    echo "</div>";
    get_footer();
?>
