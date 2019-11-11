<?php get_header(); ?>

<!-- pickup (3記事) -->
<?php get_template_part('template-parts/pickup'); ?>

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
											echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
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

			<!-- pagination -->
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
				</div><!-- /pagination -->
			<?php endif; ?>

		</main><!-- /primary -->

		<!-- secondary -->
		<?php get_sidebar(); ?>

	</div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>