<?php
  $customer_portal = get_field( 'ltco_links__sac', 'options' );

  if ( $customer_portal ) :
?>
<div class="ltco_before_footer">
  <div class="container ltco-py-2">
    <p class="h2 text-white">Problemas ou dúvidas? Entre em contato com nosso SAC</p>
    <?php
      echo sprintf(
        '<a href="%s" class="btn btn-outline-white ltco_button" target="_blank" >%s</a>',
        esc_url( $customer_portal, 'https', '#' ),
        'Clique aqui'
      );
    ?>
  </div>
</div>
<?php endif; ?>
