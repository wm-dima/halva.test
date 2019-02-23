var last_added_product = null;
var last_removed_product = null;

var compare_added_event = new Event('compare_was_added');
var compare_remove_event = new Event('compare_was_removed');

document.querySelector('body').addEventListener('compare_was_added', wcp_state_to_remove);

function wcp_state_to_remove(){
	alert('Пробукт был добавлен!');
	document.querySelector('[data-wm-prod-id="' + last_added_product + '"] [data-wm-wcp]').setAttribute('data-wm-wcp', 'remove');
	document.querySelector('.shop-icons .accept .number').innerText = document.querySelector('.shop-icons .accept .number').innerText * 1 + 1;
}

document.querySelector('body').addEventListener('compare_was_removed', wcp_state_to_add);

function wcp_state_to_add(){
	alert('Пробукт был удален!');
	document.querySelector('[data-wm-prod-id="' + last_removed_product + '"] [data-wm-wcp]').setAttribute('data-wm-wcp', 'add');
	document.querySelector('.shop-icons .accept .number').innerText = document.querySelector('.shop-icons .accept .number').innerText * 1 - 1;
}

function compare_controller(e){
	var id = e.target.closest('.catalog-item.hi-1').getAttribute('data-wm-prod-id');
	if (e.target.getAttribute('data-wm-wcp') == 'add') {
		add_to_compare(id);
	} else {
		remove_from_compare(id);
	}
}

function add_to_compare(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=add_to_compare" , true);
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

function get_all_compared(){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=get_all_compared" , true);
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

function remove_from_compare(id){
	var xhttp = new XMLHttpRequest();
	xhttp.open('POST', my_ajax_url.ajax_url +"?action=remove_from_compare" , true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhttp.send('id=' + id);
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
	if (e.target.hasAttribute('data-wm-wcp')) {
		compare_controller(e);
		return;
	}
});