<?php

function university_files() {
  wp_enqueue_script('jiali-main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css');
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js');
  wp_enqueue_style('jiali_main_styles', get_theme_file_uri('/build/style-index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function jiali_theme_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('editor-styles');
}

add_action('after_setup_theme', 'jiali_theme_features');


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
new PlaceholderBlock("topheader");




