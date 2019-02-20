document.querySelector('.filter').addEventListener('click', function(e){
	if(e.target.closest('p.wm-filter-title')){
		try {
			var the_filter_wrap = e.target.closest('.filter-manufactures');
			the_filter_wrap.classList.toggle('wm-filter--active');
			the_filter_wrap.querySelector('ul').classList.toggle('wm-show-filter-class');
		} catch (er) {
			var the_filter_wrap = e.target.closest('.filter-price');
			the_filter_wrap.classList.toggle('wm-filter--active');
			the_filter_wrap.querySelector('form').classList.toggle('wm-show-filter-class');
		}
		return;
	}
	if (e.target.closest('.woocommerce-widget-layered-nav-list__item')) {
		e.target.closest('.woocommerce-widget-layered-nav-list__item').querySelector('a').click();
		return;
	}
})

document.querySelector('.filter-price form').addEventListener('submit', function(){
	if(max_price.value == ''){
		max_price.value = max_price.getAttribute('data-max'); 
	}
})

function only_in_stock(e, th){
	$('.checkbox').toggleClass('chk-active');
	$('#label').toggleClass('orange');
	th.closest('form').submit();
}


