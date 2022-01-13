<?php /* Template Name: Fale conosco */ ?>
<?php get_header(); ?>

  <section <?php post_class('ltco_contact_us container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'); ?>>
    <aside class="ltco_contact_us__aside">
      <nav class="ltco_contact_us__aside__nav">
        <button data-id="sac" class="tab-button">Atendimento ao cliente</button>
        <button data-id="fornecedor" class="tab-button">Quero ser um fornecedor</button>
        <button data-id="trabalhe" class="tab-button">Trabalhe conosco</button>
        <button data-id="boleto" class="tab-button">Segunda via do boleto</button>
      </nav>
    </aside>
    <article class="ltco_contact_us__form">
      <div id="sac" class="tab-content">
        <p class="mb-4">
          A OLIMPO possui um ágil sistema de atendimento ao cliente. Você pode abrir e monitorar seus chamados de forma rápida e segura:
        </p>
        <?php
          $customer_portal = get_field( 'ltco_links__sac', 'options' );

          if ( $customer_portal ) {
            echo sprintf(
              '<a href="%s" class="btn btn-primary" target="_blank" >%s</a>',
              esc_url( $customer_portal, 'https', '#' ),
              'Clique aqui para acessar'
            );
          }
        ?>
      </div>

      <div id="fornecedor" class="tab-content">
        <p class="mb-4 font-weight-bold">
          Envie um e-mail para nosso time e cadastre-se como fornecedor:
        </p>
        <?= do_shortcode('[contact-form-7 id="61" title="Atendimento ao cliente"]'); ?>
      </div>

      <div id="trabalhe" class="tab-content">
        <p class="mb-4 font-weight-bold">Envie seu currículo para a OLIMPO:</p>
        <?= do_shortcode('[contact-form-7 id="83" title="Currículo"]'); ?>
      </div>

      <div id="boleto" class="tab-content">
        <p class="mb-4">
          Para solicitar a sua segunda via, clique abaixo e acesse o portal do cliente:
        </p>
        <?php
          $customer_portal = get_field( 'ltco_links__ticket', 'options' );

          if ( $customer_portal ) {
            echo sprintf(
              '<a href="%s" class="btn btn-primary" target="_blank" >%s</a>',
              esc_url( $customer_portal, 'https', '#' ),
              'Clique aqui para acessar'
            );
          }
        ?>
      </div>
    </article>
  </section>

<?php get_footer(); ?>
