<?php /* Template Name: Nosso Negócios */ ?>
<?php get_header(); ?>

  <article <?php post_class('ltco_our_business'); ?>>
    <div class="ltco_our_business__cta">
      <div class="container ltco-py-2">
        <p class="h2 text-white">A Olimpo tem o empreendimento perfeito para você!</p>
        <a href="<?= esc_url( home_url( 'empreendimentos' ) ); ?>" class="btn btn-outline-white ltco_button" title="Conheça mais">Conheça mais</a>
      </div>
    </div>

    <div class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">
      <p>A Olimpo possui o objetivo de gerar valor no processo de desenvolvimento imobiliário e alta rentabilidade na cadeia lógica do negócio, a OLIMPO atua na estruturação, aquisição e gestão de ativos imobiliários, como loteamentos, incorporações residenciais e comerciais, além de negócios com alta complexidade.</p>
      <p>Com estrutura própria de inteligência regulatória, de desenvolvimento e alto nível sistêmico e tecnológico, a OLIMPO atua em toda estado de São Paulo, principalmente nas regiões de interior, com presença hoje em mais de 17 cidades, além da capital.</p>

      <section class="ltco_our_business__triade ltco-pt-2 ltco-pt-md-4">
        <div class="row-grid">
          <?php
            $content = [
              [
                'icon' => 'icon-get-key',
                'title' => 'Incorporação e venda',
                'description' => 'Sinergia total de incorporação e financeiro, que permite o lançamento e vendas dos ativos imobiliários com agilidade e eficiência. Tecnologia de ponta e uma equipe qualificada com parceiros e executivos de grande expertise no mercado.'
              ],
              [
                'icon' => 'icon-point-global',
                'title' => 'Gestão de ativos imobilários',
                'description' => 'A estrutura modularizada e com grande tecnologia incorporada em seus processos possibilita alta capacidade de estruturação de negócios, gestão e desenvolvimento de ativos imobiliários com foco na alta performance e rentabilidade.'
              ],
              [
                'icon' => 'icon-shake-hands',
                'title' => 'Financial',
                'description' => 'Estruturações de produtos financeiros aderentes ao negocio imobiliário, permitindo maior velocidade de venda e reduzindo os custos de lançamento e venda, permitindo o acesso a um segundo nível de ganhos na cadeia de venda (emissão de CRI’s).'
              ],
            ];

            foreach ($content as $item) :
          ?>

          <div class="ltco_our_business__triade__item">
            <img src="<?= ltco_path('svgs'); ?>/<?= $item['icon'] ?>.svg" alt="<?= $item['icon'] ?>">
            <p class="heading h5"><?= $item['title'] ?></p>
            <div class="content">
              <p><?= $item['description'] ?></p>
            </div>
          </div>

          <?php endforeach; ?>
        </div>

        <div id="triade_slide" class="splide padding">
          <div class="splide__track">
            <ul class="splide__list">
              <?php foreach ($content as $item) : ?>

              <li class="splide__slide ltco_our_business__triade__item">
                <img src="<?= ltco_path('svgs'); ?>/<?= $item['icon'] ?>.svg" alt="<?= $item['icon'] ?>">
                <p class="heading h5"><?= $item['title'] ?></p>
                <div class="content">
                  <p><?= $item['description'] ?></p>
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
