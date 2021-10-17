<?php
function ltco_acf_show_admin(){
  global $current_user;

  if ( $current_user->user_login != 'ltco' ) {
    remove_menu_page( 'edit.php?post_type=acf-field-group' );
  }
}
add_action( 'admin_menu', 'ltco_acf_show_admin', 100 );

/*----------  Render Custom Field  ----------*/

function ltco_the_field( $params, $type = false ) {
  if ( is_array( $params ) ) list($value, $id) = $params;

  $value = ( is_array( $params ) ) ? $value : $params;

  $array = [];
  $typesSubArray = array( 'sub', 'subImage', 'subUrl' );
  $typesArray = array( 'image', 'url', 'subImage', 'subUrl' );

  array_push($array, $value, $id);

  $field = ( $type && in_array($type, $typesSubArray) ) ? get_sub_field( ...$array ) : get_field( ...$array );

  if ( !empty( $field ) ) {
    return ( in_array($type, $typesArray) ) ? $field['url'] : $field;
  }
}
