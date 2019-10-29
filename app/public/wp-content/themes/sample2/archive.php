<?php get_header(); ?>


<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <!-- breadcrumb -->
      <div class="breadcrumb">
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" href="/" class="home"><span property="name">ホーム</span></a>
          <meta property="position" content="1">
        </span>
        <i class="fas fa-angle-right"></i>
        <span class="current-item">カテゴリー名</span>
      </div><!-- /breadcrumb -->


      <div class="archive-head m_description">
        <div class="archive-lead">ARCHIVE</div>
        <h1 class="archive-title m_category">カテゴリー名</h1><!-- /archive-title -->
        <div class="archive-description">
          <p>
            カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明カテゴリーの説明
          </p>
        </div><!-- /archive-description -->
      </div><!-- /archive-head -->


      <!-- entries -->
      <?php if (have_posts()) :
        the_post(); ?>

        <div class="entries m_horizontal">

          <!-- entry-item -->
          <!-- 記事数ぶんループ -->
          <?php while (have_posts()) :
            the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="entry-item">
              <div class="entry-item-img">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else {
                  echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/entry1.png" alt="">';
                } ?>
              </div>

              <!-- entry-item-body -->
              <div class="entry-item-body">
                <div class="entry-item-meta">
                  <?php $category = get_the_category();
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

<!-- footer-menu -->
<?php get_footer(); ?>
