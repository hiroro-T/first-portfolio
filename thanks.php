<?php
	session_start();
	//
?>
<html lang="ja">
<head>
	<title>アンケート終了ページ</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
	
	<style type="text/css">
		body{
			color: black;
		}	
		.comment{
			background: rgba(255,215,0,0.7);
			width: 80%;
			margin: 2.0em;
			padding: 1.0em;
			border-radius: 1.0em;
		}
		.form{
			width:85%;
			font-size: 1.7em;
			text-align: left;
		}
		.list{
			background: rgba(189,183,107,0.8);
			padding: 0.8em 2.5em;
			border: double;
		}
		li{
			font-size: 1.3em;
			font-weight: bold;
		}
		.button{
			font-size: 1.0em;
			font-weight: bold;
			cursor: pointer;
		}
		#textbox{
			width: 60%;
			height: 3.0em;
			font-size: 80%;
		}
		.note{
			width: 60%;
			height: 5.0em;
			margin: 2.0em auto; 
		}
		#submit_button{
			margin-bottom: 20px;
		}
	</style>

</head>

<body text="#999999" alink="#666666" vlink="#666666" link="#666666">
<font face="メイリオ" size='2'>
<body>
<div height="100"><br>
</div>

<div align="center">
<!-- ここで中央よせを指定 -->

<!-- ▼テーブルここから -->
<TABLE width="650" border="0" cellpadding="0" cellspacing="0">
 <table border=0 width='300'>

<div class="comment">
	<font size='6'>これで全て終了です。</font><br><br>
	<font size='8'>ご協力ありがとうございました。</font><br>
</div>

<div class="form">
	<form method="POST" action="thanks_end.php">

		<div>最後にメールアドレスの確認をお願いします！！</div>
		<div>謝礼に関するご連絡等をいたしますので、お間違えの無いように気をつけください。</div>
		<div>問題がなければこれで終了ですので、タブを閉じていただいて大丈夫です。</di>
		<div>修正を行う場合は「修正する」ボタンをクリックして修正した後、「送信して終了」をクリックしてください。</div>
		
		<?php
			$mail_add = $_SESSION[mail_add]; 
			$u_num = $_SESSION[u_num]; 
		?>
		
		<ul class="list">
			今後のスムーズなやりとりのため、この画面の撮影など、回答者番号を控えていただくことをお勧めします。
			<li><?php echo "回答者番号：".$u_num; ?></li>
			<li><?php echo "メールアドレス：".$mail_add; ?></li>
			<input type="button" class="button" id="correct" value="修正する">
			<input type="text" id="textbox" name="new_mail_add" value=<?=$mail_add?> >
			<input type="radio" id="if_correct" name="if_cor" value="YES!!">
		</ul>

		<!-- ----------------------▼メアド修正項目とボタン---------------------- -->
		<script type="text/javascript">
			// document.write("ここからJS");
			var temp = document.getElementById("textbox");
			// document.write(temp.style);
			// document.write(temp.value);
			temp.style.display = "none";

			var correct = document.getElementById("correct");
			correct.addEventListener("click", function(){
				if(temp.style.display=="none"){
					temp.style.display = "block";
					correct.value = "修正しない";
				}
				else{
					temp.style.display = "none";
					correct.value = "修正する";
				}
			});
		</script>
		<!-- ----------------------▲メアド修正項目とボタン---------------------- -->		
	
		


		<div class="">
			<div>[ 備考 ]</div>
			<div>その他、ご意見や問合せ、不具合等がございましたらこちらにご記入ください。</div>
			<textarea class="note" name="note"></textarea>
		</div>

		<input type="submit" class="button" id="submit_button" value="送信して終了" onclick="window.close();">
		<!-- window.close()はセキュリティ上、ほとんどのブラウザで制限されている。 -->
		
		
		<!-- ----------------------▼メアド修正を検知する仕組みを見えないラジオボタンで！！！クリック時だと反映されるかわからないから、カーソルを合わせた時にイベントリスナーを設定！---------------------- -->		
		<script>
			var mail_add = "<?=$mail_add?>";
			var textbox = document.getElementById("textbox");
			var if_correct = document.getElementById("if_correct");
			if_correct.style.display = "none";
			document.getElementById("submit_button").addEventListener("mousemove", function(){
				// alert();
				if(textbox.value == mail_add){
					if_correct.checked = false;
				}
				else{
					if_correct.checked = true;
				}
				// alert(if_correct.checked);
			});
		</script>
		<!-- ----------------------▲メアド修正項目とボタン---------------------- -->		

	</form>
	

</div>

</TABLE>

<!-- ▲テーブルここまで -->
</div>
</center>
</FONT> 
</body>
</html>