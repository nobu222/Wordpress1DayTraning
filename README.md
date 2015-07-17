# Wordpressカスタマイズの習得ステップ
* 書籍Wordpressの教科書2をもとに最短でWordpressカスタマイズの基本習得のログ。
* PHPをある程度出来てWordpressはほとんど触ったことのない人が1日で出来る量を想定しています。

## Wordpress環境をローカルに構築



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
have_hosts();
the_post();
the_title();
the_content();
```

テンプレートファイルの呼び出しを行うタグ
```
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
register_nav_menus();

// ナビゲーションを呼び出し。引数に'theme_location'=>'hoge'としていすることでナビゲーションの種類を指定できる
wp_nav_menu();
```


## カスタム投稿タイプの使い方


## その他


## スマートフォン対応


## ブログコンテンツの実装


## パフォーマンス最適化とセキュリティ



