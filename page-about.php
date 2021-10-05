<?php /* Template Name: Quem Somos */ ?>
<?php get_header(); ?>

  <article <?php post_class('ltco_about'); ?>>
    <div class="ltco_about__cta">
      <div class="container ltco-py-2">
        <p class="h2 text-white">A Olimpo tem o empreendimento perfeito para você!</p>
        <a href="<?= esc_url( home_url( 'empreendimentos' ) ); ?>" class="btn btn-outline-tertiary ltco_button" title="Conheça mais">Conheça mais</a>
      </div>
    </div>

    <div class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">
      <p>A Olimpo Participações valoriza a inovação e as novas tendências. O sucesso da empresa está na equipe que carrega o posicionamento estratégico, os valores e as políticas da empresa como foco para todo tipo de atividade desenvolvida, visando sempre melhorar continuamente seus processos, ter transparência nas relações, cumprir com os acordos firmados, eficiência no pós-venda e buscando a qualidade do produto final.</p>
      <p>Na Olimpo, os projetos nascem para impactar positivamente a vida das pessoas, gerando valor para quem mora, mas também para as regiões em que são implantados, construir com respeito à natureza, além de eficiência e sustentabilidade. Essa é a nossa cultura empresarial e o objetivo de oferecer melhor qualidade de vida a todos.</p>
      <p>Nosso objetivo é de entregar empreendimentos no prazo estimado e sempre acima do padrão do mercado, realizamos um acompanhamento completo e detalhado nas construções, utilizando materiais de alta qualidade com profissionais capacitados para realizar serviços com excelência.</p>
    </div>

    <figure class="ltco_about__full_image" <?= styleInline(ltco_image_wp(18)); ?>>
      <img src="<?= ltco_image_wp(18) ?>" class="img-fluid">
    </figure>

    <div class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6 ltco_about__triade">
      <header class="ltco_about__triade__header">
        <p class="h2 text-primary mb-0">Missão, visão e valores</p>
        <span class="ltco_golden_icon three line"></span>
      </header>

      <section class="ltco_about__triade__list ltco-pt-2 ltco-pt-md-4">
        <div class="row-grid">
          <?php
            $content = [
              ['title' => 'Missão'],
              ['title' => 'Visão'],
              ['title' => 'Valores'],
            ];

            foreach ($content as $item) :
          ?>

          <div class="ltco_about__triade__list__item">
            <p class="heading h4"><?= $item['title'] ?></p>
            <div class="content">
              <p>Tornar-se referência no desenvolvimento de empreendimentos imobiliários inovadores e na prática de gestão com alto grau de planejamento e excelência operacional.</p>
            </div>
          </div>

          <?php endforeach; ?>
        </div>

        <div id="triade_slide" class="splide padding">
          <div class="splide__track">
            <ul class="splide__list">
              <?php foreach ($content as $item) : ?>

              <li class="splide__slide ltco_about__triade__list__item">
                <p class="heading h4"><?= $item['title'] ?></p>
                <div class="content">
                  <p>Tornar-se referência no desenvolvimento de empreendimentos imobiliários inovadores e na prática de gestão com alto grau de planejamento e excelência operacional.</p>
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
