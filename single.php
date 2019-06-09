<?php

  get_header();

  echo "<div class='container'>";
  echo "<div class='post expanded'>";

  if(have_posts()){
    while(have_posts()){
      the_post();

?>

    <div class="image">
      <?php the_post_thumbnail('full');?>
    </div>
    <h3 class="entry-title"><?php the_title( ); ?></h3>
    <small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
    <h5><?php the_category(" "); ?> | <?php the_tags(); ?> | <?php edit_post_link();?></h5>
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
