# Wordpressカスタマイズの習得ステップ
* 書籍Wordpressの教科書2をもとに最短でWordpressカスタマイズの基本習得のログ。
* PHPをある程度出来てWordpressはほとんど触ったことのない人が1日で出来る量を想定しています。

## Wordpress環境をローカルに構築


## Wordpressの情報の探しかた
* 公式リファレンス

[WordPress › 日本語](https://ja.wordpress.org/ "WordPress › 日本語")

[WordPress Codex 日本語版](http://wpdocs.osdn.jp/Main_Page "WordPress Codex 日本語版")

* フックの検索

[WordPress hooks database - action and filter hooks for wp plugin developers -- Adam Brown, BYU Political Science](http://adambrown.info/p/wp_hooks "WordPress hooks database")

## テーマ作成時に知っておく基本情報
テーマへのファイルパスを指定するテンプレートタグ
```
bloginfo('templete_url');
bloginfo('stylesheet_url');

```

__bloginfo()パラメータ__
```
* admin_email          = 'admin@example.com'
* atom_url             = 'http://www.example.com/home/feed/atom'
* charset              = 'UTF-8'
* comments_atom_url    = 'http://www.example.com/home/comments/feed/atom'
* comments_rss2_url    = 'http://www.example.com/home/comments/feed'
* description          = 'Just another WordPress blog'
* home                 = 'http://www.example.com/home' (DEPRECATED! use url option instead)
* html_type            = 'text/html'
* language             = 'en-US'
* name                 = 'Testpilot'
* pingback_url         = 'http://www.example.com/home/wp/xmlrpc.php'
* rdf_url              = 'http://www.example.com/home/feed/rdf'
* rss2_url             = 'http://www.example.com/home/feed'
* rss_url              = 'http://www.example.com/home/feed/rss'
* siteurl              = 'http://www.example.com/home (DEPRECATED! use url option instead)'
* stylesheet_directory = 'http://www.example.com/home/wp/wp-content/themes/largo'
* stylesheet_url       = 'http://www.example.com/home/wp/wp-content/themes/largo/style.css'
* template_directory   = 'http://www.example.com/home/wp/wp-content/themes/largo'
* template_url         = 'http://www.example.com/home/wp/wp-content/themes/largo'
* text_direction       = 'ltr'
* url                  = 'http://www.example.com/home'
* version              = '3.5'
* wpurl                = 'http://www.example.com/home/wp'
```

各サイトパーツに分割し出力するテンプレートタグ
```
get_header();
get_sidebar();
get_footer();
```


## Wordpressで最初に行う基本設定
投稿数の表示設定
パーマリンクの設定


## WEBサイトとしての基本パーツを作成（固定ページ、ナビゲーション、サイトマップなど）
投稿記事の取得を行うWordpressループ
```
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        ~ ここに固定ページ出力テンプレートを記述 ~
<?php endwhile();endif; ?>

have_hosts();
the_post();
the_title();
the_content();
```

テンプレートファイルの呼び出しを行うタグ
```
// page.phpにてget_templete_part('page_hoge');と記述しpage_hoge.phpファイルに分割して管理、利用することが出来る。
get_templete_part();
```

固定ページIDを含んだクラス属性の出力
```
body_class();
```

条件分岐タグ、トップページならtrue
```
is_front_page();
```

ナビゲーションメニューの定義
```
// 引数の連想配列でメニューの種類を定義,function.phpに記述することで利用できる
// 内容は管理画面から設定されるので、function.phpではメニューの位置の種類を定義するのがメイン
// ここで定義したメニューの実際の内容は管理画面 > 外観 > メニューで登録
register_nav_menus();

// ナビゲーションを呼び出し。引数に'theme_location'=>'hoge'と指定することでナビゲーションの種類を指定できる
wp_nav_menu();
```

wp_nav_menu()のパラメータ
```
* theme_location register_nav_menusで定義したナビゲーションロケーション名
* container      ナビゲーションを囲む要素の指定
* container_id   上記要素のID属性
* depth          表示する階層上弦の指定
```

## フィルターフックの実装
先ほどのwp_nav_menuにフィルターフックを実装します。

add_filter()のパラメータ
```
* tag フックポイントの指定
* function_to_add 登録する関数名
* priority 優先順位(デフォルトは10)
* accepted_args 登録した関数の受け取るパラメータの数
```

__フックポイントに登録した関数の受け取れる引数を確認するには__

フックポイントが定義されているソースのapply_filtersを確認する。
```
## ex)nav_menu_css_classの場合
## 該当箇所wp-includes/nav-menu-templete.php line98
$class_names = join('', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

## この場合、受け取ることの出来るパラメータは最大4つとなる
## array_filter($classed),$item,$args,$depth
## それぞれなにが受け取れるのかはnav-menu-templete.php内のソースを確認する。
```

グローバルナビにフィルターを追加してメニューに各ページのスラッグ名を追加したClass属性をついかする。
add_filterで追加したフィルターをremove_fileterで外しているのは他のナビメニューに影響を与えないため。

```php
/*
 * function.php
 */
function add_slug_nav( $css, $item ) {
   if ($item->object == 'page') {
       $page = get_post($item->object_id);
       $css[] = 'menu-item-slug-' . esc_attr($page->post_name);
   }
   return $css;
}

/*
 * header.php
 */
<?php add_filter( 'nav_menu_css_class', 'add_slug_nav', 10, 2); ?>
<?php wp_nav_menu(array(
         'container' => false,                           // remove nav container
         'theme_location' => 'main-nav',                 // where it's located in the theme
)); ?>
<?php remove_filter( 'nav_menu_css_class', 'add_slug_nav'); ?>

```

## ショートコードについて

## カスタム投稿タイプの使い方


## その他


## スマートフォン対応


## ブログコンテンツの実装


## パフォーマンス最適化とセキュリティ



