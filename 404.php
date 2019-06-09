<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <h1 class="big text-center">Blash Faty Ya 7oby</h1>
      <div class="content">
        <h3>You Can Try Of Search, Or One of The Links Below</h3>
        <?php get_search_form(); ?>
        <?php the_widget( 'WP_Widget_Recent_Post'); ?>
        <div class="widget widget_category">
          <ul>
            <?php wp_list_categories( array(
                  'orderby' => 'count',
                  'order' => 'DESC',
                  'show_count' => 1,
                  'number' => 3,
                )
              );?>
          </ul>
        </div>
        <?php the_widget( 'WP_Widget_Archives','dropdown=0') ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
