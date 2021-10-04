<header
  class="header enterprise <?= ltco_has_thumbs( get_the_ID() ); ?>"
  <?= ltco_thumbnail_post( get_the_ID() ); ?>
>
  <div class="container">
    <div class="content">
      <span class="ltco_golden_icon three"></span>
      <h1 class="heading">
        <?= ltco_title(); ?>

        <small>
          <?= get_the_terms(get_the_ID(), 'city')[0]->name; ?>
        </small>
      </h1>

      <p>Para informações e vendas, cadastre-se que um de nossos corretores irá entrar em contato.</p>
    </div>
    <div class="ltco_form_wrapper">
      <p class="h2 text-white">Cadastre-se</p>

      <form action="#">
        <div class="form-group">
          <label for="name-field">Nome</label>
          <input type="text" class="form-control" id="name-field">
        </div>
        <div class="form-group">
          <label for="email-field">E-mail</label>
          <input type="email" class="form-control" id="email-field">
        </div>
        <div class="form-group">
          <label for="phone-field">Telefone</label>
          <input type="text" class="form-control" id="phone-field">
        </div>
        <button type="submit" class="btn btn-secondary ltco_button">
          Enviar
        </button>
      </form>
    </div>
    <span class="ltco_icon_arrow_down"></span>
  </div>
</header>
