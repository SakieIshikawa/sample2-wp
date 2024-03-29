<!-- footer-menu -->
<div id="footer-menu">
  <div class="inner">
    <div class="footer-logo"><a href="/">sample2</a></div>
    <div class="footer-sub">サブタイトル</div>
    <?php
    wp_nav_menu(
      array(
        'depth' => 1,
        'theme_location' => 'footer',
        'container' => 'nav',
        'container_class' => 'footer-nav',
        'menu_class' => 'footer-list',
      )
    ); ?>

  </div>
</div>


<!-- footer -->
<footer id="footer">
  <div class="inner">
    <div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div>
  </div>
</footer>


<!-- single pageでのみsns投稿リンクを表示 -->
<?php if (is_single()) : ?>
  <!-- footer-sns -->
  <div class="footer-sns">
    <div class="inner">
      <div class="footer-sns-head">この記事をシェアする</div>

      <nav class="footer-sns-buttons">
        <ul>
          <li><a class="m_twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-twitter.png'); ?>" alt=""></a></li>
          <li><a class="m_facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-facebook.png'); ?>" alt=""></a></li>
          <li><a class="m_hatena" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-hatena.png'); ?>" alt=""></a></li>
          <li><a class="m_line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-line.png'); ?>" alt=""></a></li>
          <li><a class="m_pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-pocket.png'); ?>" alt=""></a></li>
        </ul>
      </nav>

    </div>
  </div><!-- /footer-sns -->
<?php endif; ?>


<!-- topへ戻るbtn -->
<div class="floating">
  <a href="#"><i class="fas fa-chevron-up"></i></a>
</div>

<?php wp_footer(); ?>
</body>

</html>