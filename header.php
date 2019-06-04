<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>First Experience</title>
    <?php wp_head(); ?>
  </head>

  <?php

      if(is_front_page()){ // You Can use is_home if your home page is the Post page
          $firstOneClasses = array('my-class','some-class');
      }else{
        $firstOneClasses = array('no-my-class','no-some-class');
      }

   ?>

  <body <?php body_class( $firstOneClasses);?>>
    <?php wp_nav_menu( array('theme_location'=>'primary'));?>
