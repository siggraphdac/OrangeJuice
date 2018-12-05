<?php

function ojsite_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' ); 
  set_post_thumbnail_size( 150, 150 );
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

function remove_shortcode_from_singles( $content ) {
  if ( is_single() ) {
      $content = strip_shortcodes( $content );
  }
  return $content;
}

function remove_author_name( $content ) {
  $content = preg_replace('/(<h4>.+?)+(<\/h4>)/i', '', $content);
  return $content;
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// This will suppress empty email errors when submitting the user form
add_action('user_profile_update_errors', 'my_user_profile_update_errors', 10, 3 );
function my_user_profile_update_errors($errors, $update, $user) {
    $errors->remove('empty_email');
}

// This will remove javascript required validation for email input
// It will also remove the '(required)' text in the label
// Works for new user, user profile and edit user forms
add_action('user_new_form', 'my_user_new_form', 10, 1);
add_action('show_user_profile', 'my_user_new_form', 10, 1);
add_action('edit_user_profile', 'my_user_new_form', 10, 1);
function my_user_new_form($form_type) {
    ?>
    <script type="text/javascript">
        jQuery('#email').closest('tr').removeClass('form-required').find('.description').remove();
        // Uncheck send new user email option by default
        <?php if (isset($form_type) && $form_type === 'add-new-user') : ?>
            jQuery('#send_user_notification').removeAttr('checked');
        <?php endif; ?>
    </script>
    <?php
}

?>