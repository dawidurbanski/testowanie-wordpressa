<?php
/*
 * Plugin Name: Mailhog
 * Version: 1.0
 * License: GPL2
 */

add_filter('wp_mail_from', function() {
  return 'example@example.com';
});

add_filter('wp_mail_from_name', function() {
  return 'Example Name';
});

add_action('phpmailer_init', function($phpmailer) {
  $phpmailer->Host = 'mailhog';
  $phpmailer->Port = 1025;
  $phpmailer->IsSMTP();
});
