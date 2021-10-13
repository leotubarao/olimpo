<?php

function city_taxonomy() {
  $labels = array(
    'name'                       => 'Cidades',
    'singular_name'              => 'Cidade',
    'menu_name'                  => 'Cidades',
    'all_items'                  => 'Todas as cidades',
    'parent_item'                => 'Cidade pai',
    'parent_item_colon'          => 'Cidade pai:',
    'new_item_name'              => 'Nova cidade',
    'add_new_item'               => 'Adicionar nova cidade',
    'edit_item'                  => 'Editar cidade',
    'update_item'                => 'Atualizar cidade',
    'view_item'                  => 'Ver cidade',
    'separate_items_with_commas' => 'Separe as cidades com vírgulas',
    'add_or_remove_items'        => 'Adicionar ou remover cidades',
    'choose_from_most_used'      => 'Escolha entre as mais usadas',
    'popular_items'              => 'Cidades populares',
    'search_items'               => 'Pesquisar cidades',
    'not_found'                  => 'Nenhuma cidade encontrada',
    'no_terms'                   => 'Nenhuma cidade',
    'items_list'                 => 'Lista de cidades',
    'items_list_navigation'      => 'Navegação da lista de cidades',
  );

  $rewrite = array(
    'slug'                       => 'cidades',
    'with_front'                 => true,
    'hierarchical'               => false,
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
    'rewrite'                    => $rewrite,
    'show_in_rest'               => false
  );

  register_taxonomy( 'city', array( 'enterprise' ), $args );
}

function differential_taxonomy() {
  $labels = array(
    'name'                       => 'Diferenciais',
    'singular_name'              => 'Diferencial',
    'menu_name'                  => 'Diferenciais',
    'all_items'                  => 'Todas os diferenciais',
    'parent_item'                => 'Diferencial pai',
    'parent_item_colon'          => 'Diferencial pai:',
    'new_item_name'              => 'Novo diferencial',
    'add_new_item'               => 'Adicionar novo diferencial',
    'edit_item'                  => 'Editar diferencial',
    'update_item'                => 'Atualizar diferencial',
    'view_item'                  => 'Ver diferencial',
    'separate_items_with_commas' => 'Separe os diferenciais com vírgulas',
    'add_or_remove_items'        => 'Adicionar ou remover diferenciais',
    'choose_from_most_used'      => 'Escolha entre os mais usados',
    'popular_items'              => 'Diferenciais populares',
    'search_items'               => 'Pesquisar diferenciais',
    'not_found'                  => 'Nenhum diferencial encontrado',
    'no_terms'                   => 'Nenhum diferencial',
    'items_list'                 => 'Lista de diferenciais',
    'items_list_navigation'      => 'Navegação da lista de diferenciais',
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'meta_box_cb'                => false,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
    'rewrite'                    => false,
    'show_in_rest'               => false
  );

  register_taxonomy( 'differential', array( 'enterprise' ), $args );
}

function property_type_taxonomy() {
  $labels = array(
    'name'                       => 'Tipos de Imóveis',
    'singular_name'              => 'Tipo de Imóvel',
    'menu_name'                  => 'Tipos de Imóveis',
    'all_items'                  => 'Todas os tipos de imóveis',
    'parent_item'                => 'Tipo de Imóvel pai',
    'parent_item_colon'          => 'Tipo de Imóvel pai:',
    'new_item_name'              => 'Novo tipo de imóvel',
    'add_new_item'               => 'Adicionar novo tipo de imóvel',
    'edit_item'                  => 'Editar tipo de imóvel',
    'update_item'                => 'Atualizar tipo de imóvel',
    'view_item'                  => 'Ver tipo de imóvel',
    'separate_items_with_commas' => 'Separe os tipos de imóveis com vírgulas',
    'add_or_remove_items'        => 'Adicionar ou remover tipos de imóveis',
    'choose_from_most_used'      => 'Escolha entre os mais usados',
    'popular_items'              => 'Tipos de Imóveis populares',
    'search_items'               => 'Pesquisar tipos de imóveis',
    'not_found'                  => 'Nenhum tipo de imóvel encontrado',
    'no_terms'                   => 'Nenhum tipo de imóvel',
    'items_list'                 => 'Lista de tipos de imóveis',
    'items_list_navigation'      => 'Navegação da lista de tipos de imóveis',
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'meta_box_cb'                => false,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
    'rewrite'                    => false,
    'show_in_rest'               => false
  );

  register_taxonomy( 'property-type', array( 'enterprise' ), $args );
}

add_action( 'init', 'city_taxonomy', 0 );
add_action( 'init', 'differential_taxonomy', 0 );
add_action( 'init', 'property_type_taxonomy', 0 );

add_action( 'after_switch_theme', function() {
  city_taxonomy();
  differential_taxonomy();
  property_type_taxonomy();

  flush_rewrite_rules();
} );
