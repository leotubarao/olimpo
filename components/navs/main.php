<nav class="navbar navbar-dark ltco_navbar_header">
  <div class="container">
    <a class="navbar-brand" href="<?= home_url(); ?>">
      <img
        src="<?= ltco_path('svgs'); ?>/logo-olimpo.svg"
        width="210"
        alt="logo-olimpo"
      />
    </a>

    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarHeader"
      aria-controls="navbarHeader"
      aria-expanded="false"
      aria-label="Abrir navegação"
    >
      <span class="navbar-toggler-icon"></span>
      Menu
    </button>

    <div class="ltco_navbar_header__navbar_visible">
      <span class="ltco_golden_icon small"></span>
      <a href="<?= esc_url( home_url( 'empreendimentos' ) ); ?>">Empreendimentos</a>
      <span class="ltco_golden_icon small"></span>
      <a href="<?= esc_url( home_url( 'login' ) ); ?>" class="ltco_icon_signin">Portal do Cliente</a>
    </div>

    <div
      class="collapse navbar-collapse ltco_navbar_header__collapse"
      id="navbarHeader"
    >
      <div class="navbar-wrapper">
        <button
          class="navbar-toggler inside"
          type="button"
          data-toggle="collapse"
          data-target="#navbarHeader"
          aria-controls="navbarHeader"
          aria-expanded="false"
          aria-label="Fechar navegação"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'header',
              'depth'           => 2,
              'container'       => '',
              'menu_class'      => 'navbar-nav ltco_navbar_header__collapse__navbar',
              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'walker'          => new WP_Bootstrap_Navwalker()
            )
          );
        ?>

        <footer class="ltco_navbar_header__collapse__footer">
          <?= ltco_social_nav(); ?>
        </footer>
      </div>
    </div>
  </div>
</nav>
