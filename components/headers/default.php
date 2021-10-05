<header
  class="header default <?= ltco_has_thumbs( ltco_get_page_id() ); ?>"
  <?= ltco_thumbnail_post( ltco_get_page_id() ); ?>
>
  <div class="container">
    <span class="ltco_golden_icon three"></span>
    <h1 class="heading"><?= ltco_title(); ?></h1>
    <?php
      if ( is_archive( 'enterprise' ) )
        echo ltco_form_filter(['condition' => 'city']);

      if ( !ltco_has_thumbs() )
        echo '<span class="ltco_icon_arrow_down"></span>';
    ?>
  </div>
</header>
