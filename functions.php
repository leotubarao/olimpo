<?php

require_once('includes/index.php');

function ltco_path($dirname) {
  $root = '/public';

  $dirname = ($dirname === 'svgs')
    ? "$root/images/$dirname"
    : "$root/$dirname";

  return get_template_directory_uri().$dirname;
}

function ltco_post_meta_edit($type = 'post', $margin = '') {
  edit_post_link("Editar $type","","","","badge badge-warning p-2 text-uppercase $margin");
}

function ltco_condition($condition, $if, $else = null) {
  return ($condition) ? $if : $else;
}

function ltco_form_class_attr( $class ) {
  $class .= ' ltco_form';
  return $class;
}

add_filter( 'wpcf7_form_class_attr', 'ltco_form_class_attr' );

/*=================================
=            Debug PHP            =
=================================*/

function _debug( $value ) {
  echo "<pre>";
  print_r($value);
  echo "</pre>";
}

function _ltco( $value = null ) {
  global $current_user;

  if ($current_user->user_login === 'ltco') {
    _debug($value);
  }
}

/*=====  End of Debug PHP  ======*/

/*==================================
=            Upload SVG            =
==================================*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*=====  End of Upload SVG  ======*/

function ltco_query_posts( $query ) {
  if ( $query->is_main_query() )
    $query->set( 'ignore_sticky_posts', true );
    // $query->set( 'post__not_in', get_option( 'sticky_posts' ) );
}
// add_action( 'pre_get_posts', 'ltco_query_posts' );

/*==================================
=            Shortcodes            =
==================================*/

function ltco_social_shortcode() {
  ob_start();
  echo ltco_social_nav();
  return ob_get_clean();
}
add_shortcode( 'ltco_social_shortcode', 'ltco_social_shortcode' );

function ltco_whatsapp_button($atts, $content = null) {
  $props_whatsapp_button = shortcode_atts( array(
    'link' => '#',
  ), $atts );

  $props_whatsapp_button['content'] = $content;

  ob_start();
  echo get_template_part(
    'components/shortcodes/whatsapp_button',
    null,
    $props_whatsapp_button
  );
  return ob_get_clean();
}

add_shortcode( 'ltco_whatsapp_button', 'ltco_whatsapp_button' );

function ltco_sac_subject() {
  ob_start();
  echo get_template_part('components/shortcodes/sac/subject');
  return ob_get_clean();
}
add_shortcode( 'ltco_sac_subject', 'ltco_sac_subject' );

function ltco_sac_repairs() {
  ob_start();
  echo get_template_part('components/shortcodes/sac/repairs');
  return ob_get_clean();
}
add_shortcode( 'ltco_sac_repairs', 'ltco_sac_repairs' );

/*=====  End of Shortcodes  ======*/

function ltco_select_dropdown($tag, $replace ) {
  if ( $tag['name'] !== 'enterprise-field' ) return $tag;

  $rows = get_posts(
    array (
      'post_type' => 'enterprise',
      'numberposts' => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    )
  );

  if ( !$rows ) return $tag;

  foreach ( $rows as $row ) {
    $tag['raw_values'][] = $row->post_title . '|' . $row->post_title;
  }

  $pipes = new WPCF7_Pipes($tag['raw_values']);

  $tag['values'] = $pipes->collect_befores();
  $tag['labels'] = $pipes->collect_afters();
  $tag['pipes'] = $pipes;

  return $tag;
}

add_filter( 'wpcf7_form_tag', 'ltco_select_dropdown', 10, 2);

function ltco_wpcf7_elements($content) {
  $regexSpan = '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i';
  // $content = preg_replace($regexSpan, '\2', $content);

  preg_match_all(
    $regexSpan,
    $content,
    $matches
  );

  foreach($matches[2] as $match) {
    $content = str_replace(
      trim($match),
      trim(
        preg_replace(
          $regexSpan,
          '\2',
          $match
        )
      ),
      $content
    );
  }


  $content = str_replace('<br />', '', $content);

  return $content;
}

// add_filter('wpcf7_form_elements', 'ltco_wpcf7_elements');

/*=======================================
=            Themes Supports            =
=======================================*/

/*----------  Post thumbnail  ----------*/

add_theme_support( 'post-thumbnails' );

add_image_size( 'fullhd', 1920, 1080, array( 'center', 'center' ) );
// add_image_size( 'sidebar', 110, 90, array( 'center', 'center' ) );

// update_option('thumbnail_size_w', 215);
// update_option('thumbnail_size_h', 215);

/*----------  Page Excerpt  ----------*/

add_post_type_support( 'page', 'excerpt' );

/*----------  Menu  ----------*/

add_theme_support( 'menus' );

register_nav_menus(array(
  'header' => 'Header',
  'footer' => 'Footer'
));

/*----------  Title Tag  ----------*/

add_theme_support( 'title-tag' );

/*=====  End of Themes Supports  ======*/

/*====================================
=            Theme Filter            =
====================================*/

function ltco_upload_svg($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'ltco_upload_svg');

add_filter('show_admin_bar', '__return_false');

/*=====  End of Theme Filter  ======*/

/*========================================
=            Remove WordPress            =
========================================*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/*=====  End of Remove WordPress  ======*/
