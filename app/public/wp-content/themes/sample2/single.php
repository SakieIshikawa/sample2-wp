<?php get_header(); ?>

<!-- content -->
<div id="content">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <!-- breadcrumb (パンくずplug) -->
      <?php if (function_exists('bcn_display')) : ?>
        <div class="breadcrumb">
          <?php
          if (function_exists('bcn_display')) {
            bcn_display();
          }
          ?>
        </div><!-- /breadcrumb -->
      <?php endif; ?>


      <?php if (have_posts()) :   //もし投稿を表示できれば、一覧に存在している投稿ごとそれぞれに以下の処理を行う
        while (have_posts()) :
          the_post();
          ?>

          <!-- entry -->
          <article class="entry">

            <!-- entry-header -->
            <div class="entry-header">
              <?php
              // カテゴリー１つ目の名前を表示
              $category = get_the_category();
              if ($category[0]) : ?>
                <div class="entry-label">
                  <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>">
                    <?php echo $category[0]->cat_name; ?>
                  </a></div>
              <?php endif; ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>

              <div class="entry-meta">
                <time class="entry-published" datetime="<?php the_time('d'); ?>">公開日<?php the_time('Y年n月j日'); ?></time>
                <!-- if文 (公開日と最終更新日が違った場合) -->
                <?php if (get_the_modified_time('Y-m-d') !== get_the_time('Y-m-d')) : ?>
                  <time class="entry-updated" datetime="<?php get_the_modified_time('d'); ?>">最終更新日<?php the_time('Y年n月j日'); ?></time>
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

            <div class="entry-body">
              <p><?php the_content(); ?></p>
              <?php   //改ページを有効にするための記述
              wp_link_pages(
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
              <div class="entry-btn"><a class="btn" href="">btn</a></div>
            </div><!-- /entry-body -->

            <!-- entry-tag-items -->
            <?php $post_tags = get_the_tags(); ?>
            <div class="entry-tag-items">
              <div class="entry-tag-head">タグ</div>
              <?php if ($post_tags) : ?>
                <?php foreach ($post_tags as $tag) : ?>
                  <div class="entry-tag-item"><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                      <?php echo esc_html($tag->name); ?>
                    </a></div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>


            <div class="entry-related">
              <div class="related-title">関連記事</div>

              <div class="related-items">

                <a class="related-item" href="">
                  <div class="related-item-img"><img src="img/entry1.png" alt=""></div>
                  <div class="related-item-title">記事のタイトルが入ります記事のタイトルが入ります記事のタイトルが入ります</div>
                </a>

              </div><!-- /related-items -->
            </div><!-- /entry-related -->

          </article><!-- /entry -->

        <?php endwhile;
    endif; ?>
    </main><!-- /primary -->

    <?php get_sidebar(); ?>



  </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>





<!---------   to do    --------------
                post_class()
                get_the_category()
                get_category_link()
                get_the_modified_time()
                the_content()
                wp_link_pages()
                ------------------------------------>
