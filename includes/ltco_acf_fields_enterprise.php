<?php
if ( function_exists( 'acf_add_local_field_group' ) ) :
  acf_add_local_field_group(array(
    'key' => 'group_5dc393b9a8f65',
    'title' => 'Empreendimentos',
    'fields' => array(
      array(
        'key' => 'ltco_enterprise__general-tab',
        'label' => 'Informações do Empreendimento',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__has_overlay',
        'label' => 'Overlay no banner',
        'name' => 'ltco_enterprise__has_overlay',
        'type' => 'true_false',
        'instructions' => 'Overlay (sobreposição) é a camada verde sobreposta ao banner principal.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => '',
        'default_value' => 1,
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
      ),
      array(
        'key' => 'ltco_enterprise__enterprise_type',
        'label' => 'Tipo de empreendimento',
        'name' => 'ltco_enterprise__enterprise_type',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'default'	=> 'Nenhum',
          'blue'	=> 'Incorporações',
          'green'	=> 'Loteamentos',
        ),
        'return_format' => 'value',
      ),
      array(
        'key' => 'ltco_enterprise__city',
        'label' => 'Cidade',
        'name' => 'ltco_enterprise__city',
        'type' => 'taxonomy',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'taxonomy' => 'city',
        'field_type' => 'checkbox',
        'add_term' => 1,
        'save_terms' => 1,
        'load_terms' => 0,
        'return_format' => 'id',
        'multiple' => 0,
        'allow_null' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__car_space',
        'label' => 'Vaga(s)',
        'name' => 'ltco_enterprise__car_space',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '2 vagas',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'ltco_enterprise__bathroom',
        'label' => 'Banheiros',
        'name' => 'ltco_enterprise__bathroom',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '34',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '2 banheiros',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'ltco_enterprise__footage',
        'label' => 'Metragem',
        'name' => 'ltco_enterprise__footage',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '33',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '75m²',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'ltco_enterprise__location-tab',
        'label' => 'Localização',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 1,
      ),
      array(
        'key' => 'ltco_enterprise__location',
        'label' => 'Endereço',
        'name' => 'ltco_enterprise__location',
        'type' => 'textarea',
        'instructions' => 'Insira o endereço da localização',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '3',
        'new_lines' => 'br',
      ),
      array(
        'key' => 'ltco_enterprise__maps',
        'label' => 'Localização',
        'name' => 'ltco_enterprise__maps',
        'type' => 'text',
        'instructions' => 'Insira o Iframe completo ou somente a URL',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'ltco_enterprise__images-tab',
        'label' => 'Imagens',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__hero_image',
        'label' => 'Imagem do banner (hero)',
        'name' => 'ltco_enterprise__hero_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
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
      array(
        'key' => 'ltco_enterprise__resume_image',
        'label' => 'Imagem do resumo',
        'name' => 'ltco_enterprise__resume_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
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
      array(
        'key' => 'ltco_enterprise__gallery',
        'label' => 'Galeria',
        'name' => 'ltco_enterprise__gallery',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 10,
        'layout' => 'row',
        'button_label' => 'Adicionar',
        'sub_fields' => array(
          array(
            'key' => 'ltco_enterprise__gallery__title',
            'label' => 'Título',
            'name' => 'ltco_enterprise__gallery__title',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'ltco_enterprise__gallery__image',
            'label' => 'Imagem',
            'name' => 'ltco_enterprise__gallery__image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
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
      array(
        'key' => 'ltco_enterprise__humanized_project',
        'label' => 'Planta Humanizada',
        'name' => 'ltco_enterprise__humanized_project',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '50',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 10,
        'layout' => 'row',
        'button_label' => 'Adicionar',
        'sub_fields' => array(
          array(
            'key' => 'ltco_enterprise__humanized_project__image',
            'label' => 'Imagem',
            'name' => 'ltco_enterprise__humanized_project__image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
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
      array(
        'key' => 'ltco_enterprise__differential-tab',
        'label' => 'Diferenciais',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__differential',
        'label' => 'Diferenciais',
        'name' => 'ltco_enterprise__differential',
        'type' => 'taxonomy',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'taxonomy' => 'differential',
        'field_type' => 'checkbox',
        'add_term' => 1,
        'save_terms' => 1,
        'load_terms' => 1,
        'return_format' => 'object',
        'multiple' => 0,
        'allow_null' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__work_stage-tab',
        'label' => 'Estágio da Obra',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array(
        'key' => 'ltco_enterprise__work_stage__update_date',
        'label' => 'Data da Atualização',
        'name' => 'ltco_enterprise__work_stage__update_date',
        'type' => 'date_picker',
        'instructions' => 'Selecione a data da última atualização:',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'display_format' => 'd/m/Y',
        'return_format' => 'd/m/Y',
        'first_day' => 1,
      ),
      array(
        'key' => 'ltco_enterprise__work_stage',
        'label' => 'Estágio da Obra',
        'name' => 'ltco_enterprise__work_stage',
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
        'max' => 10,
        'layout' => 'row',
        'button_label' => 'Adicionar Estágio',
        'sub_fields' => array(
          array(
            'key' => 'ltco_enterprise__work_stage__title',
            'label' => 'Título',
            'name' => 'ltco_enterprise__work_stage__title',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'ltco_enterprise__work_stage__percents',
            'label' => 'Porcentagem',
            'name' => 'ltco_enterprise__work_stage__percents',
            'type' => 'number',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 0,
            'max' => 100,
            'step' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'enterprise',
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
    'key' => 'ltco_differentials',
    'title' => 'Ícone do diferencial',
    'fields' => array(
      array(
        'key' => 'ltco_differentials__icon',
        'label' => 'Ícone',
        'name' => 'ltco_differentials__icon',
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
        'preview_size' => 'thumbnail',
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
    'location' => array(
      array(
        array(
          'param' => 'taxonomy',
          'operator' => '==',
          'value' => 'differential',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

endif;
