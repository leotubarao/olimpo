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
      <?php
        $customer_portal = get_field( 'ltco_customer_portal__link' );

        if ( $customer_portal ) {
          echo sprintf(
            '%s%s',
            '<span class="ltco_golden_icon small"></span>',
            sprintf(
              '<a href="%s" class="ltco_icon_signin">%s</a>',
              esc_url( $customer_portal ),
              'Portal do Cliente'
            )
          );
        }
      ?>
    </div>

    <div
      class="collapse navbar-collapse ltco_navbar_header__collapse"
      id="navbarHeader"
    >
      <div class="navbar-wrapper">
        <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'header',
              'depth'           => 2,
              'container'       => '',
              'menu_class'      => 'nav ltco_navbar_header__collapse__navbar',
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
