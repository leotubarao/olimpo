<?php
function ltco_maps( $prop ) {
  // $prop = get_sub_field( $prop );

  if (substr( $prop, 0, 4 ) !== 'http') {
    $domRead = new DOMDocument();
    $domRead->loadHTML($prop);

    $element = $domRead->getElementsByTagName('iframe');
    $srcIframe = $element[0]->getAttribute('src');
  }

  $domWrite = new DOMDocument();
  $iframeElement = $domWrite->appendChild($domWrite->createElement('iframe'));

  $iframeAttribute = [
    'src' => $srcIframe ?? $prop,
    'class' => 'ltco_maps',
    'loading' => 'lazy'
  ];

  foreach ($iframeAttribute as $key => $value) {
    $iframeElement->setAttribute($key, $value);
  }

  return $domWrite->saveHTML();
}
