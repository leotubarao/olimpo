<?php
  $name_field_carousel = 'ltco_carousel';
  $field_params = array( $name_field_carousel, 'option' );

  $enterprise_loop = 0;
  $carousel_loop = 0;
  $enterprises_query = new WP_Query([
    'post_type' => 'enterprise',
    'showposts' => 3
  ]);

?>

<div id="carouselHome" class="carousel slide carousel-fade" data-ride="carousel">

  <?php if ( !have_rows( ...$field_params ) ) : ?>

  <div class="carousel-inner">
    <?php
      while ($enterprises_query->have_posts()) : $enterprises_query->the_post();
      $cond = $enterprise_loop === 0;
    ?>

    <div class="carousel-item <?= ltco_condition($cond, 'active'); ?>">
      <figure class="carousel-image" <?= ltco_thumbnail_post( get_the_ID() ); ?>></figure>

      <a href="<?php the_permalink(); ?>" class="carousel-caption stretched-link">
        <p>
          <?= the_title_enterprise(get_the_terms(get_the_ID(), 'city')[0]->name) ?>
        </p>
      </a>
    </div>

    <?php $enterprise_loop++; endwhile; ?>

  </div>

  <?php else: ?>

  <div class="carousel-inner">

    <?php
      while ( have_rows( ...$field_params ) ) : the_row();
      $cond = $carousel_loop === 0;
      $image_featured = get_sub_field( $name_field_carousel.'__image_featured' );
    ?>

    <div class="carousel-item <?= ltco_condition($cond, 'active'); ?>">
      <figure class="carousel-image" <?= styleInline( $image_featured['url'] ); ?>></figure>
    </div>

    <?php $carousel_loop++; endwhile; ?>

  </div>

  <?php endif; ?>

  <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Proximo</span>
  </a>
</div>

