</main>
<?php get_template_part( 'components/cta-sac' ); ?>
<footer class="ltco_footer">
  <div class="container py-5">
    <div class="row justify-content-between mt-n5">

      <div class="col-12 col-lg-auto mt-5">
        <nav class="ltco_footer__nav">
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'footer',
                'depth'           => 0,
                'container'       => ''
              )
            );
          ?>
        </nav>
      </div>

      <div class="divisor first"></div>

      <div class="ltco_footer__contacts col-12 col-lg-auto mt-5">
        <div class="ltco_footer__contacts__meta">
          <h4 class="ltco_footer__heading text-white">Endereço</h4>
          <address class="text-white">Rua Joaquim Bicudo <br />
          de Almeida, 09 <br />
          Centro - Monte Mor/SP <br />
          CEP: 13190-000</address>
        </div>
        <div class="ltco_footer__contacts__meta">
          <h4 class="ltco_footer__heading text-white">Telefone</h4>
          <a href="tel:551932176149" class="text-white">+55 (19) 3217-6149</a>
        </div>
        <div class="ltco_footer__contacts__meta">
          <h4 class="ltco_footer__heading text-white">E-mail</h4>
          <a href="mailto:contato@olimpoparticipacoes.com.br" class="text-white">
            contato@olimpoparticipacoes.com.br
          </a>
        </div>
      </div>

      <div class="divisor last"></div>

      <div class="ltco_footer__social col-12 col-lg-auto mt-5">
        <h4 class="ltco_footer__heading text-white">Siga a Olimpo</h4>
        <?= ltco_social_nav(); ?>
      </div>

      <div class="d-flex col-12 col-lg-auto align-items-sm-start ml-xl-auto mt-5">
        <img class="ltco_scroll_top" src="<?= ltco_path('svgs'); ?>/icon-back-top.svg" width="60" alt="icon-back-top"/>
      </div>

    </div>
  </div>

  <div class="ltco_footer__copyright">
    <div class="container">
      <div
        class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between"
      >
        <?= ltco_copyright(); ?>
        <?= ltco_sign(['http://www.sinaispublicidade.com.br/', 'Agência (SINAIS)']); ?>
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
