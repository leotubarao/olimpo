<?php

function ltco_logo_color() {
  $enterprise_type = get_field('ltco_enterprise__enterprise_type');

  if (is_singular( 'enterprise' ) && $enterprise_type && $enterprise_type !== 'default')
    $color = "_$enterprise_type";

  return sprintf(
    '<img src="%s" width="130" alt="logo-olimpo" />',
    ltco_path('svgs')."/logo_olp$color.svg"
  );
}
