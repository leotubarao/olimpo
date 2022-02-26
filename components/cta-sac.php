<?php
  $customer_sac = get_field( 'ltco_links__sac', 'options' );

  if ( $customer_sac ) :
?>
<div class="ltco_before_footer">
  <div class="container ltco-py-2">
    <p class="h2 text-white">Problemas ou dúvidas? Entre em contato com nosso SAC</p>
    <?php
      echo sprintf(
        '<a href="%s" class="%s" title="%s">%s</a>',
        esc_url( $customer_sac, 'https', '#' ),
        'btn btn-outline-white ltco_button',
        'Vá para o SAC',
        'Clique aqui'
      );
    ?>
  </div>
</div>
<?php endif; ?>
