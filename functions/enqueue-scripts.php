<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );

    // Adding Headroom scripts file in the footer
  	wp_enqueue_script( 'headroom-js', get_template_directory_uri() . '/assets/headroom/headroom.js', array( 'jquery' ), '', true );

    // Adding OWL scripts file in the footer
  	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js', array( 'jquery' ), '', true );

    // Register owl main stylesheet
  	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/owlcarousel/assets/owl.carousel.min.css');

  	// Register owl default stylesheet
  	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/owlcarousel/assets/owl.theme.default.min.css');


    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
