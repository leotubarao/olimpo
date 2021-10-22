<?php

if ( function_exists('acf_add_options_page') ) {

  acf_add_options_page( array(
    'page_title' 	=> 'LTCO Settings',
    'menu_title'	=> 'LTCO Settings',
    'menu_slug' 	=> 'ltco-settings',
    'icon_url'		=> 'dashicons-schedule'
  ) );

  acf_add_options_sub_page( array(
    'page_title'	=> 'Redes Sociais',
    'menu_title'	=> 'Redes Sociais',
    'parent_slug'	=> 'ltco-settings',
  ) );

  acf_add_options_sub_page( array(
    'page_title'	=> 'Outros',
    'menu_title'	=> 'Outros',
    'menu_slug'   => 'ltco-others',
    'parent_slug'	=> 'ltco-settings',
  ) );
}

if ( function_exists('acf_add_local_field_group') ) {

  acf_add_local_field_group(array(
    'key' => 'ltco_cutomer_portal',
    'title' => 'Imagens do Cabeçalho',
    'fields' => array(
      array(
        'key' => 'ltco_customer_portal__link',
        'label' => 'Link do portal do cliente',
        'name' => 'ltco_customer_portal__link',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'ltco-others',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

  acf_add_local_field_group(array(
    'key' => 'group_5d82765583802',
    'title' => 'Redes Sociais',
    'fields' => array(
      array(
        'key' => 'field_5d82765ef4531',
        'label' => 'Facebook',
        'name' => 'ltco_social_facebook',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'Ex.: https://www.facebook.com/sua-empresa',
      ),
      array(
        'key' => 'field_5d827cf8f4533',
        'label' => 'Instagram',
        'name' => 'ltco_social_instagram',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'Ex.: https://www.instagram.com/sua-empresa',
      ),
      array(
        'key' => 'field_5d827cdbf4532',
        'label' => 'YouTube',
        'name' => 'ltco_social_youtube',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'Ex.: https://www.youtube.com/sua-empresa',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-redes-sociais',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'left',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));
}
