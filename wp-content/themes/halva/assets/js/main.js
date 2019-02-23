try{
	$('body').bind('added_to_cart', function(event, fragments, cart_hash) {
		alert('Товыр был добавлен в корзину!');
		document.querySelector('.basket .shop-icon .number').innerText = document.querySelector('.basket .shop-icon .number').innerText * 1 + 1;
	});
} catch (e){}

// try{
// 	var xhttp = new XMLHttpRequest();
// 	xhttp.open('POST', "/?wc-ajax=wm-get-prods" , true);
// 	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
// 	xhttp.send();
// 	xhttp.onreadystatechange = function() {
// 		if (xhttp.readyState == 4) {
// 			if (xhttp.status == 200) {
// 				obj = JSON.parse(xhttp.response );
// 				added_to_wishlict(obj);
// 			} else {
// 				wm_ajax_err();
// 			}
// 		}
// 	}
// } catch (e){}

