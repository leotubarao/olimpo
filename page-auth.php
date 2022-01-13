<?php /* Template Name: Autenticação */ ?>
<?php get_header('error'); ?>

<?php
  if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
  }

  $args = array(
    'form_id'        => 'form-auth',
    'label_username' => 'E-mail',
    'label_password' => 'Senha',
    'label_remember' => 'Lembrar-me',
    'label_log_in'   => 'Acessar',
  );

  // wp_login_form($args);
?>
<form
  class="form-auth d-flex flex-column align-items-center"
  action="<?= esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>"
  method="post"
>
  <input
    type="hidden"
    name="redirect_to"
    value="<?= esc_url( site_url('empreendimentos') ); ?>"
  />
  <header class="d-flex w-100 bg-primary mb-4 p-4">
    <img
      class="m-auto"
      src="<?= ltco_path('svgs'); ?>/logo_olp.svg"
      alt="logo-olp"
      width="130"
    />
  </header>

  <h1 class="h3 mb-3 font-weight-normal"><?= ltco_title(); ?></h1>

  <?php if ( $_GET['auth'] === 'failed' ) : ?>
  <div class="alert alert-danger w-100 text-center" role="alert">
    <strong class="mb-2">Algum campo está errado!</strong>
    Verifique e tente novamente.
  </div>
  <?php endif; ?>

  <label for="user_login" class="sr-only">E-mail ou usuário</label>
  <input
    type="text"
    name="log"
    id="user_login"
    class="form-control"
    placeholder="E-mail ou usuário"
    required
    autofocus
  />
  <label for="user_pass" class="sr-only">Senha</label>
  <input
    type="password"
    name="pwd"
    id="user_pass"
    class="form-control"
    placeholder="Senha"
    required
  />

  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" name="rememberme" type="checkbox" id="rememberme" value="forever">
    <label class="custom-control-label" for="rememberme">Lembrar-me</label>
  </div>

  <button class="btn btn-lg btn-secondary btn-block" name="wp-submit" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted">© 2022</p>
</form>
<?php get_footer('error'); ?>
