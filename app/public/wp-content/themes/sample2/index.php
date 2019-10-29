<?php get_header(); ?>

<!-- pickup -->
<div id="pickup">
	<div class="inner">

		<div class="pickup-items">

			<a href="#" class="pickup-item">
				<div class="pickup-item-img">
					<img src="<?php echo get_template_directory_uri() ?>/img/pickup1.png" alt="">
					<div class="pickup-item-tag">カテゴリ名</div><!-- /pickup-item-tag -->
				</div><!-- /pickup-item-img -->
				<div class="pickup-item-body">
					<h2 class="pickup-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</h2><!-- /pickup-item-title -->
				</div><!-- /pickup-item-body -->
			</a><!-- /pickup-item -->

			<a href="#" class="pickup-item">
				<div class="pickup-item-img">
					<img src="<?php echo get_template_directory_uri() ?>/img/pickup2.png" alt="">
					<div class="pickup-item-tag">カテゴリ名</div><!-- /pickup-item-tag -->
				</div><!-- /pickup-item-img -->
				<div class="pickup-item-body">
					<h2 class="pickup-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</h2><!-- /pickup-item-title -->
				</div><!-- /pickup-item-body -->
			</a><!-- /pickup-item -->

			<a href="#" class="pickup-item">
				<div class="pickup-item-img">
					<img src="<?php echo get_template_directory_uri() ?>/img/pickup3.png" alt="">
					<div class="pickup-item-tag">カテゴリ名</div><!-- /pickup-item-tag -->
				</div><!-- /pickup-item-img -->
				<div class="pickup-item-body">
					<h2 class="pickup-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</h2><!-- /pickup-item-title -->
				</div><!-- /pickup-item-body -->
			</a><!-- /pickup-item -->

		</div><!-- /pickup-items -->

	</div><!-- /inner -->
</div><!-- /pickup -->


<!-- content -->
<div id="content">
	<div class="inner">

		<!-- primary -->
		<main id="primary">

			<!-- 記事があればentriesブロック以下を表示する -->
			<?php if (have_posts()) : ?>

				<!-- entries (記事一覧)-->
				<div class="entries">

					<!-- 記事数ぶんループ -->
					<?php while (have_posts()) :
						the_post(); ?>

						<!-- entry-item (1記事)-->
						<a href="<?php the_permalink(); ?>" class="entry-item">
							<div class="entry-item-img">
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail('large');
								} else {
									echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/entry1.png" alt="">';
								} ?>
							</div>
							<div class="entry-item-body">
								<div class="entry-item-meta">
									<!-- カテゴリー１つ目を表示 -->
									<?php
									$category = get_the_category();
									$cat_name = $category[0]->cat_name;
									if ($category[0]) {
										echo '<div class="entry-item-tag">' . $cat_name . '</div>';
									} ?>
									<time class="entry-item-published" datetime="<?php the_time('d'); ?>"><?php the_time('Y年n月j日'); ?></time>
								</div>
								<h2 class="entry-item-title"><?php the_title(); ?></h2>
								<div class="entry-item-excerpt">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						</a><!-- /entry-item -->

					<?php endwhile; ?>
				</div><!-- /entries -->
			<?php endif; ?>

			<!-- pagenation -->
			<?php if (paginate_links()) : ?>
				<div class="pagenation">
					<?php echo paginate_links(
						array(
							'end_size' => 0,
							'mid_size' => 1,
							'prev_next' => true,
							'prev_text' => '<i class="fas fa-angle-left"></i>',
							'next_text' => '<i class="fas fa-angle-right"></i>',
						)
					);
					?>
				</div><!-- /pagenation -->
			<?php endif; ?>

		</main><!-- /primary -->

		<!-- secondary -->
		<?php get_sidebar(); ?>

	</div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>
