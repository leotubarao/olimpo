<?php

function ltco_logo_color() {
  $enterprise_type = get_field('ltco_enterprise__enterprise_type');

  $color = 'orange';

  if (is_singular( 'enterprise' ) && $enterprise_type && $enterprise_type !== 'default')
    $color = $enterprise_type;

  return sprintf(
    '<img src="%s" width="130" alt="logo-olimpo" />',
    ltco_path('svgs')."/logo_olp_vendas_$color.svg"
  );
}
