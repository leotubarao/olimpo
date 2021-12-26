<?php get_header(); ?>
<?php
  $className = 'container ltco-py-2 ltco-py-md-4 ltco-py-lg-6';

  $featured_differentials = [
    'icon-car' => 'ltco_enterprise__car_space',
    'icon-shower' => 'ltco_enterprise__bathroom',
    'icon-ruler' => 'ltco_enterprise__footage'
  ];

  $featured_differentials__condition = false;

  foreach ( $featured_differentials as $icon => $field ) {
    if ( get_field( $field ) ) $featured_differentials__condition = true;
  }

  $features = (!$featured_differentials__condition) ? ' no-features' : '';
?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article <?php post_class('ltco_enterprise'); ?>>
    <?php get_template_part( 'components/navs/enterprise' ); ?>

    <section id="about" class="ltco_enterprise__about <?= $className; ?><?= $features; ?>">
      <?php
        if ($featured_differentials__condition) :

          echo '<ul class="ltco_enterprise__about__list">';

          foreach ( $featured_differentials as $icon => $field ) :
            $desc = get_field( $field );

            if ( $desc ) {
              echo sprintf(
                '<li>%s%s</li>',
                sprintf(
                  '<img src="%s" class="image img-fluid" alt="%s"/>',
                  ltco_path('svgs')."/$icon.svg",
                  $desc
                ),
                sprintf(
                  '<span class="description">%s</span>',
                  $desc
                )
              );
            }
          endforeach;

          echo '</ul>';

        endif;

        $resume_image = get_field( 'ltco_enterprise__resume_image' );

        if ( $resume_image ) {
          echo sprintf(
            '<figure class="ltco_enterprise__about__image" %s></figure>',
            styleInline($resume_image['url']),
          );
        }

        $content = get_the_content();

        if ( $content ) {
          echo sprintf(
            '<div class="ltco_enterprise__about__content">%s</div>',
            $content
          );
        }
      ?>
    </section>

    <?php
      $ltco_differentials = get_field( 'ltco_enterprise__differential' );

      if ( !$ltco_differentials ) echo '<hr/>';

      if ( $ltco_differentials ) :
    ?>
    <section id="differentials" class="ltco_enterprise__differential">
      <div class="<?= $className; ?>">
        <div class="ltco_enterprise__location__content">
          <h2 class="text-primary mb-4">Diferenciais</h2>
        </div>

        <div class="ltco_enterprise__differential__slide">
          <div id="differential_slide" class="splide padding" data-lenght="<?= count($ltco_differentials); ?>">
            <div class="splide__track">
              <ul class="splide__list">
                <?php
                  foreach ( $ltco_differentials as $item ) :
                    $termId = 'term_'.$item->term_id;
                    $icon = get_field('ltco_differentials__icon', $termId);

                    if ( !$icon ) continue;

                    echo sprintf(
                      '<li class="splide__slide d-flex flex-column align-items-center">%s%s</li>',
                      sprintf(
                        '<img src="%s" class="image img-fluid mb-2" width="90" alt="%s"/>',
                        $icon['url'],
                        $item->name
                      ),
                      sprintf(
                        '<span class="d-block text-center description">%s</span>',
                        $item->name
                      )
                    );
                  endforeach;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php endif; ?>

    <?php
      $ltco_maps = ltco_the_field('ltco_enterprise__maps');

      if ( $ltco_maps ) :
    ?>

    <section id="location" class="ltco_enterprise__location <?= $className; ?>">
      <div class="ltco_enterprise__location__content">
        <h2 class="text-primary mb-4">Localização</h2>
        <address>
          <?= ltco_the_field('ltco_enterprise__location'); ?>
        </address>
      </div>
      <?= ltco_maps( $ltco_maps ); ?>
    </section>

    <?php endif; ?>

    <?php
      $gallery = 'ltco_enterprise__gallery';

      if ( have_rows( $gallery ) ) :
    ?>
    <section id="gallery" class="ltco_enterprise__gallery">
      <div id="gallery_slide" class="splide">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
              while( have_rows( $gallery ) ) : the_row();
                $title = ltco_the_field( $gallery.'__title', 'sub' );
                $image = get_sub_field( $gallery.'__image' );

                $caption = sprintf(
                  '<div class="ltco_enterprise__gallery__image__description">%s</div>',
                  sprintf(
                    '<div class="container">%s</div>',
                    $title
                  )
                );

                echo sprintf(
                  '<li class="splide__slide">%s</li>',
                  sprintf(
                    '<figure class="ltco_enterprise__gallery__image" %s>%s</figure>',
                    styleInline($image['url']),
                    $caption
                  )
                );
              endwhile;
            ?>
          </ul>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php
      $humanized_project = 'ltco_enterprise__humanized_project';

      if ( have_rows( $humanized_project ) ) :
    ?>
    <section id="humanized-project" class="ltco_enterprise__humanized_project">
      <div class="<?= $className; ?>">
        <div class="ltco_enterprise__humanized_project__wrapper">
          <div id="project_slide" class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                <?php
                  while( have_rows( $humanized_project ) ) : the_row();
                    $image = get_sub_field( $humanized_project.'__image' );

                    echo sprintf(
                      '<li class="splide__slide">%s</li>',
                      sprintf(
                        '<figure class="ltco_enterprise__humanized_project__image" %s></figure>',
                        styleInline($image['url']),
                      )
                    );

                  endwhile;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <section id="work-stage" class="ltco_enterprise__work_stage">
      <div class="<?= $className; ?>">
        <h2 class="text-primary mb-4">Andamento da Obra</h2>

        <ul>
          <?php
            $work_stage = ltco_the_field('ltco_enterprise__work_stage');

            foreach ( $work_stage as $item ) :
              $label = $item['ltco_enterprise__work_stage__title'];
              $percentage = $item['ltco_enterprise__work_stage__percents'];
          ?>

          <li>
            <div class="ltco_enterprise__work_stage__content">
              <span><?= $label; ?></span>
              <span><?= $percentage; ?>%</span>
            </div>

            <div
              class="ltco_enterprise__work_stage__status"
              style="width: <?= $percentage; ?>%"
            ></div>
          </li>

          <?php endforeach; ?>
        </ul>
        <?php
          $updateDate = ltco_the_field('ltco_enterprise__work_stage__update_date');

          if ( $updateDate ) {
            echo sprintf(
              '<p class="mb-0">Atualizado em %s</p>',
              $updateDate
            );
          }
        ?>
      </div>
    </section>
  </article>

  <?php endwhile; ?>

<?php get_footer(); ?>
