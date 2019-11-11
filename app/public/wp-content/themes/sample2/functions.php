
<?php
/**
 * テーマのセットアップ
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_image_size('singleRelatedThumbnail', 340, 200, true); //アイキャッチ画像の定義 (幅 340px、高さ 220px)
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}

add_action('after_setup_theme', 'my_setup');
// セットアップの書き方の型
// function custom_theme_setup() {
// add_theme_support( $feature, $arguments );
// }
// add_action( 'after_setup_theme', 'custom_theme_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * 参考：https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
  wp_enqueue_style('my', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
  wp_enqueue_script('my', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);

  if (is_single()) {
    wp_enqueue_script('sns', get_template_directory_uri() . '/js/sns.js', array('jquery'), '1.0.0', true);
  }
}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */

function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'footer' => 'フッターメニュー',
    )
  );
}
add_action('init', 'my_menu_init');



/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

  if (is_category()) { // カテゴリー
    $title = '' . single_cat_title('', false) . '';
  } elseif (is_tag()) { // タグ
    $title = '' . single_tag_title('', false) . '';
  } elseif (is_post_type_archive()) { // 投稿タイプ
    $title = '' . post_type_archive_title('', false) . '';
  } elseif (is_tax()) { // ターム
    $title = '' . single_term_title('', false);
  } elseif (is_author()) { // 作者
    $title = '' . get_the_author() . '';
  } elseif (is_date()) { // 日付
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');




/**
 * カテゴリーを1つ表示
 *
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.
 * @return void
 */

function my_the_post_category($anchor = true, $id = 0)
{
  global $post;
  //引数が渡されなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }

  //カテゴリー一覧を取得
  $this_categories = get_the_category($id);
  if ($this_categories[0]) {
    if ($anchor) { //引数がtrueならリンク付きで出力
      echo '<a href="' . esc_url(get_category_link($this_categories[0]->term_id)) . '">' . esc_html($this_categories[0]->cat_name) . '</a>';
    } else { //引数がfalseならカテゴリー名のみ出力
      echo esc_html($this_categories[0]->cat_name);
    }
  }
}



/**
 * カスタムフィールドを使ってアクセス数を取得する（特定記事のアクセス数確認用）
 *
 * @param integer $id 投稿id.
 * @return void
 */

//アクセス数を取得　(引数が渡されなければ投稿IDを見るように設定)
function get_post_views($id = 0)
{
  global $post;
  if (0 === $id) {
    $id = $post->ID;
  }
  $count_key = 'view_counter';
  $count = get_post_meta($id, $count_key, true);

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '0');
  }
  return $count;
}



/**
 * アクセスカウンター (アクセス数の保存)
 * 
 * @return void
 */

function set_post_views()
{
  global $post;
  $count = 0;
  $count_key = 'view_counter';

  if ($post) {
    $id = $post->ID;
    $count = get_post_meta($id, $count_key, true);
  }

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '1');
  } elseif ($count > 0) {
    if (!is_user_logged_in()) { //管理者（自分）の閲覧を除外
      $count++;
      update_post_meta($id, $count_key, $count);
    }
  }
  //$countが0のままの場合（404や該当記事の検索結果が0件の場合）は何もしない。
}
add_action('template_redirect', 'set_post_views', 10);





/**
 * 検索結果から固定ページを除外する
 * @param string $search SQLのWHERE句の検索条件文
 * @param object $wp_query WP_Queryのオブジェクト
 * @return string $search 条件追加後の検索条件文
 * 
 *  ※add_filter() フィルターフックの登録
 */

function my_posts_search($search, $wp_query)
{
  //検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合
  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {
    // 検索結果を投稿タイプのみとする
    $search .= " AND post_type = 'post' ";
    return $search;
  }
  //それ以外は変更しない
  return $search;
}
add_filter('posts_search', 'my_posts_search', 10, 2);



/**
 * ボタンのショートコード(引数を変更して再利用可)
 *
 * @param array $atts ショートコードの引数.
 * @param string $content ショートコードのコンテンツ.
 * @return string ボタンのHTMLタグ.
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_shortcode
 */
function my_shortcode($atts, $content = '')
{
  return '<div class="entry-btn"><a class="btn" href="' . $atts['link'] . '">' . $content . '</a></div>';
}
add_shortcode('btn', 'my_shortcode');
