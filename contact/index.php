<?php
//inputのコード 
function h($class,$name) {
	//必須時
	if($class == 'require'){
		echo '<input value="" class="validate[required] text-input" type="text" data-prompt-position="topLeft:0" name="'.$name.'">';}
	//電話番号
	else if($class == 'phone'){
		echo '<input value="" class="validate[required,custom[phone] text-input" type="tel" data-prompt-position="topLeft:0" name="'.$name.'" checked />';}
	//メールアドレス
	else if($class == 'mail'){
		echo '<input value="" class="validate[required,custom[email] text-input"  type="email" data-prompt-position="topLeft:0" name="'.$name.'" checked />';}
	//その他（input以外）
	else{
		echo 'class="validate[required] text-input" type="text" data-prompt-position="topLeft:0" name="'.$name.'"';
	}
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>お問い合わせ | 有限会社 伊豆葬祭</title>
	<meta name="description" content="" />
	<meta name="Keywords" content="" />
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/common/header.php"); ?>
	<link rel="stylesheet" href="/common/css/subpage.css">
	<link rel="stylesheet" href="page.css">
	<!-- コンタクトフォーム用 -->
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<link type="text/css" rel="stylesheet" href="/common/js/validation/validationEngine.jquery.css" />
	<script type="text/javascript" src="/common/js/validation/jquery.validationEngine.js" charset="utf-8"></script>
	<script type="text/javascript" src="/common/js/validation/jquery.validationEngine-ja.js" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery("#mail_form").validationEngine();
		});
	</script>

</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/common/nav.php"); ?>
	<main>
		<section id="mainimg">
			<h2><img src="img/heading.png" alt="お問い合わせ"></h2>
			<img src="img/mainimg.jpg" alt="お問い合わせ" class="backimg">

		</section>
		<section id="contact" class="maxWid mbPad">
			<div class="banner tel">
				<img src="img/banner.png" alt="0557-95-3700">
			</div>
			<h3><img src="img/heading_contact.png" alt="お問い合わせフォーム"></h3>
			<p>
				以下のフォームに必要事項をご入力いただき、送信してください。<br class="mbInvi2">
				なお、お急ぎの方は上記連絡先へお電話にてお願いいたします。<br>
				※下記フォームにてお問い合わせ頂いた場合、返信に数日要する場合がございます。
			</p>
			<form id="mail_form" action="thanks.php" method="post">
				<input type="hidden" name="vsspam" value="" id="vsspam" />


				<div class="flex">
					<div class="flex1 required">
						お名前
					</div>
					<div class="flex2">
						<?php echo h('require','name') ?>
					</div>
					<div class="flex1 required">
						フリガナ
					</div>
					<div class="flex2">
						<?php echo h('require','furi') ?> 
					</div>
					<div class="flex1 required">
						住所
					</div>
					<div class="flex2">
						<?php echo h('require','address') ?>
					</div>
					<div class="flex1 required padding">
						電話番号
					</div>
					<div class="flex2">
						<?php echo h('phone','phone') ?>
						<div class="red">※市外局番からご記入ください</div>
					</div>
					<div class="flex1 required" >
						メールアドレス
					</div>
					<div class="flex2">
						<?php echo h('mail','mail') ?> 
					</div>
					<div class="flex1 required">
						ご希望の連絡方法
					</div>
					<div class="flex2">
						<label><input type="radio" name="method" value="メール" checked > メール</label> <br>
						<label><input type="radio" name="method" value="電話" > 電話</label>

					</div>
					<div class="flex1 required padding">
						お問い合わせ内容
					</div>
					<div class="flex2">
						
						<textarea id="msg1" rows="14" <?php echo h('','msg1') ?>></textarea>
					</div></div>



					<div class="btn"><input type="submit" value="送信" id="submit_button" ></div>
				</form>


			</section>
			<!-- section.contactここまで -->
		</main>
		<script type="text/javascript">$(function(){ /*スパム対策*/
			$("#vsspam").val("r3zpycpkhf");
		});</script>

		<script>
			//レスポンシブ時に画像切り替え
			$(window).on('load resize',function(){
				if (window.matchMedia( "(max-width: 480px)" ).matches) {
					$('.banner').find('img').prop('src','img/banner_mb.png')
				} else {
					$('.banner').find('img').prop('src','img/banner.png')
				}
			});

		</script>
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/common/footer.php"); ?>