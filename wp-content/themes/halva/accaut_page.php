<?php 
/*
*Template Name: Личный кабинет
*/
?>
<?php 
	if (!is_user_logged_in()) {
		header('Location: ' . wp_registration_url());
	}
?>
<?php get_header(); ?>

<div class="center-wrap wrapper">
	<div class="nav-tabs">
		<ul>
			<li data-tab-nav="info" class="nav--active">Настройка информации</li>
			<li data-tab-nav="price">Цены для для оптовых закупок</li>
		</ul>
	</div>
	<div data-tab="info" class="tab--active">
		<h1>Информация</h1>
		<form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" id="city-form">
			<p>Ваш текущий город: <p id="current-city" class="wm-hid"><?php echo get_user_city(); ?></p></p>
			<input type="text" name="city" value="<?php echo get_user_city(); ?>" style="border: 1px solid #aba2a2">
			<input type="submit">
		</form>
	</div>
	<div data-tab="price" class="wm-hid">
		<h1>Цена на продукты для оптовых покупателей</h1>
		<div class="content">
			<?php echo do_shortcode( '[table id=1 /]' ); ?>
		</div>
	</div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/cabinet/cabinet.js"></script>
<?php get_footer(); ?>
