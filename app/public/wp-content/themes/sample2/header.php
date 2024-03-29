<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <title>sample2</title>
  <meta name="description" content="sample2">

  <meta property="og:title" content="sample2">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://example.com/">
  <meta property="og:image" content="https://example.com/img/ogp.png">
  <meta property="og:site_name" content="sample2">
  <meta property="og:description" content="">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" href="./img/icon-home.png">
  <?php wp_head(); ?>

</head>

<body>
  <header id="header">
    <div class="inner">
      <!-- トップページ（ホームとフロントページ）にだけ表示する場合の表示(.h1)とその他の表示(.div) -->
      <?php if (is_home() || is_front_page()) : ?>
        <h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
      <?php else : ?>
        <div class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
      <?php endif; ?>
      <div class="header-sub"><?php bloginfo('description'); ?></div>

      <!-- drawer (sp用メニュー) -->
      <div class="drawer">
        <div class="drawer-icon">
          <span class="drawer-open"><i class="fas fa-bars"></i></span>
          <span class="drawer-close"><i class="fas fa-times"></i></span>
        </div><!-- /drawer-icon -->

        <!-- drawer-content -->
        <div class="drawer-content">
          <?php
          wp_nav_menu(
            array(
              'depth' => 1,
              'theme_location' => 'drawer', //drawer menuの表示場所の指定
              'container' => 'nav',  //  ulをラップするタグ(container)
              'container_class' => 'drawer-nav',  // ラップしたcontainerのclass名
              'menu_class' => 'drawer-list',
            )
          );
          ?>
        </div>
      </div><!-- /drawer -->

    </div><!-- /inner -->
  </header><!-- /header -->


  <!-- header-nav (pc用 menu) -->
  <nav class="header-nav">
    <div class="inner">
      <?php
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'global',
          'container' => 'false',
          'menu_class' => 'header-list',
        )
      );
      ?>
    </div>
  </nav>
