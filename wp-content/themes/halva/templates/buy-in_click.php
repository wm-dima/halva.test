<div class="pop-up-wrap wm-hid" id="buyInClickWrap">
	<div class="pop-up">
		<div class="pop-up-close" onclick="hidBuyInClick()"></div>
		<form action="<?php echo admin_url('admin-ajax.php'); ?>" id="buyInClickForm" method="post" enctype="multipart/form-data"> 
			<div class="pod-info-wrap">
				<p>Товар:</p>
				<p data-prod-name><?php the_title('',''); ?></p>
			</div>
			<div class="pod-info-wrap">
				<p>Количество: </p>
				<input type="number" name="count" id="pop-up-count">
			</div>
			<div class="inp-name-wrap">
				<input type="text" name="name" id="pop-up-name">
				<label for="pop-up-name" class="place-holder-text">Имя</label>
			</div>
			<div class="inp-tel-wrap">
				<input type="text" name="tel" id="pop-up-tel">
				<label for="pop-up-tel" class="place-holder-text">Телефон</label>
			</div>
			<div class="inp-tel-wrap">
				<input type="text" name="address" id="pop-up-address">
				<label for="pop-up-address" class="place-holder-text">Адрес</label>
			</div>
			<div class="feedback-pop-up-submit">
				<input type="submit">
			</div>
			<input type="hidden" name="title" value="Купить в 1 клик">
			<input type="hidden" name="prod_id" value="<?php echo get_the_ID(); ?>">
		</form>
	</div>
</div>

<script>
	
document.addEventListener("DOMContentLoaded", function(event) { 

	document.querySelector('#buyInClickWrap').addEventListener('focusout', function(e){
		if (e.target.closest('input[type="text"]') && e.target.value ){
			e.target.nextElementSibling.classList.add('input--not-empty');
		} else {
			try{
				e.target.nextElementSibling.classList.remove('input--not-empty');
			} catch(er){}
		}
	});

	document.querySelector('#buyInClickWrap').addEventListener('click', function(e){
		if (e.target.closest('form') == null) hidBuyInClick();
	})

	document.querySelector('#buyInClickForm').addEventListener('submit', function(e){
		e.preventDefault();
		if ( buyInClickForm.querySelector('[name="name"]').value.length > 2 ) {
			buyInClickForm.querySelector('[name="name"]').classList.remove('form-error');
		} else {
			buyInClickForm.querySelector('[name="name"]').classList.add('form-error');
		}
		if ( is_phone( buyInClickForm.querySelector('[name="tel"]') ) ) {
			buyInClickForm.querySelector('[name="tel"]').classList.remove('form-error');
		} else {
			buyInClickForm.querySelector('[name="tel"]').classList.add('form-error');
		}
		if ( buyInClickWrap.querySelector('.form-error') == null) {
			var obj = new FormData(buyInClickForm);
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', buyInClickForm.action + '?action=buy_in_click', true);
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

</script>