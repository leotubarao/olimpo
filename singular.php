<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article <?php post_class('container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'); ?>>
    <?php the_content(); ?>
    <?php ltco_post_meta_edit((is_page()) ? 'página' : 'post', 'mt-3'); ?>
  </article>

  <?php endwhile; ?>

<?php get_footer(); ?>
