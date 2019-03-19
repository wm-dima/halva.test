function showFeedbackPopup(){
	document.querySelector('#feedbackPopupWrap').classList.remove('wm-hid');
	let feedbackPopupWrapShow = true;
};

function hidFeedbackPopup(){
	document.querySelector('#feedbackPopupWrap').classList.add('wm-hid');
	let feedbackPopupWrapShow = false;
};

function is_phone(dom_elem){
	if (dom_elem.value.length < 6) {
		return false;
	}
	var res = dom_elem.value.match(/^(\+)?((\d)+)?( )?([ -(])?((\d)?)+([ -)])?( )?((\d)?)+([ -])?((\d)?)+([ -])?((\d)?)+([ -])?((\d)?)+([ -])?((\d)?)+$/ig);
	if( res != null && dom_elem.value == res[0]){
		return true;
	} else {
		return false;
	}
}

function wm_ajax_feedback_success(){
	alert('Ваша заявка успешно отправлена!');
	hidFeedbackPopup();
}

function wm_ajax_feedback_err(){
	alert('Что-то пошло не так, пожалуйста, попробуйте позже.');
	hidFeedbackPopup();
}

document.addEventListener("DOMContentLoaded", function(event) { 

	document.querySelector('#feedbackPopupWrap').addEventListener('focusout', function(e){
		if (e.target.closest('input[type="text"]') && e.target.value ){
			e.target.nextElementSibling.classList.add('input--not-empty');
		} else {
			try{
				e.target.nextElementSibling.classList.remove('input--not-empty');
			} catch(er){}
		}
	});

	document.querySelector('#feedbackPopupWrap').addEventListener('click', function(e){
		if (e.target.closest('#feedbackPopupWrap .pop-up') == null) hidFeedbackPopup();
	})

	document.querySelector('#feedbackPopupForm').addEventListener('submit', function(e){
		e.preventDefault();
		if ( feedbackPopupForm.querySelector('[name="name"]').value.length > 2 ) {
			feedbackPopupForm.querySelector('[name="name"]').classList.remove('form-error');
		} else {
			feedbackPopupForm.querySelector('[name="name"]').classList.add('form-error');
		}
		if ( is_phone( feedbackPopupForm.querySelector('[name="tel"]') ) ) {
			feedbackPopupForm.querySelector('[name="tel"]').classList.remove('form-error');
		} else {
			feedbackPopupForm.querySelector('[name="tel"]').classList.add('form-error');
		}
		if ( feedbackPopupWrap.querySelector('.form-error') == null) {
			var obj = new FormData(feedbackPopupForm);
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', feedbackPopupForm.action + '?action=feedback_popup', true);
			xhttp.send(obj);
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4) {
					if (xhttp.status == 200) {
						let obj = JSON.parse(xhttp.response );
						if(obj.success){
							wm_ajax_feedback_success();
						} else {
							wm_ajax_feedback_err();
						}
					} else {
						wm_ajax_feedback_err();
					}
				}
			}
		}

	})

});