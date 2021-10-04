<?php
function ltco_condition_filter( $value, $param ) {
  return in_array( $value, explode( ',', $_GET[ $param ] ) );
}

function ltco_select_filter( $param, $firstLabel ) {
  $terms = get_terms(
    $param,
    array(
      'hide_empty' => 0,
      'order' => 'ASC',
      'orderby' => 'name'
    )
  );

  if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
    $options .= sprintf('<option value="all" %s>%s</option>',
      ltco_condition_filter( 'all', $param ) ? 'selected' : '',
      $firstLabel
    );

    foreach ( $terms as $term ) {
      $termSlug = $term->slug;
      $termName = $term->name;

      $options .= sprintf(
        '<option value="%s" %s>%s</option>',
        $termSlug,
        ltco_condition_filter( $termSlug, $param ) ? 'selected' : '',
        $termName
      );
    }

    return sprintf(
      '<select data-filter="%s" name="%s" class="custom-select">%s</select>',
      $param,
      $param,
      $options
    );
  }
}

function ltco_checkbox_field_filter( $param, $label ) {
  $checked = get_query_var( $param );

  $field = sprintf(
    '<input type="checkbox" id="%s" data-filter="%s" name="%s" class="custom-control-input" %s>',
    $param,
    $param,
    $param,
    $checked ? 'checked' : ''
  );

  $labelWrapper = sprintf(
    '<label class="custom-control-label" for="%s">%s</label>',
    $param,
    $label
  );

  return sprintf(
    '<div class="custom-control custom-checkbox">%s</div>',
    implode('', [$field, $labelWrapper])
  );
}

function ltco_hidden_field_filter( $param ) {
  $queryVariable = get_query_var( $param );
  $value = ltco_condition_filter( $queryVariable, $param )
    ? $queryVariable
    : false;

  return sprintf(
    '<input type="hidden" data-filter="%s" name="%s" value="%s">',
    $param,
    $param,
    $value
  );
}

function ltco_title_filter( $value, $class = false ) {
  return sprintf(
    '<p%s>%s</p>',
    $class ? ' class="'.$class.'"' : '',
    $value
  );
}

function ltco_form_wrapper_filter( $fields, $class = 'redirect' ) {
  return sprintf(
    '<form class="%s" autocomplete="off">%s</form>',
    sprintf(
      'ltco_form_filter %s',
      $class
    ),
    implode('', $fields)
  );
}

function ltco_form_filter( $params = false ) {
  $condition = $params['condition'];
  $type = $params['type'];

  $redirect = home_url( '/empreendimentos' );

  $labelSelectContainer = ltco_title_filter('Escolha uma cidade:', 'mb-0');
  $labelCheckboxContainer = ltco_title_filter('Aplicar por:', 'mb-0 font-weight-bold');

  $citySelect = ltco_select_filter('city', 'Todas as cidades');
  $mostSeenCheckbox = ltco_checkbox_field_filter('most-seen', 'Mais vistos');
  $mostRecentCheckbox = ltco_checkbox_field_filter('most-recent', 'Mais recentes');

  $cityHidden = ltco_hidden_field_filter('city');
  $mostSeenHidden = ltco_hidden_field_filter('most-seen');
  $mostRecentHidden = ltco_hidden_field_filter('most-recent');

  if ($condition === 'city') {
    $labelSelectContainer = ltco_title_filter('Busque seu imóvel');

    return ltco_form_wrapper_filter(
      [
        $labelSelectContainer,
        $citySelect,
        $mostSeenHidden,
        $mostRecentHidden
      ],
      $type
    );
  }

  if ($condition === 'apply') {
    return ltco_form_wrapper_filter(
      [
        $labelCheckboxContainer,
        $mostRecentCheckbox,
        $mostSeenCheckbox,
        $cityHidden
      ],
      $type
    );
  }

  return ltco_form_wrapper_filter(
    [
      $labelSelectContainer,
      $citySelect,
      $labelCheckboxContainer,
      $mostRecentCheckbox,
      $mostSeenCheckbox
    ],
    $type
  );
}
