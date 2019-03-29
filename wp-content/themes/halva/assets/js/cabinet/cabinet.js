document.querySelector('.nav-tabs ul').addEventListener('click', function(e){
	let wasActiveNav = document.querySelector('.nav--active');
	wasActiveNav.classList.remove('nav--active');
	e.target.closest('[data-tab-nav]').classList.add('nav--active');
	document.querySelector('.tab--active').classList.add('wm-hid');
	document.querySelector('.tab--active').classList.remove('tab--active');
	let newActiveTab = document.querySelector('[data-tab="'+e.target.closest('[data-tab-nav]').getAttribute('data-tab-nav')+'"]');
	newActiveTab.classList.add('tab--active');
	newActiveTab.classList.remove('wm-hid');
})

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
})