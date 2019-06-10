<?php
/*
    ================================================
    Include Scripts
    ================================================
*/
  // Include Outside Files
  function firstOne_enqueue(){

    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.1.0' , 'all' );
    wp_enqueue_style('customstyle', get_template_directory_uri().'/css/master.css', array(), '1.0.0' , 'all' );

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
  add_theme_support( 'html5', array('search-form'));

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

/*
    ================================================
    Add include Files
    ================================================
*/

  require  get_template_directory().'/include/walker.php';

/*
    ================================================
    Remove WP Version Meta
    ================================================
*/

  function firstOne_remove_version(){
      return '';
  }
  add_filter( 'the_generator', 'firstOne_remove_version');

/*
    ================================================
    Custom Post Type ( Portfolio)
    ================================================
*/
  function firstOne_custom_post_type(){

  	$labels = array(
  		'name' => 'Portfolio',
  		'singular_name' => 'Portfolio',
  		'add_new' => 'Add Item',
  		'all_items' => 'All Items',
  		'add_new_item' => 'Add Item',
  		'edit_item' => 'Edit Item',
  		'new_item' => 'New Item',
  		'view_item' => 'View Item',
  		'search_item' => 'Search Portfolio',
  		'not_found' => 'No items found',
  		'not_found_in_trash' => 'No items found in trash',
  		'parent_item_colon' => 'Parent Item'
  	);
  	$args = array(
  		'labels' => $labels,
  		'public' => true,
  		'has_archive' => true,
  		'publicly_queryable' => true,
  		'query_var' => true,
  		'rewrite' => true,
  		'capability_type' => 'post',
  		'hierarchical' => false,
  		'supports' => array(
  			'title',
  			'editor',
  			'excerpt',
  			'thumbnail',
  			'revisions',
  		),
  		// 'taxonomies' => array('category', 'post_tag'),
  		'menu_position' => 5,
  		'exclude_from_search' => false
  	);
  	register_post_type('portfolio',$args);

  }
    add_action('init','firstOne_custom_post_type');

/*
    ================================================
    Custom Taxonomies ( Tag, Category )
    ================================================
*/

    function firstOne_create_custom_taxonomies(){

      // Add New Hierarical Taxonomy
      $labels = array(
        'name' => 'Fields',
    		'singular_name' => 'Field',
    		'search_items' => 'Search Fields',
    		'all_items' => 'All Fields',
    		'parent_item' => 'Parent Field',
    		'parent_item_colon' => 'Parent Field:',
    		'edit_item' => 'Edit Field',
    		'update_item' => 'Update Field',
    		'add_new_item' => 'Add New Work Field',
    		'new_item_name' => 'New Field Name',
    		'menu_name' => 'Fields'
      );
      $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true, // To Show UI For User in Control Pannel
        'show_admin_column' => true, // To Appear in Column Section
        'query_var' => true,
        'rewrite' => array( 'slug' => 'field')
      );
      register_taxonomy('field', array('portfolio'), $args);


      // Add New Nonhierarical Taxonomy
      register_taxonomy('software', 'portfolio' ,array(
          'labels' => array('name'=>'Software'),
          'hierarchical' => false,
          'rewrite' => array('slug' => 'software'),
      ));

    }
    add_action('init','firstOne_create_custom_taxonomies');

/*
    ================================================
    Custom Taxonomies ( Tag, Category )
    ================================================
*/

  function firstOne_get_terms($postID,$termName){
    $i=0;
    $output = '';
    $termsList = wp_get_post_terms( $postID, $termName);
    foreach ($termsList as $element) {
      $i++;
      if($i > 1){ $output.= ', '; }
      $output.= "<a href='".get_term_link($element)."'>".$element->name."</a>";
    }
    return $output;
  }
?>
