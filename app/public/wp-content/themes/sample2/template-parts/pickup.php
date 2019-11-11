<!-- pickup -->
<div id="pickup">
  <div class="inner">

    <div class="pickup-items">

      <?php
      $args = array(
        'posts_per_page' => 3,
        'orderby' => 'data',
      );
      $new_posts = get_posts($args);
      foreach ($new_posts as $post) : setup_postdata($post);
        ?>


        <a href="<?php the_permalink(); ?>" class="pickup-item">
          <div class="pickup-item-img">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('large');
              } else {
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
              } ?>
            <?php
              $category = get_the_category();
              $cat_name = $category[0]->cat_name;
              if ($category[0]) {
                echo '<div class="pickup-item-tag">' . $cat_name . '</div>';
              } ?>
          </div>
          <div class="pickup-item-body">
            <h2 class="pickup-item-title"><?php the_title(); ?></h2>
          </div>
        </a>


      <?php endforeach;
      wp_reset_postdata(); ?>
    </div><!-- /pickup-items -->

  </div><!-- /inner -->
</div><!-- /pickup -->