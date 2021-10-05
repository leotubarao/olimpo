<?php /* Template Name: Fale conosco */ ?>
<?php get_header(); ?>

  <section <?php post_class('ltco_contact_us container ltco-py-2 ltco-py-md-4 ltco-py-lg-6'); ?>>
    <aside class="ltco_contact_us__aside">
      <nav class="ltco_contact_us__aside__nav">
        <ul>
          <li class="active"><a href="#">Atendimento ao cliente</a></li>
          <li><a href="#">Quero ser um fornecedor</a></li>
          <li><a href="#">Trabalhe conosco</a></li>
          <li><a href="#">Segunda via do boleto</a></li>
        </ul>
      </nav>
    </aside>
    <article class="ltco_contact_us__form ltco_form">
      <p class="mb-4 font-weight-bold">Para enviar um e-mail preencha o formulário abaixo:</p>
      <?= do_shortcode('[contact-form-7 id="61" title="Atendimento ao cliente"]'); ?>
    </article>
  </section>

<?php get_footer(); ?>
