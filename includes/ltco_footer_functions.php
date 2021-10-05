<?php

function ltco_copyright() {
  return sprintf(
    '<span>%s</span>',
    sprintf(
      '© %s<span class="d-none d-sm-inline"> %s.</span> %s',
      '2021',
      get_bloginfo('name'),
      'Todos os direitos reservados.'
    )
  );
}

function ltco_sign( $params ) {
  list($href, $description) = $params;

  $formattedDesc = [];

  foreach (explode(' ', $description) as $value) {
    $formattedValue = str_replace(
      array('(', ')'),
      array('<strong>', '</strong>'),
      $value
    );

    array_push($formattedDesc, $formattedValue);
  }

  return sprintf(
    '<a
      href="%s"
      target="_blank"
      rel="external noopener noreferrer"
    >%s</a>',
    $href,
    implode(' ', $formattedDesc)
  );
}
