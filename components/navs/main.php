<nav class="navbar navbar-dark ltco_navbar_header">
  <div class="container">
    <a class="navbar-brand" href="<?= home_url(); ?>">
      <?= ltco_logo_color(); ?>
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
        $customer_sac = get_field( 'ltco_links__sac', 'options' );

        if ( $customer_sac ) {
          echo sprintf(
            '%s%s',
            '<span class="ltco_golden_icon small"></span>',
            sprintf(
              '<a href="%s" title="%s">%s</a>',
              esc_url( $customer_sac, 'https', '#' ),
              'Página de SAC',
              'SAC'
            )
          );
        }

        $customer_portal = get_field( 'ltco_links__customer_portal', 'options' );

        if ( $customer_portal ) {
          echo sprintf(
            '%s%s',
            '<span class="ltco_golden_icon small"></span>',
            sprintf(
              '<a href="%s" class="ltco_icon_signin" target="_blank">%s</a>',
              esc_url( $customer_portal, 'https', '#' ),
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
