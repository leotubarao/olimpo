<?php get_header(); ?>

  <article <?php post_class('ltco_enterprises container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'); ?>>
    <?= ltco_form_filter(['condition' => 'apply']); ?>

    <?php
      $args = ltco_enterprise_query();
      $query = new WP_Query( $args );

      echo '<ul class="ltco_enterprises__list ltco-pt-2 ltco-pt-md-4">';

      if ( $query->have_posts() ) :

        while ( $query->have_posts() ) : $query->the_post();
          get_template_part('components/posts/enterprise');
        endwhile;

      else:

        get_template_part( 'components/posts/empty', 'enterprise' );

      endif;

      echo '</ul>';

      wp_reset_query();
    ?>

  </article>

<?php get_footer(); ?>
