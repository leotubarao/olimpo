<?php /* Template Name: Nosso Negócios */ ?>
<?php get_header(); ?>

  <article <?php post_class('ltco_our_business'); ?>>
    <div class="ltco_our_business__cta">
      <div class="container ltco-py-2">
        <p class="h2 text-white">A Olimpo tem o empreendimento perfeito para você!</p>
        <a href="<?= esc_url( home_url( 'empreendimentos' ) ); ?>" class="btn btn-outline-tertiary ltco_button" title="Conheça mais">Conheça mais</a>
      </div>
    </div>

    <div class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lobortis egestas ligula id fermentum. Etiam consequat et libero nec rutrum. Nulla non ex vel dolor tristique ultrices sed a justo. Ut non metus venenatis, vehicula odio sed, scelerisque diam. Suspendisse rhoncus bibendum enim, eget imperdiet metus congue quis. Sed et erat tincidunt, maximus metus a, tempus nisi. Morbi aliquam leo at euismod ullamcorper. Phasellus ac nisi sed neque molestie rutrum. Nunc tempor enim ac est suscipit, non malesuada ligula porttitor. Vestibulum pretium pretium libero, ac aliquam urna viverra in. Ut feugiat a diam nec aliquam. Nam quis lacinia sapien, ac imperdiet lectus. Duis id odio quam.</p>
      <p>In dictum eros a massa dignissim finibus. Vivamus cursus at mauris sit amet ultricies. Suspendisse vitae bibendum nulla, at lacinia libero. Etiam vestibulum porttitor ex, id aliquam dui tincidunt id. Ut sollicitudin suscipit dolor et lacinia. Integer viverra eros quis erat tincidunt pulvinar. Nulla venenatis iaculis ex eu lobortis. Vivamus blandit auctor erat, ut scelerisque nisl malesuada non. Aenean quam lectus, tempus sit amet libero non, finibus mollis neque.</p>

      <section class="ltco_our_business__triade ltco-pt-2 ltco-pt-md-4">
        <div class="row-grid">
          <?php
            $content = [
              [
                'icon' => 'icon-point-global',
                'title' => 'Gestão de ativos imobilários'
              ],
              [
                'icon' => 'icon-shake-hands',
                'title' => 'Financial'
              ],
              [
                'icon' => 'icon-get-key',
                'title' => 'Incorporação e venda'
              ],
            ];

            foreach ($content as $item) :
          ?>

          <div class="ltco_our_business__triade__item">
            <img src="<?= ltco_path('svgs'); ?>/<?= $item['icon'] ?>.svg" alt="<?= $item['icon'] ?>">
            <p class="heading h5"><?= $item['title'] ?></p>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lobortis egestas ligula id fermentum. Etiam consequat et libero nec rutrum. Nulla non ex vel dolor tristique ultrices sed a justo. Ut non metus venenatis, vehicula odio sed, scelerisque diam. Suspendisse rhoncus bibendum enim, eget imperdiet metus</p>
            </div>
          </div>

          <?php endforeach; ?>
        </div>

        <div id="business_slide" class="splide padding">
          <div class="splide__track">
            <ul class="splide__list">
              <?php
                $content = [
                  [
                    'icon' => 'icon-point-global',
                    'title' => 'Gestão de ativos imobilários'
                  ],
                  [
                    'icon' => 'icon-shake-hands',
                    'title' => 'Financial'
                  ],
                  [
                    'icon' => 'icon-get-key',
                    'title' => 'Incorporação e venda'
                  ],
                ];

                foreach ($content as $item) :
              ?>

              <li class="splide__slide ltco_our_business__triade__item">
                <img src="<?= ltco_path('svgs'); ?>/<?= $item['icon'] ?>.svg" alt="<?= $item['icon'] ?>">
                <p class="heading h5"><?= $item['title'] ?></p>
                <div class="content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lobortis egestas ligula id fermentum. Etiam consequat et libero nec rutrum. Nulla non ex vel dolor tristique ultrices sed a justo. Ut non metus venenatis, vehicula odio sed, scelerisque diam. Suspendisse rhoncus bibendum enim, eget imperdiet metus</p>
                </div>
              </li>

              <?php endforeach; ?>

            </ul>
          </div>
        </div>
      </section>
    </div>
  </article>

<?php get_footer(); ?>
