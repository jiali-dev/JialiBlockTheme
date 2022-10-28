<?php

function university_files() {
  wp_enqueue_script('jiali-main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js');
  wp_enqueue_style('jiali_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('jiali_extra_styles', get_theme_file_uri('/build/index.css'));
  wp_enqueue_script('font-awesome-js', get_theme_file_uri('/assets/font-awesome/all.min.js'));
  wp_enqueue_style('font-awesome-css', get_theme_file_uri('/assets/font-awesome/all.min.css'));
  wp_enqueue_style( 'jiali-rtl-style', get_stylesheet_uri('style-rtl.css') );
  wp_style_add_data( 'jiali-rtl-style', 'rtl', 'replace' );
}

add_action('wp_enqueue_scripts', 'university_files');

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

function jiali_login_title() {
  return get_bloginfo('name');
}

add_filter('login_headertitle', 'jiali_login_title');

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

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'jiali' ),
) );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
