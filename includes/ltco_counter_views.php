<?php
function ltco_get_post_view() {
  $count = get_post_meta( get_the_ID(), 'post_views_count', true );
  return "$count views";
}

function ltco_set_post_view() {
  $key = 'post_views_count';
  $post_id = get_the_ID();
  $count = (int) get_post_meta( $post_id, $key, true );
  $count++;
  update_post_meta( $post_id, $key, $count );
}

function ltco_posts_column_views( $columns ) {
  $columns['post_views'] = 'Views';
  return $columns;
}

add_filter( 'manage_posts_columns', 'ltco_posts_column_views' );

function ltco_posts_custom_column_views( $column ) {
  if ( $column === 'post_views') echo ltco_get_post_view();
}

add_action( 'manage_posts_custom_column', 'ltco_posts_custom_column_views' );

function ltco_loop_start_post_view() {
  if ( is_singular('enterprise') ) ltco_set_post_view();
}

// add_action( 'loop_start', 'ltco_loop_start_post_view' );
