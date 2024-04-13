<?php

namespace TestingWordPress;

function create_order() {
	$nonce = $_REQUEST['csrf'] ?? '';
  $redirect = $_REQUEST['redirect'] ?? home_url();

	if ( ! wp_verify_nonce( $nonce, 'create_order_nonce' ) ) {
		wp_die( 'Nonce verification failed', 403 );
	}

	$product_id = $_REQUEST['product_id'];
	$width = (int) $_REQUEST['width'] ?? 0;
	$length = (int) $_REQUEST['length'] ?? 0;

	$order = new Order( $width, $length, $product_id );

  if ( is_wp_error( $order->save() ) ) {
    wp_die( 'Order creation failed', 500 );
  }

  wp_redirect( $redirect );
  exit;
}

add_action( 'admin_post_create_order', __NAMESPACE__ . '\\create_order' );