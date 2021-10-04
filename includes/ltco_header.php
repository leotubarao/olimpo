<?php
function ltco_header( $name = null ) {
  do_action( 'ltco_header', $name );

  $templates = array();
  $name = (string) $name;

  if ( '' !== $name ) {
    $templates[] = "components/headers/{$name}.php";
  }

  $templates[] = 'components/headers/default.php';

  locate_template( $templates, true );
}

function ltco_headers() {
  if ( is_singular( 'enterprise' ) ) {
    ltco_header( 'enterprise' );
    return;
  }

  if ( is_front_page() ) {
    ltco_header( 'home' );
    return;
  }

  ltco_header();
}
