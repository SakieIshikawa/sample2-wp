<?php get_header(); ?>

<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <!-- breadcrumb (パンくずplug) -->
      <div class="breadcrumb">
        <?php bcn_display(); ?>
      </div>

      <div class="archive-head">
        <div class="archive-lead">SEARCH</div>
        <h1 class="archive-title m_search"><span>"<?php the_search_query(); ?>"</span>の検索結果：
          <?php echo $wp_query->found_posts; ?>件</h1>
      </div>

      <?php if (have_posts()) : ?>

        <!-- entries -->
        <div class="entries m_horizontal">

          <?php while (have_posts()) :
              the_post(); ?>

            <!-- entry-item -->
            <a href="<?php the_permalink(); ?>" class="entry-item">
              <div class="entry-item-img">
                <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                      echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                    } ?>
              </div>

              <!-- entry-item-body -->
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

      <?php else : ?>
        <div>
          <p>検索キーワードに該当する記事がありませんでした。</p>
        </div>

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
            ); ?>
        </div><!-- /pagination -->
      <?php endif; ?>


    </main><!-- /primary -->

    <?php get_sidebar(); ?>


  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>