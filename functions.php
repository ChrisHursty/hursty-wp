<?php
/**
 * Hursty WP functions and definitions
 */

function hursty_wp_theme_setup() {
    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register Navigation Menu
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'hursty-wp' ),
    ) );

    // Add theme support for HTML5 and Title Tag
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'title-tag' );

    // Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}

add_action( 'after_setup_theme', 'hursty_wp_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function hursty_wp_scripts_styles() {
    // FontAwesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    wp_enqueue_style( 'hursty-wp-style', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all');

    wp_enqueue_script('hursty-wp-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    // Register and Enqueue a Script
    // wp_enqueue_script( 'hursty-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20201208', true );
}

add_action( 'wp_enqueue_scripts', 'hursty_wp_scripts_styles' );

// SVG upload compatibility
function custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'custom_mime_types');
  
  function fix_svg_thumb_display() {
    echo '
      <style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
          width: 100% !important;
          height: auto !important;
        }
      </style>
    ';
  }
  add_action('admin_head', 'fix_svg_thumb_display');
  
