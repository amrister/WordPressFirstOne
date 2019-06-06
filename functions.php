<?php
/*
    ================================================
    Include Scripts
    ================================================
*/
  // Include Outside Files
  function firstOne_enqueue(){

    wp_enqueue_style('customstyle', get_template_directory_uri().'/css/master.css', array(), '1.0.0' , 'all' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.1.0' , 'all' );

    wp_enqueue_script('jQuery', get_template_directory_uri().'/js/jquery-3.2.1.min.js' , array() , '3.2.1' , true );
    wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js' , array() , '4.1.0' , true );
    wp_enqueue_script( 'customjs' , get_template_directory_uri().'/js/main.js' , array() , '1.0.0' , true );

  }
  // Add_ Action is to Specify At which moment to use fn ( here In Icluding Template Scripts)
  add_action( 'wp_enqueue_scripts' , 'firstOne_enqueue' );

/*
    ================================================
    Activate Menus
    ================================================
*/
  // Add Menu in Appearence Section
  function firstOne_theme_setup(){

    add_theme_support( 'menus' );

    register_nav_menu('primary', 'My Header Primary Navigation');
    register_nav_menu( 'secondary', 'My Footer Navigation');

  }
  add_action( 'init', 'firstOne_theme_setup'); // Init (Initialization) or after_setup_theme

/*
    ================================================
    Theme Support Features Functions
    ================================================
*/
  // Add new Features in Appearence Menu or other , We Can place it here or inside fn firstOne_theme_setup like add menus
  // Check link for more https://developer.wordpress.org/reference/functions/add_theme_support/
  add_theme_support( 'custom-background' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'post-formats', array( 'aside', 'image', 'video' ) );


/*
    ================================================
    Side bar Functions
    ================================================
*/

  function firstOne_widget_setup(){
    register_sidebar(
      array(
        'name'=>'Sidebar',
        'id'=>'sidebar-1',
        'class'=>'custom', // WordPress Will make it name-value here ( sidebar-custom )
        'description'=>'This is My Standard Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">', // From https://developer.wordpress.org/reference/functions/register_sidebar/
        'after_widget'  => "</li>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n"

      )
    );
  }

  add_action( 'widgets_init', 'firstOne_widget_setup' );

 ?>
