<section class="ltco_nav_scroll">
  <nav class="navbar navbar-light flex-column justify-content-md-center">
    <div class="navbar-nav-scroll">
      <ul class="navbar-nav bd-navbar-nav flex-row align-items-center">
      <?php

        $links_enterprises = [
          '#about' => 'O Empreendimento',
          '#differentials' => 'Diferenciais',
          '#location' => 'Localização',
          '#gallery' => 'Fotos',
          '#humanized-project' => 'Planta Humanizada',
          '#work-stage' => 'Andamento da Obra'
        ];

        foreach ( $links_enterprises as $anchorLink => $label ) :
          /* switch ( $anchorLink ) {
            case '#about':
              $condition_link = get_the_content();
              break;

            case '#differentials':
              $condition_link = !empty( get_field( 'ltco_enterprise__differentials' ) );
              break;

            case '#location':
              $condition_link = !empty( get_field( 'ltco_enterprise__location' ) );
              break;

            case '#gallery':
              $condition_link = have_rows( 'ltco_enterprise__gallery' );
              break;

            case '#humanized-project':
              $condition_link = have_rows( 'ltco_enterprise__humanized_project' );
              break;

            case '#work-stage':
              $condition_link = have_rows( 'ltco_enterprise__work_stage' );
              break;
          } */
          $condition_link = true;

          if ( $condition_link ) {
            echo sprintf(
              '<li class="nav-item">%s</li>',
              sprintf(
                '<a href="%s" class="nav-link" title="%s">%s</a>',
                $anchorLink,
                $label,
                $label
              )
            );
          }
        endforeach;
      ?>

      </ul>
    </div>
  </nav>
</section>
