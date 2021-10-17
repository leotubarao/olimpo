<?php
function ltco_login_redirect($redirect_to, $requested_redirect_to, $user) {
  if (is_wp_error($user)) {
    // _ltco($user->errors)
    /* $error_types = array_keys($user->errors);
    $error_type = 'both_empty';

    if (is_array($error_types) && !empty($error_types)) {
      $error_type = $error_types[0];
    }

    wp_redirect( home_url( 'login' ) . "?auth=failed&reason=" . $error_type ); */
    wp_redirect( home_url( 'login' ) . "?auth=failed" );
    exit;
  } else {
    wp_redirect( home_url( 'wp-admin' ) );
    exit;
  }
}

// add_filter('login_redirect', 'ltco_login_redirect', 10, 3);

function ltco_form_alert( $status = null, $message = null ) {
  $status = ( empty( $status ) ) ? 'danger' : $status;
  $message = ( empty( $message ) )
    ? '<strong class="mb-2 d-block">Algum campo está errado!</strong>Verifique e tente novamente.'
    : $message;

  return sprintf(
    '<div class="alert alert-%s w-100 text-center" role="alert">%s</div>',
    $status,
    $message
  );
}

function ltco_form_field( $params ) {
  if ($params['type'] === 'hidden') {
    return sprintf(
      '<input type="%s" name="%s" value="%s">',
      $params['type'],
      $params['name'],
      ( empty( $params['value'] ) ) ? site_url() : $params['value']
    );
  }

  if ($params['type'] === 'checkbox') {
    return sprintf(
      '<div class="custom-control custom-checkbox">%s%s</div>',
      sprintf(
        '<input type="%s" class="custom-control-input" name="%s" id="%s" value="%s">',
        $params['type'],
        $params['name'],
        $params['id'],
        $params['value']
      ),
      sprintf(
        '<label class="custom-control-label" for="%s">%s</label>',
        $params['id'],
        $params['description']
      )
    );
  }

  $label = sprintf(
    '<label for="%s" class="sr-only">%s</label>',
    $params['id'],
    $params['description']
  );

  $input = sprintf(
    '<input type="%s" name="%s" id="%s" class="form-control" placeholder="%s" required %s>',
    $params['type'],
    $params['name'],
    $params['id'],
    $params['description'],
    ($params['type'] !== 'password') ? 'autofocus' : null,
  );

  return implode('', array( $label, $input ));
}

function ltco_form_fields( $fields = null ) {
  $fields = ( empty( $fields ) ) ? ['both', 'pass', 'remenber'] : $fields;

  $fieldsType = [
    'login' => [
      'id' => 'user_login',
      'name' => 'user_login',
      'type' => 'text',
      'description' => 'Usuário'
    ],
    'both' => [
      'id' => 'user_login',
      'name' => 'log',
      'type' => 'text',
      'description' => 'E-mail ou usuário'
    ],
    'email' => [
      'id' => 'user_email',
      'name' => 'user_email',
      'type' => 'email',
      'description' => 'E-mail'
    ],
    'pass' => [
      'id' => 'user_pass',
      'name' => 'pwd',
      'type' => 'password',
      'description' => 'Senha'
    ],
    'remenber' => [
      'id' => 'rememberme',
      'name' => 'rememberme',
      'type' => 'checkbox',
      'value' => 'forever',
      'description' => 'Lembrar-me'
    ]
  ];

  $allFields;

  foreach ( $fields as $field ) {
    $allFields .= ltco_form_field( $fieldsType[$field] );
  }

  return $allFields;
}

function ltco_form_button( $desc, $class = null ) {
  $desc = ( empty( $desc ) ) ? 'Acessar' : $desc;
  $class = ( empty( $class ) ) ? 'btn-lg btn-secondary btn-block' : $class;

  return sprintf(
    '<button class="btn mt-4 %s" type="submit">%s</button>',
    $class,
    $desc,
  );
}

function ltco_form_content( $args = null ) {
  $header = sprintf(
    '<header class="d-flex w-100 bg-primary mb-4 p-4">%s</header>',
    sprintf(
      '<img class="m-auto" src="%s" alt="%s" width="200" />',
      ltco_path('svgs').'/logo-olimpo.svg',
      'logo-olimpo'
    )
  );

  $alert = ltco_form_alert();

  $title = sprintf(
    '<h1 class="h3 mb-3 font-weight-normal">%s</h1>',
    ltco_title()
  );

  $hidden = ltco_form_field([
    'name' => 'redirect_to',
    'type' => 'hidden',
    'value' => $redirect
  ]);

  $fields = ltco_form_fields( $args['fields'] );

  $submit = ltco_form_button( $args['button'] );

  $copyright = '<p class="mt-5 mb-3 text-muted">© 2021</p>';

  $conditionAuth = ( $_GET['auth'] === 'failed' )
    ? [$header, $alert, $title, $hidden, $fields, $submit]
    : [$header, $title, $hidden, $fields, $submit];

  return implode('', $conditionAuth);
}

function ltco_form( $args = null ) {
  $actions = [
    'register' => '?action=register',
    'lostpassword' => '?action=lostpassword'
  ];

  if ( $args !== null ) $action = $arg['action'];

  return sprintf(
    '<form
      class="form-auth d-flex flex-column align-items-center"
      action="%s"
      method="post"
    >
    %s
    </form>',
    site_url( 'wp-login.php'.$actions[$action], 'login_post' ),
    ltco_form_content( $args )
  );
}

function ltco_login_form() {
  ob_start();
  echo ltco_form();
  return ob_get_clean();
}

add_shortcode( 'ltco_login_form', 'ltco_login_form' );

function ltco_register_form() {
  ob_start();
  echo ltco_form([
    'action' => 'register',
    'button' => 'Cadastre-se',
    'fields' => ['login', 'email']
  ]);
  return ob_get_clean();
}

add_shortcode( 'ltco_register_form', 'ltco_register_form' );

function ltco_lost_password_form() {
  ob_start();
  echo ltco_form([
    'action' => 'lostpassword',
    'button' => 'Obter nova senha',
    'fields' => ['email']
  ]);
  return ob_get_clean();
}

add_shortcode( 'ltco_lost_password_form', 'ltco_lost_password_form' );

function ltco_display_state( $post_states, $post ) {
  if ( $post->post_name === 'login' )
    $post_states['signin'] = 'Página de autenticação';

  if ( $post->post_name === 'cadastre-se' )
    $post_states['signup'] = 'Página de cadastro';

  if ( $post->post_name === 'esqueci-minha-senha' )
    $post_states['lost-password'] = 'Página de recuperação de senha';

  return $post_states;
}

add_filter( 'display_post_states', 'ltco_display_state', 10, 2 );
