<?php

$GLOBALS['ltco_query'] = array( 'city', 'most-recent', 'most-seen' );

function ltco_enterprises_query_vars_filter( $vars ) {
  foreach( $GLOBALS['ltco_query'] as $params ) {
    $vars[] .= $params;
  }

  return $vars;
}
add_filter( 'query_vars', 'ltco_enterprises_query_vars_filter' );

function ltco_max_pages() {
  global $wp_query;

  return $wp_query->max_num_pages;
}

function ltco_enterprise_scripts_filter() {
  global $wp_query;

  wp_enqueue_script(
    'enterprises',
    ltco_path('scripts').'/enterprises_ajax.js',
    array( 'jquery' ),
    '1.0.0',
    true
  );

  wp_localize_script( 'enterprises', 'options', array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'posts' => json_encode( $wp_query->query_vars ),
    'enterprise_page' => home_url( 'empreendimentos' )
  ) );
}

add_action( 'wp_enqueue_scripts', 'ltco_enterprise_scripts_filter');

function ltco_ajax_handler() {
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['post_status'] = 'publish';

  query_posts( $args );

  while( have_posts() ): the_post();
    get_template_part( 'components/posts/enterprise' );
  endwhile;

  die;
}

add_action('wp_ajax_ltco_enterprises', 'ltco_ajax_handler');
add_action('wp_ajax_nopriv_ltco_enterprises', 'ltco_ajax_handler');

function ltco_enterprise_query() {
  $args = array(
    'post_type' => 'enterprise',
    'order' => 'DESC',
    'orderby' => 'menu_order',
    'post_status' => 'publish',
    'showposts' => -1
  );

  foreach( $GLOBALS['ltco_query'] as $params ) {
    if ( empty( get_query_var( $params ) ) ) continue;

    $value = explode(',', $_GET[ $params ]);

    if ( $params === 'city' ) {
      $args['order'] = 'ASC';
      $args['tax_query'][] = array(
        'taxonomy' => $params,
        'field' => 'slug',
        'terms' => $value
      );

      continue;
    }

    if ( $params === 'most-recent' && $value ) $args['orderby'] = 'date';

    if ( $params === 'most-seen' && $value ) {
      $args['orderby'] = 'meta_value_num';
      $args['meta_query'][] = array(
        'key' => 'post_views_count'
      );
    }
  }

  return $args;
}
