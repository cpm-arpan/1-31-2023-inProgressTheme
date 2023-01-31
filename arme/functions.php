<?php
//bootstrap css
// =========================================================================
//wp_enqueue_style('bootstrap-css',get_template_directory(). '/css/bootstrap.css');
function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'arme-style', get_stylesheet_uri() );
// 	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
  wp_enqueue_style('arme-bss', "https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap");
  wp_enqueue_style('arme-icon', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
// 	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
 }
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//Start menu ==============================================================================
add_theme_support('menus');

register_nav_menus(
    array(
      'primary' => 'Primary Menu',
      'footer' => 'Footer Menu'
    )
  );

  require get_template_directory() . '/customizer-repeater/functions.php';
  //Linking customizer================================================================
  require_once get_template_directory() . '/inc/customizer.php';


  ?>