<?php

function ojsite_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' ); 
  show_admin_bar( false );
}

add_action( 'after_setup_theme', 'ojsite_setup' );

function ojsite_scripts() {
  // Load our main stylesheet.
  wp_enqueue_style( 'ojsite-style', get_stylesheet_uri() );

  // Load our javascript.
  // wp_enqueue_script( 'ojsite-script', get_template_directory_uri() . '/js/main.js', array(), '20180924', true);
}

add_action( 'wp_enqueue_scripts', 'ojsite_scripts' );

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

add_filter('the_author_description', 'lb_to_auth_desc');

function lb_to_auth_desc($content){
  return nl2br($content);
}

?>