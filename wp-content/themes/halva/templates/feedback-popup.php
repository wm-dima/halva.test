<div class="pop-up-wrap wm-hid" id="feedbackPopupWrap">
	<div class="pop-up">
		<div class="pop-up-close" onclick="hidFeedbackPopup()"></div>
		<form action="<?php echo admin_url('admin-ajax.php'); ?>" id="feedbackPopupForm" method="post" enctype="multipart/form-data"> 
			<div class="inp-name-wrap">
				<input type="text" name="name" id="pop-up-name">
				<label for="pop-up-name" class="place-holder-text">Имя</label>
			</div>
			<div class="inp-tel-wrap">
				<input type="text" name="tel" id="pop-up-tel">
				<label for="pop-up-tel" class="place-holder-text">Телефон</label>
			</div>
			<div class="feedback-pop-up-submit">
				<input type="submit">
			</div>
			<input type="hidden" name="title" id="the-title" value="Перезвоните мне пожалуйста">
		</form>
	</div>
</div>

<div class="popupBg" onclick="$('.popupBg').toggleClass('popupBgShow');"></div>