var last_added_product = null;
var last_removed_product = null;

var wish_added_event = new Event('wish_was_added');
var wish_remove_event = new Event('wish_was_removed');
var wish_list_remove_event = new Event('rm_wish_list');

document.querySelector('body').addEventListener('wish_was_added', wwl_state_to_remove);

function wwl_state_to_remove(){
	alert('Пробукт был добавлен в список желаний!');
	document.querySelector('[data-wm-prod-id="' + last_added_product + '"] [data-wm-wwl]').setAttribute('data-wm-wwl', 'remove');
	document.querySelector('.shop-icons .likes .number').innerText = document.querySelector('.shop-icons .likes .number').innerText * 1 + 1;
}

document.querySelector('body').addEventListener('wish_was_removed', wwl_state_to_add);

function wwl_state_to_add(){
	alert('Пробукт был удален из списка желаний!');
	document.querySelector('[data-wm-prod-id="' + last_removed_product + '"] [data-wm-wwl]').setAttribute('data-wm-wwl', 'add');
	document.querySelector('.shop-icons .likes .number').innerText = document.querySelector('.shop-icons .likes .number').innerText * 1 - 1;
}

document.querySelector('body').addEventListener('rm_wish_list', wwl_rm_wish_list);

function wwl_rm_wish_list(){
	alert('Продукт был удален из избранного!');
	document.querySelector('[data-wm-prod-id="'+last_removed_product+'"]').classList.add('wm-hid');
}

function wish_controller(e){
	try{
		var id = e.target.closest('.catalog-item.hi-1').getAttribute('data-wm-prod-id');
	} catch (er){
		var id = e.target.closest('.hit-item.hi-1').getAttribute('data-wm-prod-id');
	}
	if (e.target.getAttribute('data-wm-wwl') == 'add') {
		add_to_wish(id);
	} else {
		remove_from_wish(id);
	}
}

function wish_list_remove(e, type){
	var id = e.target.closest('[data-wm-prod-id]').getAttribute('data-wm-prod-id');
	remove_from_wish(id, type);

}
function add_to_wish(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=add_to_wish" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				response = JSON.parse(xhttp.response );
				if(response.success){
					last_added_product = response.last_added_product;
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

function get_all_wishd(){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=get_all_wishd" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				response = JSON.parse(xhttp.response );
				console.log(response);
				if(response.success){
					all_prods = response;
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
				response = JSON.parse(xhttp.response );
				if(response.success){
					// rm_id(response.last_removed_product);
					last_removed_product = response.last_removed_product;
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

document.querySelector('body').addEventListener('click', function (e){
	if (e.target.hasAttribute('data-wm-wwl')) {
		wish_controller(e);
		return;
	}
	if (e.target.hasAttribute('data-wm-wwl-compared-list')) {
		wish_list_remove(e, 'wish_list_remove_event');
		return;
	}

});