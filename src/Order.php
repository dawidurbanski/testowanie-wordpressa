<?php
/**
 * Order class file
 *
 * @package TestingWordPress
 * @since 0.0.1
 */

namespace TestingWordPress;

/**
 * Order class
 */
class Order {
  public $width;
  public $length;
  public $product_id;

  function __construct( $width, $length, $product_id ) {
    $this->width = $width;
    $this->length = $length;
    $this->product_id = $product_id;
  }

	public function save() {
    $order = wp_insert_post(
      array(
        'post_type' => 'product_order',
        'post_title' => 'Order' . wp_unique_id(),
        'post_status' => 'publish',
      )
    );

    if ( is_wp_error( $order ) ) {
      return new \WP_Error( 'Order creation failed', 500 );
    }

    $product_price_per_m = get_field( 'price_per_m', $this->product_id );
    
    $area = $this->width * $this->length;
    $price = $product_price_per_m * $area;

    update_post_meta( $order, 'total_price', $price );
    update_post_meta( $order, 'product_title', get_the_title( $this->product_id ) );
	}
}
