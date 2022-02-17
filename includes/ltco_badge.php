<?php

function ltco_badge() {
  $badge_field = get_field('ltco_enterprise__badge');

  $badge_color = $badge_field['ltco_enterprise__badge__color'];
  $badge_text = $badge_field['ltco_enterprise__badge__text'];

  if (!$badge_color && !$badge_text) return;

  return sprintf(
    '<span class="ltco_badge %s">%s</span>',
    $badge_color,
    $badge_text
  );
}
