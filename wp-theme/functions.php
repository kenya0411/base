<?php

// global $wp_rewrite;
// $wp_rewrite->flush_rules();
//wp_headで出力されるtitleタグを削除
remove_action('wp_head', '_wp_render_title_tag', 1);
remove_action('wp_head', 'wp_generator'); //WPバージョン表記停止
remove_action('wp_head', 'feed_links', 2); //記事フィードリンク停止
remove_action('wp_head', 'feed_links_extra', 3); //カテゴリ・コメントフィードリンク停止
remove_action('wp_head', 'rsd_link'); //ブログ編集ツール連携停止
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Write連携停止
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); //prev/nextリンク停止
remove_action('wp_head', 'wp_shortlink_wp_head'); //短縮URL表記停止

/**
*wp_head  remove_action
*/
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');

remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
//nextpage,prevpage
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//canonicalのmetaタグ
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
/*jquerydelete*/
function delete_wphead_jquery() {
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'delete_wphead_jquery' );
/*title delete*/
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
/*css delete*/
remove_action( 'wp_head', 'wp_print_styles',8);
remove_action( 'wp_head', 'wp_print_head_scripts',9);





/*--------------------------------------------------- */
/* wp_footerの邪魔なCSSを削除
/*--------------------------------------------------- */
function dequeue_plugins_style() {
    //プラグインIDを指定し解除する
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('child-style');
    wp_dequeue_style('twentynineteen-style');
    wp_dequeue_style('parent-style');
    wp_dequeue_style('twentynineteen-print-style');



}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);








/* -------------------------------------------------- */
/* カスタム投稿
/*--------------------------------------------------- */

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'privacy', array( // 投稿タイプ名の定義
        'labels' => array(
            'name'          => 'プライバシーポリシー', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'privacy',    // カスタム投稿の識別名
        ),
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => false,  // 5系から出てきた新エディタ「Gutenberg」を有効にする

    ));

}

add_action( 'init', 'create_post_type2' );
function create_post_type2() {
    register_post_type( 'news', array( // 投稿タイプ名の定義
        'labels' => array(
            'name'          => 'ニュース&トピックス', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'news',    // カスタム投稿の識別名
        ),
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => false,  // 5系から出てきた新エディタ「Gutenberg」を有効にする

    ));

}
add_action( 'init', 'create_post_type3' );
function create_post_type3() {
    register_post_type( 'product', array( // 投稿タイプ名の定義
        'labels' => array(
            'name'          => '取扱製品', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'product',    // カスタム投稿の識別名
        ),
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => false,  // 5系から出てきた新エディタ「Gutenberg」を有効にする

    ));

}

add_action( 'init', 'create_post_type4' );
function create_post_type4() {
    register_post_type( 'catalog', array( // 投稿タイプ名の定義
        'labels' => array(
            'name'          => 'カタログページ', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'catalog',    // カスタム投稿の識別名
        ),
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => false,  // 5系から出てきた新エディタ「Gutenberg」を有効にする

    ));

}

//カスタム投稿の追加と、カテゴリー、タグ機能の追加
function my_custom_init() {


    //カテゴリタイプの設定（カスタムタクソノミーの設定）
  register_taxonomy(
        'productcat', //カテゴリー名（任意）
        'product', //カスタム投稿名
        array(
          'hierarchical' => true, //カテゴリータイプの指定
          'update_count_callback' => '_update_post_term_count',
          //ダッシュボードに表示させる名前
          'label' => '取扱製品のカテゴリ―', 
          'public' => true,
          'show_ui' => true
      )
    );    

}
add_action( 'init', 'my_custom_init' );

function my_custom_init2() {


    //カテゴリタイプの設定（カスタムタクソノミーの設定）
  register_taxonomy(
        'catalogcat', //カテゴリー名（任意）
        'catalog', //カスタム投稿名
        array(
          'hierarchical' => true, //カテゴリータイプの指定
          'update_count_callback' => '_update_post_term_count',
          //ダッシュボードに表示させる名前
          'label' => 'カタログのカテゴリ―', 
          'public' => true,
          'show_ui' => true
      )
    );    

}
add_action( 'init', 'my_custom_init2' );

/*--------------------------------------------------- */
/* 表示数を変更
/*--------------------------------------------------- */

function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( $query->is_post_type_archive( 'news' )  ) { //表示させる投稿ページの種類
        $query->set( 'posts_per_page', '10' ); //最大投稿表示数を１５件に変更
    }

}
add_action( 'pre_get_posts', 'change_posts_per_page' );



/* -------------------------------------------------- */
/* 管理画面のカスタマイズ
/*--------------------------------------------------- */


//管理者以外の場合
$user = wp_get_current_user();
  if( $user-> get('user_login') !== 'solutio') { //管理者ID 


    /** * 管理画面にCSSを追加します。*/
    function load_custom_wp_admin_style() {
    // 'custom' はCSSにつける名前、
    // get_stylesheet_directory_uri() . '/admin.css' はCSSファイルの場所です。
    // ( get_stylesheet_directory_uri() はテンプレートのディレクトリのURL )
        wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/admin.css' );
    }
    add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
function my_admin_script(){
    wp_enqueue_script( 'my_admin_script', get_stylesheet_directory_uri().'/js/admin.js' );
     
}
add_action( 'admin_enqueue_scripts', 'my_admin_script' );

//フッターの項目
    function custom_admin_footer() {
        echo 'お問い合わせは<a href="mailto:support@solution-gr.com">support@solution-gr.com</a>まで。';
    }
    add_filter('admin_footer_text', 'custom_admin_footer');

    /* -------------------------------------------------- */
/* 管理者バーの項目非表示
/*--------------------------------------------------- */

function remove_admin_bar_menus( $wp_admin_bar ) {

    $wp_admin_bar->remove_menu( 'wp-logo' );      // ロゴ
    // $wp_admin_bar->remove_menu( 'site-name' );    // サイト名
    $wp_admin_bar->remove_menu( 'view-site' );    // サイト名 -> サイトを表示
    $wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
    $wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
    $wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
    $wp_admin_bar->remove_menu( 'comments' );     // コメント
    $wp_admin_bar->remove_menu( 'updates' );      // 更新
    $wp_admin_bar->remove_menu( 'view' );         // 投稿を表示
    $wp_admin_bar->remove_menu( 'new-content' );  // 新規
    $wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
    $wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
    $wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
    $wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
    $wp_admin_bar->remove_menu( 'new-user' );     // 新規 -> ユーザー
    // $wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
    $wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
    $wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
    // $wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
    $wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)

}
add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 100 );
    add_filter( 'show_admin_bar', '__return_false' );//管理バー


//右上の表示オプションを非表示
    function hide_help_and_options(){

        echo '<style type="text/css">'.
        '#contextual-help-link-wrap,'.
        '#screen-options-link-wrap'.
        '{display:none;}</style>'.PHP_EOL;

    }
    add_action( 'admin_head', 'hide_help_and_options' );

    /* -------------------------------------------------- */
/* 投稿画面の不要な項目を削除
/*--------------------------------------------------- */
function my_remove_meta_boxes() {

    // remove_meta_box( 'postexcerpt', 'post', 'normal' );         // 抜粋
    remove_meta_box( 'trackbacksdiv', 'post', 'normal' );       // トラックバック
    remove_meta_box( 'slugdiv', 'post', 'normal' );             // スラッグ
    remove_meta_box( 'postcustom', 'post', 'normal' );          // カスタムフィールド
    remove_meta_box( 'commentsdiv', 'post', 'normal' );         // コメント
    remove_meta_box( 'postimagediv', 'post', 'normal' );        // アイキャッチ画像
    remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );    // タグ
    remove_meta_box( 'commentstatusdiv', 'post', 'normal' );    // ディスカッション
    remove_meta_box( 'authordiv', 'post', 'normal' );           // 作成者
    remove_meta_box( 'revisionsdiv', 'post', 'normal' );        // リビジョン
    remove_meta_box( 'formatdiv', 'post', 'normal' );           // フォーマット
    remove_meta_box( 'pageparentdiv', 'post', 'normal' );       // 属性

}
add_action( 'admin_menu', 'my_remove_meta_boxes' );


function remove_menus () {
    global $menu;
    // unset($menu[2]);  // ダッシュボード
    unset($menu[4]);  // メニューの線1
    unset($menu[5]);  // 投稿
    // unset($menu[10]); // メディア
    unset($menu[15]); // リンク
    unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    unset($menu[59]); // メニューの線2
    unset($menu[60]); // テーマ
    unset($menu[65]); // プラグイン
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール
    unset($menu[80]); // 設定
    unset($menu[90]); // メニューの線3
    add_filter( 'pre_site_transient_update_core', '__return_zero' );//wordpressの通知
    remove_action( 'welcome_panel', 'wp_welcome_panel' ); //ようこそ画面

}
add_action('admin_menu', 'remove_menus');




/* -------------------------------------------------- */
/* ダッシュボードの非表示
/*--------------------------------------------------- */
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
     // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);   // 現在の状況（概要）
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);   // クイック投稿
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);   // 最近の下書き
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
     unset($wp_meta_boxes['dashboard']['side']['core']['activity_widget']); // WordPressフォーラム

 }
 add_action('wp_dashboard_setup','remove_dashboard_widgets');



 /* -------------------------------------------------- */
/* 管理画面にスタイル追加
/*--------------------------------------------------- */
function custom_admin_style() {
    ?><style>
        span#wp-version { 
            display:none;/*wordpressのテーマ表示を非表示*/
        }


        #footer-upgrade{
            display: none/*Wordpressのバージョン非表示*/
        }
        .menu-icon-dashboard+.wp-submenu li:nth-last-of-type(1){

            display: none
        }

        #wp-admin-bar-my-sites{
            display: none
        }

    }

    </style><?php
}
add_action( 'admin_head', 'custom_admin_style' );


//if関数
}




//ログイン画面のロゴを変更
function custom_login_logo() {
 echo '<style type="text/css">h1 a { background: url('.get_bloginfo('stylesheet_directory').'/img/key.png) 30% 60% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

//ロゴのリンク先とリンクタイトルを変更する
function login_logo_url() {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'login_logo_url');

//ロゴのtitle属性を変更する場合に追加

function login_logo_title(){
    return get_bloginfo('name');
}
add_filter('login_headertitle','login_logo_title');


//「パスワードをお忘れですか ?」と「← ○○○ へ戻る」を非表示にする

function login_nav_backtoblog_hide() { ?>
    <style>
        .login #nav,
        .login #backtoblog {
            display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_nav_backtoblog_hide' );


/*--------------------------------------------------- */
/* カスタム投稿をダッシュボードに表示させる
/*--------------------------------------------------- */
add_action( 'dashboard_glance_items', 'add_custom_post_dashboard_widget' );
function add_custom_post_dashboard_widget() {
  $args = array(
    'public' => true,
    '_builtin' => false
);
  $output = 'object';
  $operator = 'and';

  $post_types = get_post_types( $args, $output, $operator );
  foreach ( $post_types as $post_type ) {
    $num_posts = wp_count_posts( $post_type->name );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
    if ( current_user_can( 'edit_posts' ) ) {
      $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '&nbsp;' . $text . '</a>';
  }
  echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
}
}



/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    // $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
    // $paged = 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
    if(empty($paged)) $paged = 1;

    $range = 2;

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = '<i class="fas fa-angle-double-left"></i>';
    $text_next    = '<i class="fas fa-angle-double-right"></i>';
    $text_last    = "最後へ »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        // echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            // echo '<div class="pages"><a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a></div>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            // echo '<div class="pages"><a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a></div>';
            echo '<div class="pages"><a href="', get_pagenum_link( 1 ) ,'" class="prev">', $text_before ,'</a></div>';
            
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<div class="pages currents"><span class="current pager">', $i ,'</span></div>';
                } else {
                    echo '<div class="pages"><a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a></div>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            // echo '<div class="pages"><a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a></div>';
            echo '<div class="pages"><a href="', get_pagenum_link( $pages ) ,'" class="next">', $text_next ,'</a></div>';
            
        }
        if ( $paged + $range < $pages ) {
            // // 「最後へ」 の表示
            // echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}


add_action( 'iconImage', 'iconImage' );
function iconImage() {
    global $iconName;
    $terms = get_the_terms($post->ID, 'productcat');
    
    $iconName = $terms[0]->slug;
    if (preg_match("/automatic[0-9]/", $iconName)) {
        $iconName = 'automatic';
    }elseif(preg_match("/molding[0-9]/", $iconName)){
        $iconName = 'molding';
    }elseif(preg_match("/material[0-9]/", $iconName)){
        $iconName = 'material';
    }else{
    }


    global $termIcon;
    $termIcon = array(
        'automatic' => '/img/product-archive/noimg1.png',
        'molding' => '/img/product-archive/noimg2.png',
        'material' => '/img/product-archive/noimg3.png',

    );
}

/*
* スラッグ名が日本語だったら自動的に投稿タイプ＋id付与へ変更（スラッグを設定した場合は適用しない）
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

//改行用
function hbr($str)
{
    echo nl2br(h($str));
}

?>