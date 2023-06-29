<?php global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>
<hr class="shadow-block my-3">
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>


	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<div class="flex items-center mb-3">
	<p class="mr-3">Hoeveelheid</p>
	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	//  woocommerce_quantity_input(
	// 	$min_value = array(
	// 		'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
	// 		'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
	// 		'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
	// 	)
	// );

	?>
	
	<div class="relative px-[5px] w-8">
		<input
			type="number"
			id="quantity"
			class="quantity-input bg-transparent"
			step="1"
			min="1"
			name="quantity"
			value="<?php echo(isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity()) ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
			size="4"
			placeholder="1"
			inputmode="numeric" 
			autocomplete="off"
		/>
		<div class="minus-button absolute top-1/2 transform -translate-y-1/2 w-2 h-2 bg-one left-0 flex justify-center items-center cursor-pointer">
			<span class="h-[1px] w-[9px] bg-[#36544F] block"></span>
		</div>
		<div class="plus-button absolute top-1/2 transform -translate-y-1/2 w-2 h-2 bg-one right-0 cursor-pointer">
			<div class="relative flex justify-center items-center h-full w-full">
				<span class="h-[1px] w-[9px] bg-[#36544F] block"></span>
				<span class="h-[1px] w-[9px] bg-[#36544F] block rotate-90 absolute"></span>
			</div>
		</div>
	</div>
	<?php
	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
	</div>
	
	<script>
		const plusButton = document.querySelector(".plus-button");
		const minusButton  = document.querySelector(".minus-button");
		const input = document.querySelector(".quantity-input");

		const plusButtonFuction = () => {

				input.value = parseInt(input.value) + 1;
				// minusButton.style.opacity = "1";
			// 	if (input.value  >= <?php echo(apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product )) ?>) {
			// 		plusButton.style.opacity = "0.5";
			// 	}
		
			//  if (input.value <= <?php echo(apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product )) ?>) {
			// 	plusButton.style.opacity = "0.5";
			//  }
		
		}

		const minusButtonFuction = () => {
			if(input.value > 1) {
				input.value = parseInt(input.value) - 1;
				plusButton.style.opacity = "1";
				// if (parseInt(input.value) === 1) {
				// 	minusButton.style.opacity = "0.5";
				// }
			}
		}

		plusButton.addEventListener("click", () => {
			plusButtonFuction();
		});

		minusButton.addEventListener("click", () => {
			minusButtonFuction();
		});

		window.addEventListener("load", () => {
			plusButtonFuction();
		});

		window.addEventListener("load", () => {
			minusButtonFuction();
		});
	</script>



		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="text-16 leading-16 block py-1.5 px-3 bg-three border-2 border-three transition-colors text-white w-fit"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
