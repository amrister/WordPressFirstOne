<?php

  // Include Outside Files
  function firstOne_enqueue(){
    wp_enqueue_style('customstyle', get_template_directory_uri().'/css/master.css',array(), '1.0.0' , 'all' );
    wp_enqueue_script( 'customjs' , get_template_directory_uri().'/js/main.js' , array() , '1.0.0' , true );
  }
  // Add_ Action is to Specify At which moment to use fn ( here In Icluding Template Scripts)
  add_action( 'wp_enqueue_scripts' , 'firstOne_enqueue' );

  // Add Menu in Appearence Section
  function firstOne_theme_setup(){

    add_theme_support( 'menus' );

    register_nav_menu('primary', 'My Header Primary Navigation');
    register_nav_menu( 'secondary', 'My Footer Navigation');

  }
  add_action( 'init', 'firstOne_theme_setup'); // Init (Initialization) or after_setup_theme

  // Add new Features in Appearence Menu or other , We Can place it here or inside fn firstOne_theme_setup like add menus
  // Check link for more https://developer.wordpress.org/reference/functions/add_theme_support/
  add_theme_support( 'custom-background' );
  add_theme_support( 'custom_header' );
  add_theme_support( 'post-thumbnails' );

 ?>
