<?php

function ltco_get_enterprise_data( $id ) {
  if (!$id) return;

  $posts = get_post($id);

  $enterpriseID = $posts->ID;
  $enterpriseTitle = $posts->post_title;

  $allFields = get_fields($enterpriseID);
  $fieldsCRM = $allFields['ltco_enterprise__crm'];

  $campaignKey = $fieldsCRM['ltco_enterprise__crm__campaignkey'];
  $productKey = $fieldsCRM['ltco_enterprise__crm__productkey'];

  if ( !$campaignKey && !$productKey ) return false;

  $response = [
    'title' => $enterpriseTitle,
    'campaignkey' => $campaignKey,
    'productkey' => $productKey
  ];

  return $response;
}

function ltco_get_cretentials_crm() {
  $pattern = '/crm/i';

  $fieldsOptions = get_fields('options');
  $fieldsOptionsFiltered = array_flip(
    preg_grep( $pattern, array_flip( $fieldsOptions ) )
  );

  $response = [
    'key'             => $fieldsOptionsFiltered['ltco_crm__key'],
    'integratorkey'   => $fieldsOptionsFiltered['ltco_crm__integratorkey'],
    'agencykey'       => $fieldsOptionsFiltered['ltco_crm__agencykey'],
    'channelkey'      => $fieldsOptionsFiltered['ltco_crm__channelkey'],
    'media'           => $fieldsOptionsFiltered['ltco_crm__media']
  ];

  return $response;
}

function ltco_formatted_phone( $value ) {
  $valueFormatted = preg_replace('/\D+/', '', $value);
  preg_match('/(\d{2})(\d+)/', $valueFormatted, $phone);

  return $phone;
}

function ltco_crm_send( $request ) {
  if (!$request) return;

  $enterpriseData = ltco_get_enterprise_data( $request['enterprise-id'] );
  $credentials = ltco_get_cretentials_crm();
  $phone = ltco_formatted_phone( $request['phone-field'] );

  if (!$enterpriseData) return;

  $body = array(
    'Key'             => $credentials['key'],
    'KeyIntegradora'  => $credentials['integratorkey'],
    'KeyAgencia'      => $credentials['agencykey'],
    'CanalKey'        => $credentials['channelkey'],
    'CampanhaKey'     => $enterpriseData['campaignkey'],  // Dynamically change
    'ProdutoKey'      => $enterpriseData['productkey'],   // Dynamically change
    'Midia'           => $credentials['media'],
    'PessoaNome'      => sanitize_text_field( $request['name-field'] ),
    'PessoaEmail'     => sanitize_email( $request['email-field'] ),
    'Observacoes'     => $enterpriseData['title'],
    'PessoaTelefones[0].DDD' => $phone[1],
    'PessoaTelefones[0].Numero' => $phone[2]
  );

  $url = 'https://crm.anapro.com.br/webcrm/webapi/integracao/v2/CadastrarProspect';
  $args = array(
    'body' => wp_json_encode( $body ),
    'headers' => [
      'Content-Type' => 'application/json',
    ]
  );

  $response = wp_remote_post( $url, $args );

  return rest_ensure_response( $response );
}

function ltco_register_route_crm() {
  register_rest_route( 'ltco-api', '/crm', array(
    array(
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'ltco_crm_send'
    )
  ));
}

add_action('rest_api_init', 'ltco_register_route_crm');

function ltco_crm_scripts() {
  wp_enqueue_script(
    'anapro_crm',
    ltco_path('scripts').'/anapro_crm.js',
    array( 'jquery' ),
    '1.0.0',
    true
  );

  wp_localize_script(
    'anapro_crm',
    'crm_options',
    ['ltco_api_url' => home_url( '/wp-json/ltco-api/crm' )]
  );
}

add_action( 'wp_enqueue_scripts', 'ltco_crm_scripts');
