<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<section class="ltco_enterprises container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">
  <?= ltco_form_filter(); ?>

  <ul class="ltco_enterprises__list ltco-pt-2 ltco-pt-md-4">

    <li class="ltco_enterprises__list__item heading">
      <header>
        <h2 class="text-primary h3">Empreendimentos</h2>
        <span class="ltco_golden_icon three line"></span>
      </header>
      <p class="mb-0">
        Confira alguns dos nossos empreendimentos e escolhe o melhor para você.
      </p>
    </li>

  <?php
    $enterprises_query = new WP_Query([
      'post_type' => 'enterprise',
      'showposts' => 5
    ]);

    while ($enterprises_query->have_posts()) : $enterprises_query->the_post();
      get_template_part('components/posts/enterprise');
    endwhile;
  ?>

</ul>
</section>
<section class="ltco_about">
  <figure class="image" <?= styleInline(ltco_image_wp(28)); ?>></figure>
  <div class="description">
    <h2 class="text-primary">Quem é a Olimpo</h2>
    <p>A Olimpo Participações valoriza a inovação e as novas tendências.</p>
    <p>O sucesso da empresa está na equipe que carrega o posicionamento estratégico, os valores e as políticas da empresa como foco para todo tipo de atividade desenvolvida.</p>
    <a href="<?= esc_url( home_url( 'quem-somos' ) ); ?>" class="btn btn-primary ltco_button" title="Conheça mais">Conheça mais</a>
  </div>
</section>
<?php get_footer(); ?>
