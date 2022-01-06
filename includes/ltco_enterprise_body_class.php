<?php

function ltco_enterprise_body_class( $classes ) {
  $enterprise_type = get_field('ltco_enterprise__enterprise_type');

  if (is_singular( 'enterprise' ) && $enterprise_type) {
    if ($enterprise_type === 'blue') $classes[] = 'ltco_blue';

    if ($enterprise_type === 'green') $classes[] = 'ltco_green';
  }

  return $classes;
}

add_filter( 'body_class','ltco_enterprise_body_class' );
