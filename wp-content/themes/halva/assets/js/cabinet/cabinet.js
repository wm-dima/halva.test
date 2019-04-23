document.querySelector('.nav-tabs ul').addEventListener('click', function(e){
	let wasActiveNav = document.querySelector('.nav--active');
	wasActiveNav.classList.remove('nav--active');
	e.target.closest('[data-tab-nav]').classList.add('nav--active');
	document.querySelector('.tab--active').classList.add('wm-hid');
	document.querySelector('.tab--active').classList.remove('tab--active');
	let newActiveTab = document.querySelector('[data-tab="'+e.target.closest('[data-tab-nav]').getAttribute('data-tab-nav')+'"]');
	newActiveTab.classList.add('tab--active');
	newActiveTab.classList.remove('wm-hid');
});

document.querySelector('#city-form').addEventListener('submit', function(e){
		e.preventDefault();
		var theForm = e.target.closest('form');
		var obj = new FormData(theForm);
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', theForm.action + '?action=update_city', true);
//  xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhttp.send(obj);
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4) {
				if (xhttp.status == 200) {
					obj = JSON.parse(xhttp.response );
					if(obj.success){
						document.querySelector('#current-city').innerText = obj.city;
						document.querySelector('[name="city"]').value = '';
						alert('Ваш город был изменен.');
					} else {
						alert('ЧТо-то пошл не так :(');
					}
				} else {
					wm_ajax_err();
				}
			}
		}
});


let sale_query = {
	slug: null,
	name: null,
	id: null
}

var isInProcess = false;

function do_sale_ajax(){
	if (isInProcess) return;
	isInProcess = true;
	document.querySelector('#whole-sale-table').classList.add('process');
	var res = '';
	Object.keys(sale_query).forEach((i) => {
		if (sale_query[i] != null && sale_query[i]){
			res += i+'='+sale_query[i]+'&';
		}
	})
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url + '?action=apply_cabinet_sale_filters', true);
 	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send(res);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				isInProcess = false;
				obj = JSON.parse(xhttp.response );
				document.querySelector('#whole-sale-table').classList.remove('process');
				if(obj.success){
					document.querySelector('#content').innerHTML = obj.html;
					setTimeout(table_filters_listeners, 400);
				} else {
					alert('ЧТо-то пошл не так :(');
				}
			} else {
				wm_ajax_err();
			}
		}
	}
}

function table_filters_listeners(){
	document.querySelector('#name-variants > input[type="text"]').addEventListener('change', function(e){
		sale_query.name = e.target.value ;
		document.querySelector('#apply-variants').classList.add('active');
	});

	document.querySelector('#id-variants > input[type="text"]').addEventListener('change', function(e){
		sale_query.id = e.target.value ;
		document.querySelector('#apply-variants').classList.add('active');
	});

	document.querySelector('#cats-variants').addEventListener('click', function(e){
		if (!e.target.hasAttribute('data-cat-slug')) return;
		sale_query.slug = e.target.getAttribute('data-cat-slug');
		try	{
			document.querySelector('.active-cat').classList.remove('active-cat');
		} catch (err) {}
		e.target.classList.add('active-cat');
		document.querySelector('#apply-variants').classList.add('active');
	});



	document.querySelector('#whole-sale-table').addEventListener('click', function(e){
		if (e.target.hasAttribute('data-wm-plus')) {
			let newVal = ++document.querySelector('[data-wm-number-prod="'+e.target.getAttribute('data-wm-plus')+'"]').value;
			document.querySelector('[data-wm-number-prod="'+e.target.getAttribute('data-wm-plus')+'"]').value = newVal;
			document.querySelector('a[data-product_id="'+e.target.getAttribute('data-wm-plus')+'"]').setAttribute('data-quantity', newVal);
			change_price_by_tr(e.target.closest('tr[data-price]'));
		}
		if (e.target.hasAttribute('data-wm-minus')) {
			let newVal = document.querySelector('[data-wm-number-prod="'+e.target.getAttribute('data-wm-minus')+'"]').value - 1;
			if (newVal < e.target.getAttribute('data-wm-minus-min')) return;
			document.querySelector('[data-wm-number-prod="'+e.target.getAttribute('data-wm-minus')+'"]').value = newVal;
			document.querySelector('a[data-product_id="'+e.target.getAttribute('data-wm-minus')+'"]').setAttribute('data-quantity', newVal);
			change_price_by_tr(e.target.closest('tr[data-price]'));
		}
	});

	document.querySelector('#applyed-filters').addEventListener('click', function(e){
		if (e.target.hasAttribute('data-filter-name')) {
			sale_query[e.target.getAttribute('data-filter-name')] = null;
			do_sale_ajax();
		}
	});

	document.querySelectorAll('[data-wm-number-prod][type="number"]').forEach(function(item){
		item.addEventListener('change', function(e){
			document.querySelector('a[data-product_id="'+e.target.getAttribute('data-wm-number-prod')+'"]').setAttribute('data-quantity', e.target.value);
			change_price_by_tr(e.target.closest('tr[data-price]'));
		});
	});



	document.querySelector('#apply-variants').addEventListener('click', function(){
		do_sale_ajax();
	});
	fill_query_params();
	pretare_all_total_prices();
}

function fill_query_params(){
	if (sale_query.slug != null && sale_query.slug){
		document.querySelector('#applyed-filter-cat').classList.remove('wm-hid');
		document.querySelector('[data-cat-slug="'+sale_query.slug+'"]').classList.add('active-cat');
		document.querySelector('#applyed-filter-cat span.filter-value').innerText = document.querySelector('[data-cat-slug="'+sale_query.slug+'"]').innerText;
	}
	if (sale_query.id != null && sale_query.id){
		document.querySelector('#applyed-filter-id').classList.remove('wm-hid');
		document.querySelector('#id-variants input').value = sale_query.id;
		document.querySelector('#applyed-filter-id span.filter-value').innerText = sale_query.id;
	}
	if (sale_query.name != null && sale_query.name){
		document.querySelector('#applyed-filter-name').classList.remove('wm-hid');
		document.querySelector('#name-variants input').value = sale_query.name;
		document.querySelector('#applyed-filter-name span.filter-value').innerText = sale_query.name;
	}
}
table_filters_listeners();

function get_calc_discount(singlePrice, qnt, discount){
	switch (disc_type) {
		case 'fixed':
			return fixed_price_calc(singlePrice, qnt, discount);
		case 'flat':
			return flat_price_calc(singlePrice, qnt, discount);
		case 'percent':
			return percent_price_calc(singlePrice, qnt, discount);
	}
}

function fixed_price_calc(singlePrice, qnt, discount){
	return singlePrice * 1 * qnt - discount;
}
function flat_price_calc(singlePrice, qnt, discount){
	return ( singlePrice * 1 - discount) * qnt;
}
function percent_price_calc(singlePrice, qnt, discount){
	return ( singlePrice * 1 * qnt ) / 100 * discount; 
}

function pretare_all_total_prices(){
	document.querySelectorAll('[data-quantity]').forEach(i => {
		i.closest('tr[data-price]').querySelector('[data-total-wrap]').classList.remove('wm-hid');
		change_price_by_tr( i.closest('tr[data-price]') );
	});
}
pretare_all_total_prices();

function change_price_by_tr(tr){
	let singlePrice = tr.getAttribute('data-price');
	let discount = tr.getAttribute('data-value-discount');
	let qnt = tr.querySelector('a.ajax_add_to_cart').getAttribute('data-quantity');
	tr.querySelector('span[data-total]').innerText = ( singlePrice * qnt ) - get_calc_discount(singlePrice, qnt, discount);
	tr.querySelector('span[data-disc-per-one]').innerText = '('+get_calc_discount(singlePrice, 1, discount) + ' руб';
	tr.querySelector('.wm-second-row').classList.remove('wm-hid');
	tr.querySelector('span[data-disc-per-one]').classList.remove('wm-hid');
}