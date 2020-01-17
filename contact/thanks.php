<?php
$name=$_POST["name"];
$furi = $_POST["furi"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$method = $_POST["method"];
$mail = $_POST["mail"];
$msg1=$_POST["msg1"];
$vsspam=$_POST["vsspam"];
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
	<link type="text/css" rel="stylesheet" href="/common/js/validation/validationEngine.jquery.css" />
	<script src="/common/js/jquery.js"></script>
</head>



<body>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/common/nav.php"); ?>
	<main>
		<section id="mainimg">
			<h2><img src="img/heading.png" alt="お問い合わせ"></h2>
			<img src="img/mainimg.jpg" alt="お問い合わせ" class="backimg">

		</section>


		<section id="thanks" class="maxWid mbPad">
			<?php
//spam対策
			if($vsspam != "r3zpycpkhf"){

				exit("恐れ入りますが、ブラウザの設定（ツール＞オプション）で「JavaScriptをオン」にしてから再度お問合せ下さい。");

			}else{

//メール送信
				if($name !=NULL && $mail !=NULL){

					require_once("mail_to.php");


				}else{
					exit("error");
				}

			}
			?>




			<img src="img/thanks.gif" alt="この度はお問い合わせいただき、ありがとうございます。" class="imgs" />
			<div class="text">
				<p>お送りいただきました内容を確認の上、後ほどご連絡を差し上げます。ご入力いただきましたアドレスへ、自動返信メールをお送りいたしましたので、ご確認いただきますよう、よろしくお願い致します。<br>
				30分以上経過しても自動返信メールが届かない場合は、お手数ですが、 再度お問い合わせいただきますよう
				お願い致します。</p>
			</div>

			<div class="btn"><input type="button" value="トップページへ戻る" class="inputButt" onclick="location.href='/';" style="cursor: pointer;" ></div>
		</section>
	</main>

</main>
<?php require_once("../common/footer.php"); ?>

</body>
</html>