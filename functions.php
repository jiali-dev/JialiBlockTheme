<?php

function jialit_theme_enqueue() {
  wp_enqueue_style('custom_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	
  wp_enqueue_script('notiflix_script', get_theme_file_uri('/assets/notiflix/notiflix.min.js', __FILE__), array('jquery'));
  wp_enqueue_style('notiflix_style', get_theme_file_uri('/assets/notiflix/notiflix.min.css', __FILE__), array(), '1.0', 'all');
	wp_enqueue_script('notiflix_custom_script', get_theme_file_uri('/assets/notiflix/notiflix-custom.js', __FILE__), array('jquery'));
  
  wp_enqueue_script('bootstrap_script', get_theme_file_uri('/assets/bootstrap/bootstrap.min.js', __FILE__));
  wp_enqueue_style('bootstrap_style', get_theme_file_uri('/assets/bootstrap/bootstrap.min.css', __FILE__));
	wp_enqueue_style('bootstrap_style_rtl', get_theme_file_uri('/assets/bootstrap/bootstrap.rtl.min.css', __FILE__));
  
  wp_enqueue_script('jiali_main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('jiali_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style( 'jiali_rtl_style', get_theme_file_uri('/style-rtl.css'));
  // wp_style_add_data( 'jiali_rtl_style', 'rtl', 'replace' );
  wp_localize_script( 'jiali_main_js','jiali_ajaxhandler', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
  
  wp_enqueue_script('font_awesome_js', get_theme_file_uri('/assets/font-awesome/all.min.js'));
  wp_enqueue_style('font_awesome_css', get_theme_file_uri('/assets/font-awesome/all.min.css'));
}

add_action('wp_enqueue_scripts', 'jialit_theme_enqueue');

// Add Features to Theme
function jiali_theme_features() {
  load_theme_textdomain('jiali', get_template_directory() . '/languages');
  $defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('editor-styles');
  add_image_size('horizontal-card', 200, 200, true);
  add_image_size('vertical-card-large', 580, 455, true);
  add_image_size('vertical-card-medium', 280, 325, true);
  add_image_size('category-card', 360, 500, true);
}

add_action('after_setup_theme', 'jiali_theme_features');

// Get IP Info
function jiali_ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
  $output = NULL;
  if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
      $ip = $_SERVER["REMOTE_ADDR"];
      if ($deep_detect) {
          if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
              $ip = $_SERVER['HTTP_CLIENT_IP'];
      }
  }
  $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
  $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
  $continents = array(
      "AF" => "Africa",
      "AN" => "Antarctica",
      "AS" => "Asia",
      "EU" => "Europe",
      "OC" => "Australia (Oceania)",
      "NA" => "North America",
      "SA" => "South America"
  );
  if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
      $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
      if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
          switch ($purpose) {
              case "location":
                  $output = array(
                      "city"           => @$ipdat->geoplugin_city,
                      "state"          => @$ipdat->geoplugin_regionName,
                      "country"        => @$ipdat->geoplugin_countryName,
                      "country_code"   => @$ipdat->geoplugin_countryCode,
                      "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                      "continent_code" => @$ipdat->geoplugin_continentCode
                  );
                  break;
              case "address":
                  $address = array($ipdat->geoplugin_countryName);
                  if (@strlen($ipdat->geoplugin_regionName) >= 1)
                      $address[] = $ipdat->geoplugin_regionName;
                  if (@strlen($ipdat->geoplugin_city) >= 1)
                      $address[] = $ipdat->geoplugin_city;
                  $output = implode(", ", array_reverse($address));
                  break;
              case "city":
                  $output = @$ipdat->geoplugin_city;
                  break;
              case "state":
                  $output = @$ipdat->geoplugin_regionName;
                  break;
              case "region":
                  $output = @$ipdat->geoplugin_regionName;
                  break;
              case "country":
                  $output = @$ipdat->geoplugin_countryName;
                  break;
              case "countrycode":
                  $output = @$ipdat->geoplugin_countryCode;
                  break;
          }
      }
  }
  return $output;
}

// Get Customized Tags
function jiali_custom_get_post_tags( $post_id ) {
  $postTags = wp_get_post_tags( $post_id, array(
    'number' => 3
  ) );

  $tagsObject = [];

  if( $postTags )
  {
    foreach($postTags as $tag) 
    {
      $tempObject = [];
      $tempObject['id'] = $tag->term_id;
      $tempObject['name'] = $tag->name;
      $tempObject['tagColor'] = ( $color = get_field('tag_color', $tag->taxonomy . '_' . $tag->term_id ) ) ? $color : "#fff" ;
      $tempObject['permalink'] = get_term_link($tag->term_id) ;
      $tagsObject[] = $tempObject;
    }
  }

  return $tagsObject;
}

// Customize Rest Api
function jiali_custom_rest() {

  register_rest_field('post', 'permalink', array(
    'get_callback' => function() {return get_permalink();}
  ));
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
  register_rest_field('post', 'views', array(
    'get_callback' => function() {return wp_statistics_pages('total', get_permalink() ,get_the_ID() );}
  ));
  register_rest_field('post', 'horizontalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'horizontal-card' );}
  ));
  register_rest_field('post', 'largeVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'vertical-card-large' );}
  ));
  register_rest_field('post', 'mediumVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(  ),'vertical-card-medium' );}
  ));
  register_rest_field('post', 'postTags', array(
    'get_callback' => function() {return jiali_custom_get_post_tags(get_the_ID()); }
  ));

  
  register_rest_field('app', 'permalink', array(
    'get_callback' => function() {return get_permalink();}
  ));
  register_rest_field('app', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
  register_rest_field('app', 'views', array(
    'get_callback' => function() {return wp_statistics_pages('total', get_permalink() ,get_the_ID() );}
  ));
  register_rest_field('app', 'horizontalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'horizontal-card' );}
  ));
  register_rest_field('app', 'largeVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'vertical-card-large' );}
  ));
  register_rest_field('app', 'mediumVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'vertical-card-medium' );}
  ));
  register_rest_field('app', 'postTags', array(
    'get_callback' => function() {return jiali_custom_get_post_tags(get_the_ID()); }
  ));

  register_rest_field('multimedia', 'permalink', array(
    'get_callback' => function() {return get_permalink();}
  ));
  register_rest_field('multimedia', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
  register_rest_field('multimedia', 'views', array(
    'get_callback' => function() {return wp_statistics_pages('total', get_permalink() ,get_the_ID() );}
  ));
  register_rest_field('multimedia', 'horizontalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'horizontal-card' );}
  ));
  register_rest_field('multimedia', 'largeVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'vertical-card-large' );}
  ));
  register_rest_field('multimedia', 'mediumVerticalThumbnail', array(
    'get_callback' => function() {return get_the_post_thumbnail_url( get_the_ID(),'vertical-card-medium' );}
  ));
  register_rest_field('multimedia', 'postTags', array(
    'get_callback' => function() {return jiali_custom_get_post_tags(get_the_ID()); }
  ));

  register_rest_field('tag', 'tagColor', array(
    'get_callback' => function($object) {return get_field('tag_color', $object['taxonomy'] . '_' . $object['id'] );}
  ));
  
}

add_action('rest_api_init', 'jiali_custom_rest');

// Customize Query
function jiali_query_custom_fields( $posts ) {

  for ( $i = 0; $i < count($posts); $i++ ) {
    
    $permalink = get_permalink( $posts[$i]->ID );
    $posts[$i]->permalink = $permalink;

    $authorName = get_the_author_meta('display_name', $posts[$i]->post_author);
    $posts[$i]->authorName = $authorName;

    $authorAvatar = get_avatar( $posts[$i]->post_author, 60);
    $posts[$i]->authorAvatar = $authorAvatar;

    $views = wp_statistics_pages('total', $permalink ,$posts[$i]->ID );
    $posts[$i]->views = $views;

    $horizontalThumbnail = get_the_post_thumbnail_url( $posts[$i]->ID, 'horizontal-card' );
    $posts[$i]->horizontalThumbnail = $horizontalThumbnail;

    $largeVerticalThumbnail = get_the_post_thumbnail_url( $posts[$i]->ID, 'vertical-card-large' );
    $posts[$i]->largeVerticalThumbnail = $largeVerticalThumbnail;
    
    $mediumVerticalThumbnail = get_the_post_thumbnail_url( $posts[$i]->ID, 'vertical-card-medium' );
    $posts[$i]->mediumVerticalThumbnail = $mediumVerticalThumbnail;

    $customDate = ( get_locale() == 'fa_IR' ) ? parsidate( "d M Y", $post->post_date, 'per' ) : date_format( date_create($post->post_date), "Y M d" );
    $posts[$i]->customDate = $customDate;

    $postTags = wp_get_post_tags( $posts[$i]->ID, array(
      'number' => 3
    ) );

    $posts[$i]->postTags = jiali_custom_get_post_tags( $posts[$i]->ID );

  }

  return $posts;

}

add_filter( 'the_posts', 'jiali_query_custom_fields' );

// Make Blocks Placeholder
class PlaceholderBlock {
  function __construct($name) {
    $this->name = $name;
    add_action('init', [$this, 'onInit']);
  }

  function jialiBlockRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/jiali-blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/jiali-blocks/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    register_block_type("jialiblocktheme/{$this->name}", array(
      'editor_script' => $this->name,
      'render_callback' => [$this, 'jialiBlockRenderCallback']
    ));
  }
}

new PlaceholderBlock("header");
new PlaceholderBlock("suggested-articles");
new PlaceholderBlock("top-categories");
new PlaceholderBlock("double-banner");
new PlaceholderBlock("recent-articles");
new PlaceholderBlock("services");
new PlaceholderBlock("appointment");
new PlaceholderBlock("footer");
new PlaceholderBlock("single");
new PlaceholderBlock("single-app");
new PlaceholderBlock("archive");
new PlaceholderBlock("page");
new PlaceholderBlock("page-appointment");
new PlaceholderBlock("categories");
new PlaceholderBlock("top-articles");
new PlaceholderBlock("recent-media");
new PlaceholderBlock("single-multimedia");
new PlaceholderBlock("playground");

// Make Block
class JSXBlock {
  function __construct($name, $renderCallback = null, $data = null) {
    $this->name = $name;
    $this->data = $data;
    $this->renderCallback = $renderCallback;
    add_action('init', [$this, 'onInit']);
  }

  function jialiBlockRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/jiali-blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    if ($this->data) {
      wp_localize_script($this->name, $this->name, $this->data);
    }

    $ourArgs = array(
      'editor_script' => $this->name
    );

    if ($this->renderCallback) {
      $ourArgs['render_callback'] = [$this, 'jialiBlockRenderCallback'];
    }

    register_block_type("jialiblocktheme/{$this->name}", $ourArgs);
  }
}

new JSXBlock('custom-width-section');
new JSXBlock('full-width-section');

// Make Nav Position
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'jiali' ),
) );

function jiali_add_search_btn( $items, $args ) {

  if ( $args->theme_location == 'primary') {
    
    $items .= '<li>
        <a class="jiali-search-btn">
                        
            <i class="fa-solid fa-search"></i>

        </a>
      </li>';
    }
    
    return $items;
}
add_filter( 'wp_nav_menu_items', 'jiali_add_search_btn', 10, 2 );

// Add 'active' Class to Active Menu Item
function jiali_special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
add_filter('nav_menu_css_class' , 'jiali_special_nav_class' , 10 , 2);


/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function jiali_post_type() {
    $labels = array(
        'name'                  => 'Appointment',
        'add_new'               => 'Add new Appointment',
        'add_new_item'          => 'Add new Appointments',
        'singular_name'         => 'Appointment',
        'edit_item'             => 'Edit Appointment',
        'all_items'             => 'All Appointments'
        );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'appointments' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-calendar',
        'supports'           => array( 'title' ),
    );
 
    register_post_type( 'appointment', $args );

    $labels = array(
        'name'                  => 'App',
        'add_new'               => 'Add new App',
        'add_new_item'          => 'Add new Apps',
        'singular_name'         => 'App',
        'edit_item'             => 'Edit App',
        'all_items'             => 'All Apps'
        );
 
    $args = array(
      'labels'             => $labels,
      'description'        => 'App custom post type.',
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'apps' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'comments', 'thumbnail' ),
      'taxonomies'         => array( 'category', 'post_tag' ),
      'show_in_rest'       => true
    );
 
    register_post_type( 'app', $args );

    $labels = array(
        'name'                  => 'Multimedia',
        'add_new'               => 'Add new Multimedia',
        'add_new_item'          => 'Add new Multimedias',
        'singular_name'         => 'Multimedia',
        'edit_item'             => 'Edit Multimedia',
        'all_items'             => 'All Multimedias'
        );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'multimedias' ),
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-admin-media',
        'supports'           => array( 'title', 'editor', 'author', 'comments', 'thumbnail' ),
        'taxonomies' => array( 'category', 'post_tag' )
    );
 
    register_post_type( 'multimedia', $args );

    $labels = array(
        'name'                  => 'Useful Link',
        'add_new'               => 'Add new Useful Link',
        'add_new_item'          => 'Add new Useful Links',
        'singular_name'         => 'Useful Link',
        'edit_item'             => 'Edit Useful Link',
        'all_items'             => 'All Useful Links'
        );
 
    $args = array(
        'labels'             => $labels,
        'has_archive'        => true,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'usefullinks' ),
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-admin-links',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'usefullink', $args );

}
add_action( 'init', 'jiali_post_type' );

// Get Breadcrumb
function jiali_get_breadcrumb() {
  echo '<a class="jiali-permalink" href="'.home_url().'" rel="nofollow">Home</a>';
  if (is_category() || is_single()) {
      echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
      $args = array(
        'exclude'                => array(get_term_by('slug', 'suggested-posts', 'category')->term_id),
        'hide_empty'             => false,
      );

      $the_query = wp_get_post_terms( get_the_ID(), 'category', $args );

      echo '<a class="jiali-permalink" href="'.get_category_link( $the_query[0]->term_id ).'">'.$the_query[0]->name.'</a>';

          if (is_single()) {
              echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
              the_title();
          }
  } elseif (is_page()) {
      echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
      echo the_title();
  } elseif (is_search()) {
      echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
      echo '"<em>';
      echo the_search_query();
      echo '</em>"';
  }
}

// Change number of posts per page
function jiali_change_posts_per_page( $query ) {

    if ( ! is_admin() && $query->is_main_query() ) {
          $query->set( 'posts_per_page', '12' );
          if ($query->is_category()) {
            $query->set( 'post_type', array( 'post', 'app', 'multimedia' ) );
          }
          $query->set( 'post_status', 'publish' );
    }

    return $query;

}

add_filter( 'pre_get_posts', 'jiali_change_posts_per_page' );

// Get Most Views Posts
function jiali_get_top_posts()
{
  // Set params
  $params = array(
    'table_name' => 'statistics_pages' ,
    'where_col' => 'type = "%s"',
    'variables_arr' => 'post'
  );

  $top_articles = jiali_read( $params );

  return $top_articles;
}

/**********************************************
 *
 * Inlcuding modules
 *
 **********************************************/

include('inc/crud-function.php');
include('inc/ajax.php');

