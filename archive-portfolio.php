<?php
    get_header();

    echo "<div class='container'>";
      echo "<header class='page-head text-center'>";
      the_archive_title( $before = '<h1 class="archive-title">', $after = '</h1>' );
      the_archive_description( $before = '<p class="archive-description">', $after = '</p>' );
      echo "<hr /></header>";
      echo "<div class='row'>";
        echo "<div class='col-9'>";
          if (have_posts()){
            echo "<div class='row'>";
            while ( have_posts() ) {
              the_post();
              echo "<div class='col-6'>";
              get_template_part( 'mypostformat', get_post_format());
              echo "</div>";
            }
            echo "</div>";
          }
        echo "</div>";
        echo "<div class='col-3'>";
          get_sidebar();
        echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
        echo "<div class='col-9'>";
          echo "<div class='row'>";
            the_post_navigation();
          echo "</div>";
         echo "</div>";
      echo "</div>";
    echo "</div>";
    get_footer();
?>
