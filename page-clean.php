<?php
  /* Template Name: Página limpa */

  get_header('error');

  while ( have_posts() ) : the_post();
    the_content();
  endwhile;

  get_footer('error');

?>
