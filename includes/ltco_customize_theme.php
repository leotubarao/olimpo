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
    'page_title'	=> 'Carousel',
    'menu_title'	=> 'Carousel',
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
    'key' => 'ltco_links',
    'title' => 'Links',
    'fields' => array(
      array(
        'key' => 'ltco_links__customer_portal',
        'label' => 'Portal do cliente',
        'name' => 'ltco_links__customer_portal',
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
      array(
        'key' => 'ltco_links__ticket',
        'label' => 'Segunda via do boleto',
        'name' => 'ltco_links__ticket',
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
      array(
        'key' => 'ltco_links__sac',
        'label' => 'SAC',
        'name' => 'ltco_links__sac',
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

  acf_add_local_field_group(array(
    'key' => 'repeater_ltco_carousel',
    'title' => 'Carousel de Imagens',
    'fields' => array(
      array(
        'key' => 'ltco_carousel',
        'label' => 'Banner',
        'name' => 'ltco_carousel',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'row',
        'button_label' => 'Adicionar Banner',
        'sub_fields' => array(
          array(
            'key' => 'field_5d9518d9dbde6',
            'label' => 'Imagem destacada',
            'name' => 'ltco_carousel__image_featured',
            'type' => 'image',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-carousel',
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
}
