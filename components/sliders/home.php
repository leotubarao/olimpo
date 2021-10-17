<div id="carouselHome" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">

    <?php
      $i = 0;
      $enterprises_query = new WP_Query(['post_type' => 'enterprise']);

      while ($i < 3) :
      $cond = $i === 0;
      while ($enterprises_query->have_posts()) : $enterprises_query->the_post();
    ?>

    <div class="carousel-item  <?= ltco_condition($cond, 'active'); ?>">
      <figure class="carousel-image" <?= ltco_thumbnail_post( get_the_ID() ); ?>></figure>

      <a href="<?php the_permalink(); ?>" class="carousel-caption stretched-link">
        <p><?= the_title_enterprise($i) ?></p>
      </a>
    </div>

    <?php
      endwhile;
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
