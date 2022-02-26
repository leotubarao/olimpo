<?php
function ltco_get_page_id() {
  if ( is_archive( 'enterprise' ) ) return 6;

  return null;
}

function ltco_get_image_ref() {
  return 'https://via.placeholder.com/1500/DBDBDB/000000?text=No+Image';
}

function styleInline( $image ) {
  return " style='background-image: url($image)'";
}

function ltco_thumbnail_image( $id = null ) {
  $heroImage = get_field( 'ltco_enterprise__hero_image', $id );

  if ( is_singular( 'enterprise' ) ?? is_front_page() ) return $heroImage['url'];

  if ( has_post_thumbnail( $id ) )
    return get_the_post_thumbnail_url( $id, 'full' );
}

function ltco_thumbnail_post( $params = null ) {
  if (is_array($params) && $params[0] === 'acf') {
    $params = array_slice($params, 1);
    return styleInline( ltco_the_field($params, 'image') );
  }

  if ($params === 'ref') return styleInline( ltco_get_image_ref() );

  if ( ltco_thumbnail_image( $params ) )
    return styleInline( ltco_thumbnail_image( $params ) );
}

function ltco_has_thumbs( $id = null ) {
  $class = 'no-thumbs';
  $heroImage = get_field( 'ltco_enterprise__hero_image', $id );

  if ( (is_front_page() ?? is_singular( 'enterprise' ) ) && !$heroImage ) return $class;

  if ( !has_post_thumbnail( $id ) ) return $class;
}

function ltco_has_overlay( $id = null ) {
  if ( !get_field( 'ltco_enterprise__has_overlay', $id ) ) return 'no-overlay';
}

function ltco_enterprise_classes( $classes = null, $id = null ) {
  $arrayClasses = [
    $classes,
    ltco_has_thumbs( $id ),
    ltco_has_overlay( $id )
  ];

  return sprintf(
    ' class="%s"',
    implode(' ', array_filter($arrayClasses))
  );
}
