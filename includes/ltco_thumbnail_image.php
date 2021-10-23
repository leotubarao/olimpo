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
  $heroImage = get_field( 'ltco_enterprise__hero_image' );

  if ( is_singular( 'enterprise' ) ) return $$heroImage['url'];

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
  $heroImage = get_field( 'ltco_enterprise__hero_image' );

  if ( is_singular( 'enterprise' ) && !$heroImage ) return $class;

  if ( !has_post_thumbnail( $id ) ) return $class;
}

function ltco_has_overlay() {
  if ( !get_field( 'ltco_enterprise__has_overlay' ) ) return 'no-overlay';
}

function ltco_enterprise_classes( $classes = null ) {
  $arrayClasses = [
    $classes,
    ltco_has_thumbs(),
    ltco_has_overlay()
  ];

  return sprintf(
    ' class="%s"',
    implode(' ', array_filter($arrayClasses))
  );
}
