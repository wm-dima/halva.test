<?php get_header(); ?>
<div class="search-res-wrapper">

    <div class="wrapper">
        <?php get_template_part('templates/search', 'catalog'); ?>
    </div>


	<h1><?php echo 'Результат поиска: ' . '<span>"' . get_search_query() . '"</span>'; ?></h1>
	<?php
		if (have_posts()) :
			while (have_posts()) : the_post();?>

				<div class="result-single">
					<div class="info">
						<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p><?php the_excerpt() ?></p>
						<div>Дата добавления: <?php the_date() ?></div>
					</div>
					<div class="thumbnail">
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink() ?>">
                           		<?php the_post_thumbnail(); ?>
                           	</a>
						<?php endif ?>
					</div>
				</div>

			<?php endwhile; ?>
		<?php
		else :
		echo "Извините по Вашему результату ничего не найдено";
		endif;
		wp_reset_postdata();
	?>
</div>


<?php get_footer(); ?>
