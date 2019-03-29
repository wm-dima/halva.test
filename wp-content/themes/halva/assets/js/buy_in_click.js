function showBuyInClick(){
	document.querySelector('#pop-up-address').value = document.querySelector('#select-city').value;
	if (document.querySelector('#select-city').value) {
		document.querySelector('[for="pop-up-address"]').classList.add('input--not-empty');
	}
	document.querySelector('#buyInClickWrap').classList.remove('wm-hid');
	let buyInClickWrapShow = true;
	$('.popupBg').addClass('popupBgShow');
};

function hidBuyInClick(){
	document.querySelector('#select-city').value = document.querySelector('#pop-up-address').value;
	document.querySelector('#buyInClickWrap').classList.add('wm-hid');
	let buyInClickWrapShow = false;
	$('.popupBg').removeClass('popupBgShow');
};

function calcBuyInClick(e){
	e.preventDefault();
	showBuyInClick();
}