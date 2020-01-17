
<!DOCTYPE html>
<html lang="jp">
<head>
<title></title>
	<meta name="description" content="" />
	<meta name="Keywords" content="" />
	<?php require_once("/common/header.php"); ?>
	<link rel="stylesheet" href="/common/css/top.css">
</head>
<body>
	<?php require_once("/common/nav.php"); ?>
	<main>
		<section id="mainimg">
			<div class="mbPad">
				<h2><img src="img/heading.png" alt="最後の「ありがとう」を伝えるお葬式。"></h2>
				
			</div>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/img/mainimg1.jpg" alt="有限会社 伊豆葬祭"></div>
					<div class="swiper-slide"><img src="/img/mainimg2.jpg" alt="会社の外観"></div>
					<div class="swiper-slide"><img src="/img/mainimg3.jpg" alt="葬儀場"></div>
				</div>
			</div>

		</section>
		<!-- .mainimgここまで -->

		<section id="primary">
			<div class="outer">
				<div class="maxWidth mbPad">
					<h2>感謝の気持ちを込めて、<br class="none">温かい想いでお見送り致します。</h2>
					<p>
						故人様への今までの感謝の想いをカタチにするお葬式。この東伊豆の地で、ご家族や参列者の方々に故人様をゆっくりと思い出していただき、最後の「ありがとう」をお伝え致します。伊豆葬祭では、小規模の家族葬から大人数の大型葬まで多くの方が利用できる式場をご用意しております。私たちは、残されたご家族の想いが届くよう、最後まで心を込めてお手伝いいたします。
					</p>
				</div>
			</div>
		</section>
		<!-- .primaryここまで -->
		<section id="secondary">
			<ul class="maxWid mbPad">
				<li>
					<a href="/hall">
						<figure>
							<img src="img/img1.jpg" alt="式場のご案内"/>
							<i class="ion-ios-arrow-forward"></i>
							<h3>式場のご案内</h3>
						</figure>
					</a>
				</li>
				<li>
					<a href="/flow">
						<figure>
							<img src="img/img2.jpg" alt="お葬式の流れ"/>
							<i class="ion-ios-arrow-forward"></i>
							<h3>お葬式の流れ</h3>
						</figure>
					</a>


				</li>
				<li>
					<a href="/price">
						<figure>
							<img src="img/img3.jpg" alt="費用のご案内"/>
							<i class="ion-ios-arrow-forward"></i>
							<h3>費用のご案内</h3>
						</figure>
					</a>

				</li>
			</ul>
		</section>
		<!-- secondaryここまで -->



		</main>
		<script src="common/js/utility/swiper.min.js"></script>
		<script>
			var swiper = new Swiper('.swiper-container', {

				loop: true,
				speed: 1000,
				effect: 'fade',
				autoplay: {
					delay: 4000,
					disableOnInteraction: true

				}

			});

		</script>
		<?php require_once("common/footer.php"); ?>