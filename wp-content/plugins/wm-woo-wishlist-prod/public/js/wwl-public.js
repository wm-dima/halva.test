document.addEventListener('DOMContentLoaded', function(){ 

var wwl_last_added_product = null;
var wwl_last_removed_product = null;

var wish_event_simple_added = new Event('wish_was_added_simple');
var wish_event_simple_removed = new Event('wish_was_removed_simple');

var remove_from_compare_list_removed = new Event('removed_from_compare_list');

document.querySelector('body').addEventListener('wish_was_added_simple', wwl_state_to_remove);

function wwl_state_to_remove(){
	alert('Пробукт был добавлен в список желаний!');
	let items = document.querySelectorAll('[data-item-id="' + wwl_last_added_product + '"][data-wm-wwl]');
	items.map = [].map;
	items.map(item => (item.setAttribute('data-wm-wwl', 'remove')));
	document.querySelector('.shop-icons .likes .number').innerText = document.querySelector('.shop-icons .likes .number').innerText * 1 + 1;
}

document.querySelector('body').addEventListener('wish_was_removed_simple', wwl_state_to_add);

function wwl_state_to_add(){
	alert('Пробукт был удален из списка желаний!');
	let items = document.querySelectorAll('[data-item-id="' + wwl_last_removed_product + '"][data-wm-wwl]');
	items.map = [].map;
	items.map(item => (item.setAttribute('data-wm-wwl', 'add')));
	document.querySelector('.shop-icons .likes .number').innerText = document.querySelector('.shop-icons .likes .number').innerText * 1 - 1;
}

document.querySelector('body').addEventListener('removed_from_compare_list', wwl_rm_wish_list);

function wwl_rm_wish_list(){
	alert('Продукт был удален из избранного!');
	document.querySelector('[data-wm-prod-id="'+wwl_last_removed_product+'"]').classList.add('wm-hid');
	document.querySelector('.shop-icons .likes .number').innerText = document.querySelector('.shop-icons .likes .number').innerText * 1 - 1;
}


function wish_controller(e){
	let id = e.target.getAttribute('data-item-id');
	if (e.target.getAttribute('data-wm-wwl') == 'add') {
		add_to_wish(id, e.target.getAttribute('data-event-after') + '_added');
	} else {
		remove_from_wish(id, e.target.getAttribute('data-event-after') + '_removed');
	}
}

function add_to_wish(id, type = false){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=add_to_wish" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id + '&type=' + type);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				response = JSON.parse(xhttp.response );
				document.querySelector('[data-item-id="' + response.last_added_product + '"][data-wm-wwl][wwl-procesing]').removeAttribute('wwl-procesing');
				if(response.success){
					wwl_last_added_product = response.last_added_product;
					document.querySelector('body').dispatchEvent( eval( response.event ) );
				} else {
					alert('Что-то пошло не так, попробуйте позже.')
				}
			} else {
				alert('Что-то пошло не так, попробуйте позже.')
			}
		}
	}
}

function remove_from_wish(id, type = false){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=remove_from_wish" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id + '&type=' + type);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				if (document.querySelector('.want-left .want-catalog') != null) update_wwl_categories();
				response = JSON.parse(xhttp.response );
				document.querySelector('[data-item-id="' + response.last_removed_product + '"][data-wm-wwl][wwl-procesing]').removeAttribute('wwl-procesing');
				if(response.success){
					wwl_last_removed_product = response.last_removed_product;
					document.querySelector('body').dispatchEvent( eval( response.event ) );
				} else {
					alert('Что-то пошло не так, попробуйте позже.')
				}
			} else {
				alert('Что-то пошло не так, попробуйте позже.')
			}
		}
	}
}

document.querySelector('body').addEventListener('click', function (e){
	if (document.querySelector('[wwl-procesing]') != null) return;
	if (e.target.hasAttribute('data-wm-wwl')) {
		e.target.setAttribute('wwl-procesing', true);
		wish_controller(e);
		return;
	}
});

function update_wwl_categories(){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=wwl_get_compared_cat" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				document.querySelector('.want-left .want-catalog').innerHTML = xhttp.response;
			}
		}
	}
}

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options) {
  options = options || {};

  var expires = options.expires;

  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }

  value = encodeURIComponent(value);

  var updatedCookie = name + "=" + value;

  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }

  document.cookie = updatedCookie;
}

});