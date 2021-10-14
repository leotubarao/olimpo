<?php
  $ltco_maps_iframe = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.5749373088693!2d-46.93980878504266!3d-22.445019085248525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8f90b9a73dc0d%3A0xdff51b0e5fa3b8b4!2sAv.%20Expedito%20Quartieri%2C%201300%20-%20Jardim%20Helena%2C%20Mogi%20Mirim%20-%20SP%2C%2013801-156!5e0!3m2!1spt-BR!2sbr!4v1632045684757!5m2!1spt-BR!2sbr';
?>

<?php get_header(); ?>
<?php $className = 'container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'; ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article <?php post_class('ltco_enterprise'); ?>>
    <?php get_template_part( 'components/navs/enterprise' ); ?>

    <section id="about" class="ltco_enterprise__about <?= $className; ?>">
      <ul class="ltco_enterprise__about__list">
        <?php
          $featured_differentials = [
            'icon-car' => 'ltco_enterprise__car_space',
            'icon-shower' => 'ltco_enterprise__bathroom',
            'icon-ruler' => 'ltco_enterprise__footage'
          ];

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
        ?>
      </ul>

      <figure
        class="ltco_enterprise__about__image"
        <?= styleInline(ltco_image_wp(28)); ?>
      ></figure>

      <?php
        $content = get_the_content();

        if ( $content ) {
          echo sprintf(
            '<div class="ltco_enterprise__about__content">%s</div>',
            $content
          );
        }
      ?>
    </section>

    <section id="differentials" class="ltco_enterprise__differential">
      <div class="<?= $className; ?>">
        <div class="ltco_enterprise__location__content">
          <h2 class="text-primary mb-4">Diferenciais</h2>
        </div>

        <div class="ltco_enterprise__differential__slide">
          <div id="differential_slide" class="splide padding">
            <div class="splide__track">
              <ul class="splide__list">
                <?php
                  $i = 0;
                  while ($i < 5) :
                    echo sprintf(
                      '<li class="splide__slide d-flex flex-column align-items-center">%s%s</li>',
                      sprintf(
                        '<img src="%s" class="image img-fluid mb-2" alt="%s"/>',
                        ltco_path('svgs').'/icon-swimming.svg',
                        $i
                      ),
                      sprintf(
                        '<span class="d-block text-center description">%s</span>',
                        'Piscina quente'
                      )
                    );
                  $i++;
                  endwhile;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="location" class="ltco_enterprise__location <?= $className; ?>">
      <div class="ltco_enterprise__location__content">
        <h2 class="text-primary mb-4">Localização</h2>
        <address>
          Av. Expedito Quartieri, 1300<br/>
          Jardim Helena<br/>
          Mogi Mirim - SP
        </address>
      </div>
      <?= ltco_maps( $ltco_maps_iframe ); ?>
    </section>

    <section id="gallery" class="ltco_enterprise__gallery">
      <div id="gallery_slide" class="splide">
        <div class="splide__track">
          <ul class="splide__list">
            <?php
              $i = 0;
              $caption = sprintf(
                '<div class="ltco_enterprise__gallery__image__description">%s</div>',
                sprintf(
                  '<div class="container">%s</div>',
                  'Piscina quente'
                )
              );

              while ($i < 5) :
                echo sprintf(
                  '<li class="splide__slide">%s</li>',
                  sprintf(
                    '<figure class="ltco_enterprise__gallery__image" %s>%s</figure>',
                    styleInline(ltco_image_wp(28)),
                    $caption
                  )
                );
              $i++;
              endwhile;
            ?>
          </ul>
        </div>
      </div>
    </section>

    <section id="humanized-project" class="ltco_enterprise__humanized_project">
      <div class="<?= $className; ?>">
        <div class="ltco_enterprise__humanized_project__wrapper">
          <div id="project_slide" class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                <?php
                  $i = 0;
                  while ($i < 5) :
                    echo sprintf(
                      '<li class="splide__slide">%s</li>',
                      sprintf(
                        '<figure class="ltco_enterprise__humanized_project__image" %s></figure>',
                        styleInline(ltco_image_wp(28))
                      )
                    );
                  $i++;
                  endwhile;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="work-stage" class="ltco_enterprise__work_stage">
      <div class="<?= $className; ?>">
        <h2 class="text-primary mb-4">Andamento da Obra</h2>

        <ul>
          <?php
            $work_stage = [
              'Andamento geral' => 49,
              'Fundação' => 100,
              'Estrutura' => 79,
              'Alvenaria' => 50,
              'Acabamento' => 40,
              'Área comum' => 20
            ];

            foreach ( $work_stage as $label => $percentage ) :
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
        <p class="mb-0">Atualizado em 15/06/2021</p>
      </div>
    </section>
  </article>

  <?php endwhile; ?>

<?php get_footer(); ?>
