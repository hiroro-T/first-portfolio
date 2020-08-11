
<!-- index.htmlのファイル名は，サーバーにファイルをアップロードし公開する際の，
入り口，最初に開かれるページ，トップページとして扱われる． -->

<?php
	session_start();
	//
?>
<html lang="ja">
	<head>
		<title>Entrance</title>
		<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
		
		<style type="text/css">
			body{
				text-align: center;
				color: black;
			}
			.subject{
				margin: 40px auto;
				color: #0099ff;
				text-align: center;
			}
			.text{
				width: 80%;
				font-size: 1.4em;
				margin: auto;
				padding: 1.0em;
			}
			.intro{
				text-align: left;
				background-color: #7fffd4;
				border-radius: 1.5em;
			}
			.constitution{
				margin-top: 2.0em;
				margin-bottom: 1.0em;
			}
			#img{
				width: 70%;
			}
			.explain{
				font-size: 1.2em;
				text-align: left;
				width: 70%;
				margin: auto;
				padding: 1.0em;
				background-color: #b0c4de;
				border-radius: 1.0em;
			}
			.note{
				font-size: 1.4em;
				text-align: left;
				width: 80%;
				margin: 2.0em auto;
				padding: 0.3em 1.0em;
				border: solid #8b0000;
			}
			.text2{
				font-size: 1.5em;
				font-weight: bolder;
				/* text-decoration: underline double red; */
				margin-bottom: 0.8em;
			}
			.border{
				border: solid #ff4500;
			}
			.button{
				margin: auto;
				margin-top: 50px;
			}
			#next_button{
				width: 200px;
				height: 100px;
				border-radius: 1em;
				font-size: 2em;
				font-weight: bold;
				font-family: times;
				cursor: pointer;
			}

		</style>

	</head>

<body text="#999999" alink="#666666" vlink="#666666" link="#666666" topmargin="30">

    <p class="subject"><font face="メイリオ" size='10'>衣服の印象評価アンケート</font></p>
	

	<div class="text intro">
    	<span>
    	    ご参加いただきありがとうございます。<br>
			本アンケートは，衣服のコーディネーションに対する印象をイメージ語を用いて調査する目的で行っております。
    	    この調査により得られるデータは，中央大学のヒューマンメディア工学研究室における研究にて活用いたします。
    	    プライバシーの保護に即し，その他の目的での利用はいたしませんのでご安心ください。
    	    <br>アンケートにご協力いただいた皆様には，後日謝礼をお渡しいたします！！
    	</span>
	</div>


	<div class="constitution">
    	<p class="text">
        	＜＜アンケートの構成＞＞
    	</p>
		<img id="img" src="questionaire_flow.jpeg">
	</div>

	<div class="explain">
    	<div>
			<p style="font-weight: bold">［　流れ　］</p>
    	    基本情報入力後，アンケートが開始され，1つの画像に対して26個のイメージ語対で印象の評価を行っていただきます。
    	    合計で16枚の画像に対して同様の評価を行っていただきますが，中間（8枚目終了後）に休憩として意識調査アンケートが表示されます。
    	</div>
		<div>
			想定される所要時間は４０分ほどです。
		</div>
		<div>
			<p style="font-weight: bold">［　回答方法　］</p>
    		表示される画像に写っている衣服のコーディネーションを見て，回答欄のイメージ語対のうち，受けた印象に近い方へ当てはまり度合いを選択してください。
			左右それぞれに当てはまり度合いが３段回ずつあり、真ん中に評価が難しい時などの「どちらでもない」という項目がありますので、合計で７段階のうちからご回答ください。
		</div>
	</div>
    
	


	<div class="note">
    	<span class="border">
			<ul>
    	    	<h2 class="text2" style="text-decoration: underline double red">注意事項：</h2>
    	    	<li>ブラウザバック（戻るボタン）は利用しないでください。考えたり比較せず、直感的に印象をご回答ください。</li>
    			<li>途中で休憩をしていただいたり，時間をあけていただいても構いませんが，ブラウザが閉じてしまうことやリンク切れにはお気をつけ下さい。</li>
				<li>謝礼に関するご連絡をさせていただくため、メールアドレスの入力項目がございます。連絡のつきやすいアドレスを誤りの無いようご記入ください。</li>
				<li>アンケートの回答データに不備が見られたり、有効性に欠けると判断された場合、謝礼の対象とならない可能性がございますので、予めご了承ください。漏れなく、直感的なご回答をいただければ問題ございません。</li>
			</ul>	
			
    	</span>
		<!-- （メモ）divで二重のborderで内側を赤にしようと思ったけど、spanで面白い表示になったので採用した。 -->
	</div>
	
	<div class="button">
		<input type="button" id="next_button" value="START!" onclick="location.href='./next_index.php'">
		<!-- <a href="./next_index.php"> 開始！！</a> -->
	</div>
</body>
</html>