<?php
function enterprise_post_type() {
  $labels = array(
    'name'                  => 'Empreendimentos',
    'singular_name'         => 'Empreendimento',
    'menu_name'             => 'Empreendimentos',
    'name_admin_bar'        => 'Empreendimento',
    'archives'              => 'Empreendimentos arquivados',
    'attributes'            => 'Atributos do empreendimento',
    'parent_item_colon'     => 'Empreendimento pai:',
    'all_items'             => 'Todos os empreendimentos',
    'add_new_item'          => 'Adicionar novo empreendimento',
    'add_new'               => 'Adicionar novo',
    'new_item'              => 'Novo empreendimento',
    'edit_item'             => 'Editar empreendimento',
    'update_item'           => 'Atualizar empreendimento',
    'view_item'             => 'Ver empreendimento',
    'view_items'            => 'Ver empreendimentos',
    'search_items'          => 'Procurar empreendimentos',
    'not_found'             => 'Não encontrado',
    'not_found_in_trash'    => 'Não encontrado no lixo',
    'featured_image'        => 'Imagem destacada',
    'set_featured_image'    => 'Definir imagem destacada',
    'remove_featured_image' => 'Remover imagem destacada',
    'use_featured_image'    => 'Use como imagem destacada',
    'insert_into_item'      => 'Inserir no empreendimento',
    'uploaded_to_this_item' => 'Enviado para este empreendimento',
    'items_list'            => 'Lista de empreendimentos',
    'items_list_navigation' => 'Navegação da lista de empreendimentos',
    'filter_items_list'     => 'Filtrar lista de empreendimentos',
  );

  $rewrite = array(
    'slug'                  => 'empreendimentos',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );

  $args = array(
    'label'                 => 'Empreendimento',
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 20,
    'menu_icon'             => 'dashicons-building',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => true
  );

  register_post_type( 'enterprise', $args );
}

function faq_post_type() {
  $labels = array(
    'name'                  => 'Perguntas Frequentes',
    'singular_name'         => 'Pergunta Frequente',
    'menu_name'             => 'Perguntas Frequentes',
    'name_admin_bar'        => 'Perguntas Frequentes',
    'archives'              => 'Pergunta frequente arquivada',
    'attributes'            => 'Atributos da pergunta',
    'parent_item_colon'     => 'Pergunta pai:',
    'all_items'             => 'Todas as perguntas frequentes',
    'add_new_item'          => 'Adicionar nova pergunta',
    'add_new'               => 'Adicionar pergunta',
    'new_item'              => 'Nova pergunta',
    'edit_item'             => 'Editar pergunta',
    'update_item'           => 'Atualizar pergunta',
    'view_item'             => 'Ver pergunta',
    'view_items'            => 'Ver perguntas',
    'search_items'          => 'Pesquisar Pergunta Frequente',
    'not_found'             => 'Não encontrado',
    'not_found_in_trash'    => 'Não encontrado no lixo',
    'featured_image'        => 'Imagem destacada',
    'set_featured_image'    => 'Definir imagem destacada',
    'remove_featured_image' => 'Remover imagem destacada',
    'use_featured_image'    => 'Use como imagem destacada',
    'insert_into_item'      => 'Inserir na pergunta',
    'uploaded_to_this_item' => 'Enviado para esta pergunta',
    'items_list'            => 'Lista de perguntas frequentes',
    'items_list_navigation' => 'Navegação da lista de perguntas frequentes',
    'filter_items_list'     => 'Filtrar lista de perguntas frequentes',
  );

  $rewrite = array(
    'slug'                  => 'empreendimentos',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );

  $args = array(
    'label'                 => 'Perguntas Frequentes',
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 20,
    'menu_icon'             => 'dashicons-format-chat',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'rewrite'               => false,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
  );

  register_post_type( 'faq', $args );
}

add_action( 'init', 'enterprise_post_type', 0 );
// add_action( 'init', 'faq_post_type', 0 );

add_action( 'after_switch_theme', function() {
  enterprise_post_type();

  flush_rewrite_rules();
} );
