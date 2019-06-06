<div class="card post">
  <?php the_post_thumbnail('thumbnail',array('class' => 'card-img-top','alt'=>'Card image cap')); ?>
  <div class="card-body">
    <?php the_title( sprintf('<h3 class="card-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h3>' ); ?>
    <small> Posted On: <?php  the_time('F j, Y'); ?> At: <?php the_time('g:i A'); ?></small>
  </div>
</div>
