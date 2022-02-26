<header class="header home" <?= ltco_thumbnail_post(6); ?>>
  <div class="container">
    <?= ltco_social_nav('home'); ?>
    <div class="content">
      <span class="ltco_golden_icon three"></span>
      <h1 class="text-white font-weight-normal">
        FAZEMOS<br/>
        O SEU SONHO<br/>
        TORNAR<br/>
        REALIDADE!
      </h1>
      <a
        href="<?= esc_url( home_url( 'empreendimentos' ) ); ?>"
        class="btn btn-outline-secondary ltco_button"
        title="Conheça mais"
      >
        Conheça mais
      </a>
    </div>
    <?php get_template_part('components/sliders/banner'); ?>
  </div>
</header>
