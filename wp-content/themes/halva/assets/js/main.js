$('body').bind('added_to_cart', function(event, fragments, cart_hash) {
	alert('Товыр был добавлен в корзину!');
	document.querySelector('.basket .shop-icon .number').innerText = document.querySelector('.basket .shop-icon .number').innerText * 1 + 1;
});