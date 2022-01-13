<?php
  $args = wp_parse_args($args);

  echo sprintf(
    '<a href="%s" target="_blank" class="btn btn-success px-4 py-3 d-inline-flex align-items-center" title="%s">%s</a>',
    esc_attr( $args['link'] ),
    esc_html( $args['content'] ) ?? 'Fale pelo WhatsApp',
    sprintf(
      '%s%s',
      sprintf(
        '<img src="%s" width="26" alt="ltco_icon whatsapp" />',
        ltco_path('svgs').'/icon_whatsapp.svg'
      ),
      sprintf(
        '<span class="ml-2">%s</span>',
        esc_html( $args['content'] ) ?? 'Fale pelo WhatsApp'
      )
    )
  );
?>
