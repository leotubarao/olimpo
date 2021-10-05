<?php
function ltco_image_wp( $id, $size = 'full' ) {
  return wp_get_attachment_image_src( $id, $size )[0];
}
