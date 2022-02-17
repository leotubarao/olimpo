<li <?php post_class("ltco_enterprises__list__item"); ?>>
  <?= ltco_badge(); ?>
  <a
    href="<?php the_permalink(); ?>"
    class="ltco_enterprises__list__item__wrapper"
    title="<?php the_title(); ?>"
  >
    <figure class="image" <?= ltco_thumbnail_post( get_the_ID() ); ?>>
      <span>Clique e conheça</span>
    </figure>
    <span class="title">
      <?= the_title_enterprise(get_the_terms(get_the_ID(), 'city')[0]->name) ?>
    </span>
  </a>
</li>
