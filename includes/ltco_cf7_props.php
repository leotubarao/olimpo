<?php

function ltco_cf7_shortcode() {
  while ( have_posts() ) : the_post();
    echo do_shortcode( '[contact-form-7 id="203" title="Empreendimento"]' );
  endwhile;
}
