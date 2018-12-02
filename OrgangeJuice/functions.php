<?php

show_admin_bar( false );
add_theme_support( 'post-thumbnails' ); 

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