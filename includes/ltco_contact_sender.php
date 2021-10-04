<?php

function ltco_mailer( $phpmailer ) {
  $phpmailer->isSMTP();
  $phpmailer->SMTPAuth = true;
  $phpmailer->Host = LTCO_SMTP_HOST;
  $phpmailer->Port = LTCO_SMTP_PORT;
  $phpmailer->Username = LTCO_SMTP_USER;
  $phpmailer->Password = LTCO_SMTP_PASS;
}

if (LTCO_SMTP_HOST && LTCO_SMTP_PORT && LTCO_SMTP_USER && LTCO_SMTP_PASS)
  add_action( 'phpmailer_init', 'ltco_mailer' );
