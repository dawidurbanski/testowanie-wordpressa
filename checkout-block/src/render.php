<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<p <?php echo get_block_wrapper_attributes(); ?>>
	<form method="POST" action="<?= esc_attr( admin_url('admin-post.php') ) ?>">
		<input type="hidden" name="action" value="create_order" />
		<input type="hidden" name="csrf" value="<?= esc_attr( wp_create_nonce( 'create_order_nonce' ) ) ?>" />
		<input type="hidden" name="product_id" value="<?= esc_attr( get_the_ID() ) ?>" />
		<input type="hidden" name="redirect" value="<?= esc_attr( get_permalink() ) ?>" />

		<div>
			<label for="width">Szerokość</label>
			<br />
			<input
				type="range"
				id="width"
				name="width"
				value="80"
				min="<?= esc_attr( get_field( 'min_width' ) ); ?>"
				max="<?= esc_attr( get_field( 'max_width' ) ); ?>"
			/>
			<input type="number" id="width-value" value="80" />
		</div>
		<div>
			<label for="length">Ilość metrów bieżących</label>
			<br />
			<input
				type="number"
				id="length"
				name="length"
				value="1"
			/>
		</div>
		<input type="submit" value="Zamów" />
	</form>
</p>
