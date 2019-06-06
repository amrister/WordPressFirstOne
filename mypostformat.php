<div class='post'>
  <!-- <h6>Post Format is Standard</h6> -->
  <?php the_title( sprintf('<h3 class="card-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h3>' ); ?>
  <small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
  <h5>in: <?php the_category(); ?></h5>
  <p><?php the_content(); ?></p>
</div>
