<header
  <?= ltco_enterprise_classes( 'header enterprise' ); ?>
  <?= ltco_thumbnail_post( get_the_ID() ); ?>
>
  <div class="container">
    <div class="content">
      <span class="ltco_golden_icon three"></span>
      <h1 class="heading">
        <?= ltco_title(); ?>

        <small>
          <?= get_the_terms(get_the_ID(), 'city')[0]->name; ?>
        </small>
      </h1>

      <p>Para informações e vendas, cadastre-se que um de nossos corretores irá entrar em contato.</p>
    </div>
    <div class="ltco_form_wrapper ltco_form">
      <span class="h2 text-white d-block">Cadastre-se</span>

      <?php ltco_cf7_shortcode(); ?>
    </div>
    <span class="ltco_icon_arrow_down"></span>
  </div>
</header>
