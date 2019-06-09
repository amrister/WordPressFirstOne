<div class="post search">
  <?php the_title( sprintf('<h3 class="card-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h3>' ); ?>
  <div class="media">
    <?php the_post_thumbnail('thumbnail',array('class' => 'mr-3','alt'=>'Generic placeholder image')); ?>
    <div class="media-body">
      <small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
      <p><?php the_excerpt(); ?></p>
    </div>
  </div>
</div>
