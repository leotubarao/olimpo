<div id="carouselHome" class="carousel slide <?php /*carousel-fade */ ?>" data-ride="carousel">
  <div class="carousel-inner">

    <?php
      $i = 0;
      $enterprises_query = new WP_Query(['post_type' => 'enterprise']);

      while ($enterprises_query->have_posts()) : $enterprises_query->the_post();
      $cond = $i === 0;
    ?>

    <div class="carousel-item  <?= ltco_condition($cond, 'active'); ?>">
      <figure class="carousel-image" <?= ltco_thumbnail_post( get_the_ID() ); ?>></figure>

      <a href="<?php the_permalink(); ?>" class="carousel-caption stretched-link">
        <p>
          <?= the_title_enterprise(get_the_terms(get_the_ID(), 'city')[0]->name) ?>
        </p>
      </a>
    </div>

    <?php
      $i++;
      endwhile;
    ?>

  </div>

  <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Proximo</span>
  </a>
</div>
