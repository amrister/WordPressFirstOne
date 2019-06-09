<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); wp_title('|'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
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
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">FirstOne</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <?php
            wp_nav_menu(
              array(
                'theme_location'=>'primary',
                'container'=>'false',
                'menu_class'=>'nav navbar-nav mr-auto',
                'walker' => new Walker_Nav_Primary(),
              )
            );
           ?>
        </div>
      </div>
    </nav>
    </div>
