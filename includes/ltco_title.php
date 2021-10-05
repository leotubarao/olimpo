<?php
function ltco_title() {
  $titleSearch = sprintf(
    'Resultados da pesquisa: %s',
    esc_html( get_search_query() )
  );

  $titleEnterprisePage = get_the_title(6);

  if ( is_search() ) return $titleSearch;

  if ( is_archive( 'enterprise' ) ) return $titleEnterprisePage;

  return get_the_title();
}

function the_title_enterprise( $content ) {
  return implode(' - ', [get_the_title(), $content]);
}
