<?php

function ltco_styles_theme() {
  wp_register_style(
    'main-css',
    ltco_path('styles').'/main.css',
    array(),
    false
  );

  wp_register_style(
    'splidejs',
    ltco_path('styles').'/splide.min.css',
    array(),
    false
  );

  wp_register_style(
    'fonts-google',
    'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap',
    array(),
    false
  );

  wp_register_style(
    'style',
    get_stylesheet_uri(),
    array( 'splidejs', 'fonts-google', 'main-css' )
  );

  wp_enqueue_style( 'style' );
}

add_action( 'wp_enqueue_scripts', 'ltco_styles_theme' );

function ltco_scripts_theme() {
  wp_deregister_script( 'jquery' );

  wp_register_script(
    'jquery',
    ltco_path('scripts').'/jquery.min.js',
    array(),
    false,
    true
  );

  wp_register_script(
    'bootstrap',
    ltco_path('scripts').'/bootstrap.min.js',
    array('jquery'),
    false,
    true
  );

  wp_register_script(
    'popper',
    ltco_path('scripts').'/popper.min.js',
    array('jquery', 'bootstrap'),
    false,
    true
  );

  wp_register_script(
    'jquery_mask',
    ltco_path('scripts').'/jquery.mask.min.js',
    array('jquery'),
    false,
    true
  );

  wp_register_script(
    'splidejs',
    ltco_path('scripts').'/splide.min.js',
    array('jquery'),
    false,
    true
  );

  wp_register_script(
    'sweetalert',
    ltco_path('scripts').'/sweetalert.min.js',
    array(),
    false,
    true
  );

  wp_register_script(
    'main',
    ltco_path('scripts').'/main.js',
    array('bootstrap', 'jquery_mask', 'splidejs', 'sweetalert'),
    false,
    true
  );

  wp_register_script(
    'ltco_dev',
    'https://leotubarao.github.io/signature/build/signature-ltco.js?theme=light',
    array( 'main' ),
    '2.0.0',
    true
  );

  wp_enqueue_script( 'ltco_dev' );

}
add_action( 'wp_enqueue_scripts', 'ltco_scripts_theme' );


function ltco_preconnect() {
  $preconnect = '';

  $preconnect .= '<link rel="preconnect" href="https://fonts.googleapis.com" />';
  $preconnect .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>';

  echo $preconnect;
}
add_action('wp_head', 'ltco_preconnect', 0);
