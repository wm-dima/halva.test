/*add quantity to cart*/
function wm_qnt_controller(e){

	try{
		var min_range = 1;
		var max_range = 50;
		var cart_quantity_wrap = e.target.closest('.quantity-basket');
		var add_numb = cart_quantity_wrap.querySelector('.plus');
		var rm_numb = cart_quantity_wrap.querySelector('.minus');
		var quantity_add_to_cart = cart_quantity_wrap.querySelector('.quantity-main');

		var	WC_input_numb = cart_quantity_wrap.querySelector('.wm-hid .quantity [type="number"]');
		quantity_add_to_cart.innerHTML = WC_input_numb.value;
		function cart_quant_add(count = 1){
			if (allowed_range_quant( 'add', count )) {
				quantity_add_to_cart.innerText = quantity_add_to_cart.innerText * 1 + count;
				WC_input_numb.value = WC_input_numb.value * 1 + count;
				return; 
			}
		}
		
		function cart_quant_rm(count = 1){
			if (allowed_range_quant( 'rm', count )) {
				quantity_add_to_cart.innerText = quantity_add_to_cart.innerText * 1 - count;
				WC_input_numb.value = WC_input_numb.value * 1 - count;
				return; 
			}
		}
		
		function allowed_range_quant(type, count = 1){
			var current_qnt = quantity_add_to_cart.innerText * 1;
			count = count * 1;
			if ( type == 'add' ) {
				return ( current_qnt + count ) <= max_range;
			}
			if (type == 'rm') {
				return ( current_qnt - count ) >= min_range;
			}
		}

		function unclock_update_btn(e){
			var item = e.target.closest('.basket-item');
			item.querySelector('.wm-additional--update').removeAttribute('data-wm-not-active');
		}

		if (e.target == add_numb) {
			cart_quant_add();
			unclock_update_btn(e);
			// return;
		}
		if (e.target == rm_numb) {
			cart_quant_rm();
			unclock_update_btn(e);
			// return;
		}

	} catch (e){
		console.log('ERROR - add quantity to cart');
	}
}

document.querySelector('body').addEventListener('click', function(e){
	if (e.target.closest('.quantity-basket')) {
		wm_qnt_controller(e);
		return;
	}
	if (e.target.closest('.wm-additional--update:not([data-wm-not-active])')) {
		try {
			document.querySelector('[name="update_cart"]').removeAttribute('disabled');
			document.querySelector('[name="update_cart"]').click();
		} catch(e){}
	}
})
