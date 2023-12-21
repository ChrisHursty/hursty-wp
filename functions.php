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
    // Enqueue Owl Carousel CSS
    wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');

    // Enqueue Owl Carousel JavaScript
    wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);

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

// Testimonials 12/19/23
function register_testimonial_post_type() {
  $args = array(
      'public'   => true,
      'label'    => 'Testimonials',
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
  );
  register_post_type('testimonial', $args);
}
add_action('init', 'register_testimonial_post_type');

// Global CTA  12/19/23
function hursty_wp_customize_register( $wp_customize ) {
  // Add a new panel for 'Call To Action'
  $wp_customize->add_panel( 'call_to_action_panel', array(
      'title'       => __( 'Call To Action', 'hursty-wp' ),
      'description' => 'Global Call To Action', // Optional description
      'priority'    => 20, // Adjust the priority to position it
  ));

  // Add a section within the panel
  $wp_customize->add_section( 'call_to_action_section', array(
      'title' => __( 'Settings', 'hursty-wp' ),
      'panel' => 'call_to_action_panel',
  ));

  // Add settings to the section
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'heading', 'Heading', 'text' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'text', 'Text', 'textarea' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_text', 'Button Text', 'text' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_url', 'Button URL', 'url' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'background_color', 'Background Color', 'color' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'text_color', 'Text Color', 'color' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_background_color', 'Button Background Color', 'color' );
  hursty_wp_add_customizer_setting( $wp_customize, 'call_to_action_section', 'button_text_color', 'Button Text Color', 'color' );
}

add_action( 'customize_register', 'hursty_wp_customize_register' );

function hursty_wp_add_customizer_setting( $wp_customize, $section, $setting_id, $label, $type ) {
  $wp_customize->add_setting( $setting_id, array(
      'default' => '',
      'sanitize_callback' => 'wp_kses_post',
  ));

  $control_type = 'WP_Customize_Control';
  if ( $type === 'textarea' ) {
      $control_type = 'WP_Customize_Control';
      $type = 'textarea';
  } elseif ( $type === 'color' ) {
      $control_type = 'WP_Customize_Color_Control';
  }

  $wp_customize->add_control( new $control_type( $wp_customize, $setting_id, array(
      'label' => $label,
      'section' => $section,
      'settings' => $setting_id,
      'type' => $type,
  )));
}
