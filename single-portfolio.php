<?php

  get_header();

  echo "<div class='container'>";
  echo "<div class='row'>";
  echo "<div class='col-8'>";
  echo "<div class='post expanded text-center'>";

  if(have_posts()){
    while(have_posts()){
      the_post();
?>

    <div class="image">
      <?php the_post_thumbnail('full');?>
    </div>
    <h3 class="entry-title"><?php the_title( ); ?></h3>
    <small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
    <h5>
      In:
      <?php
          $fieldsOut= firstOne_get_terms($post->ID,'field');
          $tagsOut= firstOne_get_terms($post->ID,'software');
          echo $fieldsOut." || ".$tagsOut;
          if(current_user_can( 'manage_options' )){
            echo " || ";
            edit_post_link();
          }
      ?>
    </h5>
    <p><?php the_content(); ?></p>

    <hr>
<?php

      if(comments_open()){
        comments_template();
      }else{
        echo "<h6 class='text-center'> Sorry, Comments Are Closed On This Post </h6>";
      }

    }
  }
  echo "</div>";
  echo "</div>";
  echo "<div class='col-4'>";
    get_sidebar();
  echo "</div>";
  echo "</div>";
  ?>

  <div class="row">
    <div class="col-4 text-left">
      <?php previous_post_link(); ?>
    </div>
    <div class="col-4 text-right">
      <?php next_post_link(); ?>
    </div>
  </div>

  <?php

  echo "</div>";

  get_footer();

?>
