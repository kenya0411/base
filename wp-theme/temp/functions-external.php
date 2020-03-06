<?php 
//下記のフックをheadに読み込む
//do_action('externalFileHead')
//cssを追加

//--------------------------------------------------- 
// externalFileHead
//--------------------------------------------------- 


//共有CSSを追加
function addHeaderCommonCss() {
	$path = '/css/common';
	$cache = '?'.date('Ymd-His');

	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().$path.'/ress.css'.$cache.'">';
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().$path.'/base.css'.$cache.'">';
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().$path.'/header.css'.$cache.'">';
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().$path.'/footer.css'.$cache.'">';
}
add_action( 'externalFileHead', 'addHeaderCommonCss');


//CSS
function addHeaderIfCss() {
	$path = '/css/';
	$cache = '?'.date('Ymd-His');


	if(is_post_type_archive('submit')){
		$css = 'archive-submit.css';
	}elseif(is_singular('submit')){
		$css = 'single-submit.css';
	}
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().$path.$css.$cache.'">';
}
add_action( 'externalFileHead', 'addHeaderIfCss' );


//外部ファイルを追加


function addHeaderCommonFile() {
	$path = '/js';

	echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">';
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
	echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().$path.'/common.js"></script>';
	echo '<script type="text/javascript" src="//cdn.jsdelivr.net/npm/css-browser-selector@0.6.5/css_browser_selector.min.js"></script>';
}
add_action( 'externalFileHead', 'addHeaderCommonFile');
add_action( 'admin_enqueue_scripts', 'addHeaderCommonFile');


?>