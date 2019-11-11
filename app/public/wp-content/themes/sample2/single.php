<?php set_post_views(get_the_ID()); ?>

<?php get_header(); ?>

<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <!-- breadcrumb パンくず -->
      <div class="breadcrumb">
        <?php
        if (function_exists('bcn_display')) {
          bcn_display();
        }
        ?>
      </div>

      <?php if (have_posts()) :
        while (have_posts()) :
          the_post(); ?>

          <!-- entry -->
          <article class="entry">

            <!-- entry-header -->
            <div class="entry-header">
              <?php $category = get_the_category();
                  if ($category[0]) : ?>
                <div class="entry-label">
                  <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo $category[0]->cat_name; ?></a>
                </div>
              <?php endif; ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>

              <div class="entry-meta">
                <time class="entry-published" datetime="<?php the_time('d'); ?>"><?php the_time('Y年n月j日'); ?></time>
                <?php if (get_the_time('Y-m-d') !== get_the_modified_time('Y-m-d')) : ?>
                  <time class="entry-updated" datetime="<?php the_modified_time('d'); ?>">最終更新日<?php the_modified_time('Y年n月j日'); ?></time>
                <?php endif; ?>
              </div>

              <div class="entry-img">
                <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('large');
                    } else {
                      echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                    } ?>
              </div>
            </div><!-- /entry-header -->

            <!-- entry-body -->
            <div class="entry-body">
              <?php the_content(); ?>
              <?php wp_link_pages(
                    array(
                      'before' => '<nav class="entry-links">',
                      'after' => '</nav>',
                      'link_before' => '',
                      'link_after' => '',
                      'next_or_number' => 'number',
                      'separator' => '',
                    )
                  );
                  ?>
              <div class="entry-btn"><a class="btn" href="">button</a></div><!-- /entry-btn -->
            </div><!-- /entry-body -->

            <?php $post_tags = get_the_tags(); ?>
            <!-- post_tagsに取得したtagを代入 -->
            <div class="entry-tag-items">
              <div class="entry-tag-head">タグ</div>
              <?php if ($post_tags) : ?>
                <!-- もしpost_tagsがあれば -->
                <?php foreach ($post_tags as $tag) : ?>
                  <!-- $tagをそれぞれ出力 -->
                  <div class="entry-tag-item"><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>


            <div class="entry-related">
              <div class="related-title">関連記事</div>

              <?php if (has_category()) {
                    $post_cats = get_the_category();
                    //所属カテゴリーのIDリストを作っておく
                    $cat_ids = array();
                    foreach ($post_cats as $cat) {
                      $cat_ids[] = $cat->term_id;
                    }
                  }

                  $myposts = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => '8',
                    'post__not_in' => array($post->ID), // 表示中の投稿を除外する
                    'category__in' => $cat_ids, // この投稿と同じカテゴリーに属する投稿の中から
                    'orderby' => 'rand' // ランダムに
                  ));
                  if ($myposts) : ?>

                <div class="related-items">
                  <?php foreach ($myposts as $post) :  // my_posts(記事の一覧）の内の1件の投稿記事を$postへ
                          setup_postdata($post);       // 今からこの記事を使うとWordPressに宣言 
                          ?>
                    <a class="related-item" href="<?php the_permalink(); ?>">
                      <div class="related-item-img">
                        <?php if (has_post_thumbnail()) {
                                  the_post_thumbnail('large');
                                } else {
                                  echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                                } ?>
                      </div>
                      <div class="related-item-title"><?php the_title(); ?></div>
                    </a>

                  <?php endforeach;
                        wp_reset_postdata(); // グローバル変数である$postをreset
                        ?>
                </div>
              <?php endif; ?>
            </div><!-- /entry-related -->

          </article> <!-- /entry -->

      <?php endwhile;
      endif; ?>
    </main><!-- /primary -->

    <?php get_sidebar(); ?>

  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>