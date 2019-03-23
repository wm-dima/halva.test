var wcp_last_added_product = null;
var wcp_last_removed_product = null;

var compare_event_simple_added = new Event('compare_was_added');
var compare_event_simple_removed = new Event('compare_was_removed');
var compare_list_event_removed = new Event('rm_from_list');

document.querySelector('body').addEventListener('compare_was_added', wcp_state_to_remove);

function wcp_state_to_remove(){
	alert('Пробукт был добавлен в сравнение!');
	document.querySelector('[data-item-id="' + wcp_last_added_product + '"][data-wm-wcp]').setAttribute('data-wm-wcp', 'remove');
	document.querySelector('.shop-icons .accept .number').innerText = document.querySelector('.shop-icons .accept .number').innerText * 1 + 1;
}

document.querySelector('body').addEventListener('compare_was_removed', wcp_state_to_add);

function wcp_state_to_add(){
	alert('Пробукт был удален из сравнения!');
	document.querySelector('[data-item-id="' + wcp_last_removed_product + '"][data-wm-wcp]').setAttribute('data-wm-wcp', 'add');
	document.querySelector('.shop-icons .accept .number').innerText = document.querySelector('.shop-icons .accept .number').innerText * 1 - 1;
}

document.querySelector('body').addEventListener('rm_from_list', wcp_rm_from_list);

function wcp_rm_from_list(){
	alert('Пробукт был удален!');
	document.querySelector('[data-wm-prod-id="' + wcp_last_removed_product + '"]').classList.add('wm-hid');
	try{
		document.querySelectorAll('[data-compared-prod="' + wcp_last_removed_product + '"]').forEach(function(item, i){
			item.classList.add('wm-hid');
		});
	}catch(e){}
	document.querySelector('.shop-icons .accept .number').innerText = document.querySelector('.shop-icons .accept .number').innerText * 1 - 1;
}

function compare_controller(e, type = 'compare_remove_event' ){
	let id = e.target.getAttribute('data-item-id');
	if (e.target.getAttribute('data-wm-wcp') == 'add') {
		add_to_compare(id, e.target.getAttribute('data-event-after') + '_added');
	} else {
		remove_from_compare(id, e.target.getAttribute('data-event-after') + '_removed');
	}
}

function add_to_compare(id, type = false){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=add_to_compare" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id + '&type=' + type);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				wcp_response = JSON.parse(xhttp.response );
				document.querySelector('[data-item-id="' + wcp_response.last_added_product + '"][data-wm-wcp]').removeAttribute('wcp-procesing');
				if(wcp_response.success){
					wcp_last_added_product = wcp_response.last_added_product;
					document.querySelector('body').dispatchEvent( eval( wcp_response.event ) );
				} else {
					alert('Что-то пошло не так, попробуйте позже.')
				}
			} else {
				alert('Что-то пошло не так, попробуйте позже.')
			}
		}
	}
}

function remove_from_compare(id, type){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=remove_from_compare" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id + '&type=' + type);
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) {
			if (xhttp.status == 200) {
				wcp_response = JSON.parse(xhttp.response );
				document.querySelector('[data-item-id="' + wcp_response.last_removed_product + '"][data-wm-wcp]').removeAttribute('wcp-procesing');
				if(wcp_response.success){
					wcp_last_removed_product = wcp_response.last_removed_product;
					document.querySelector('body').dispatchEvent( eval( wcp_response.event ) );
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
	if (e.target.hasAttribute('wcp-procesing')) return;
	if (e.target.hasAttribute('data-wm-wcp')) {
		e.target.setAttribute('wcp-procesing', true);
		compare_controller(e);
		return;
	}
});

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