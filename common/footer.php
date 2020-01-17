
<footer>
<?php
$url = $_SERVER["REQUEST_URI"];
if (strstr($url , "contact")==false) {?>
	<div id="inquiry" class="maxWid mbPad">
		<div class="outer">
			<h2>
				<img src="/common/img/foot-contact.png" alt="葬儀のご依頼・ご相談・お見積りはコチラ">
			</h2>	
			<div class="pcInvi">
				<h2>
					葬儀のご依頼・ご相談・お見積りはコチラから
				</h2>

				<div class="flexChild">
					<div class="flexChild2">
						<div class="every">
							24時間365日対応
						</div>
					</div>
					<div class="flexChild2">
						<a href="tel:0557-95-3700"><img src="/common/img/foot-tel3.png" alt="葬儀のご依頼・ご相談・お見積りはコチラ"></a>
					</div>
				</div>


			</div>
			<div class="wrapper">
				<div class="hoverImg inqLeft">
					<a href="/contact">
						<img src="/common/img/foot-tel.png" alt="お急ぎの方はコチラ">
						<img src="/common/img/foot-tel-2.png" alt="お急ぎの方はコチラ" class="hover">

					</a>
				</div>
				<div class="hoverImg inqRight">
					<a href="/contact">
						<img src="/common/img/foot-mail.png" alt="メールでお問合せ">
						<img src="/common/img/foot-mail-2.png" alt="メールでお問合せ" class="hover">


					</a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

	<div id="foot">
		<div class="maxWid mbPad">
			<div class="flex">
				<div class="flex2">
					<h2><img src="/common/img/footlogo.png" alt="真心と信頼の伊豆葬祭"></h2>
					<address>
						<p>
							静岡県賀茂郡東伊豆町稲取3021-13
						</p>
						<div class="tel">
						<img src="/common/img/foot-tel2.png" alt="0557-95-3700">
						</div>
					</address>

				</div>
				<div class="flex2 flexChild">
					<div class="flexChild2">
						<ul>
							<li><a href="/">＞TOP</a></li>
							<li><a href="/price">＞費用のご案内</a></li>
							<li><a href="/flow">＞お葬式の流れ</a></li>
							<li><a href="/hall">＞式場のご案内</a></li>
							<li><a href="/company">＞会社案内</a></li>
							<li><a href="/contact">＞お問い合わせ</a></li>
						</ul>

					</div>
					<div class="flexChild2">
						<p class="copyright">
							(C)2019 Izusousai Inc.
						</p>
					</div>


				</div>
			</div>

		</div>

	</div>
</footer>




<div id="footGoto">
	<div>  <a href="#"><span>PAGE TOP</span></a></div>

</div>

<!--object-sit（IE対策）-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.3/ofi.js"></script>
<script>objectFitImages();</script>
</body>

</html>
