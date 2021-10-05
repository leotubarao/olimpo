<?php get_header(); ?>
<section class="container ltco-py-2 ltco-py-md-4 ltco-py-lg-6">

  <?php while ( have_posts() ) : the_post(); ?>

  <article <?php post_class(); ?>>
    <h3><?php the_title(); ?></h3>
    <?php the_content(); ?>
    <?php ltco_post_meta_edit('post', 'mt-3'); ?>
  </article>

  <?php endwhile; ?>

</section>
<?php get_footer(); ?>
