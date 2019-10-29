<!-- footer-menu -->
<div id="footer-menu">
  <div class="inner">
    <div class="footer-logo"><a href="/">sample2</a></div><!-- /footer-logo -->
    <div class="footer-sub">サブタイトル</div><!-- /footer-sub -->
    <?php
    wp_nav_menu(
      //.footer-listを置き換えて、動的に表示する
      array(
        'depth' => 1,
        'theme_location' => 'footer',
        'container' => 'nav',
        'container_class' => 'footer-nav',
        'menu_class' => 'footer-list',
      )
    ); ?>

  </div><!-- /inner -->
</div><!-- /footer-menu -->
<!-- footer -->
<footer id="footer">
  <div class="inner">
    <div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
  </div><!-- /by -->

  </div><!-- /inner -->
</footer><!-- /footer -->

<div class="floating">
  <a href="#"><i class="fas fa-chevron-up"></i></a>
</div>

<?php wp_footer(); ?>
</body>

</html>
