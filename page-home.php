<?php
    get_header();
    echo "<div class='container'>";
    get_search_form();

    /*
    // Print Lastest Post
    $lastPost = new WP_Query('type=post&posts_per_page=1');
    if ( $lastPost->have_posts()) {
       while ( $lastPost->have_posts() ) {
         $lastPost->the_post();
         get_template_part('mypostformat', get_post_format( ));
      }
    }
    wp_reset_postdata();

    // Print 2 Post  Not First One
    // 'type=post&posts_per_page=2&offset=1' or Array like next line
    $args = array(
      'type'=> 'post',
      'posts_per_page'=> 2,
      'offset'=> 1,
    );
    $twoPosts = new WP_Query($args);
    if ( $twoPosts->have_posts()) {
       while ( $twoPosts->have_posts() ) {
         $twoPosts->the_post();
         get_template_part('mypostformat', get_post_format( ));
      }
    }
    wp_reset_postdata();

    // Print All Posts With Category Sports ( ID = 9)
    $sportPosts = new WP_Query('type=post&cat=9');  // or category_name = nameinlowercase
    if ( $sportPosts->have_posts()) {
       while ( $sportPosts->have_posts() ) {
         $sportPosts->the_post();
         get_template_part('mypostformat', get_post_format( ));
      }
    }
    wp_reset_postdata();
    */

    // New idea, Make First Row has the recent post of my 3 category ( News, Sport, Habits)
    echo "<h4>Recents:</h4>";
    echo "<div class='row'>";

    $neededCats = array(9,10,11);
    for ($i=0; $i < sizeof($neededCats); $i++) {
      $args = array(
        'type'=>'post',
        'posts_per_page'=>1,
        'cat'=>$neededCats[$i],
        'category__not_in'=>array(1), // In case of post with multipli categorys
      );
      $getFirstOneOfCats = new WP_Query($args);
      if($getFirstOneOfCats->have_posts()){
        while($getFirstOneOfCats->have_posts()){
          $getFirstOneOfCats->the_post();
          echo "<div class='col-4'>";
          get_template_part('mypostformat',get_post_format());
          echo "</div>";
        }
      }
    }

    echo "</div>"; // Row
    echo "</div>"; // Container
    get_footer();
?>
