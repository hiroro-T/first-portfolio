
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
				background:url('key.png') fixed;
 				background-position:left top;
				background-repeat:no-repeat;
				background-size: 20%;
				color: black;
			}
			.subject{
				/* margin: auto; */
				color: #0099ff;
				text-align: center;
			}
			.form{
				width: 100%;
				padding: auto;
				text-align: center;
				font-size: 1.5em;
			}
			table{
				margin: auto;
				font-size: 100%;
			}
			input[type="text"]{
				height: 30px;
				font-size: 70%;
			}
			select{
				width: 100px;
				height: 50px;
				font-size: 60%;
			}
			.info_title{
				/* text-align: left; */
				text-decoration:underline;
				color: black;
				font-family: serif;
				font-weight: 500;
				margin-bottom: 0.5%;
			}
			.comment{
				margin: 5px;
				font-size: 70%;
			}
			.submit_button{
				margin: auto;
				margin-top: 80px;
			}
			.submit_button input{
				width: 120px;
				height: 50px;
				font-size: 100%;
				font-weight: bold;
			}

		</style>

	</head>

<body text="#999999" alink="#666666" vlink="#666666" link="#666666" topmargin="100">

	<div class="form">
		<p class="subject"><font face="メイリオ" size='10'>基本情報アンケート</font></p>

	<form name="info_form" method="POST" action="index_data.php">
	
		<p class="info_title">名前（フリガナ）</p>
		<table>
		<tr>
		 <td>姓：</td><td><input type="text" name="sei"></td>
		 <td>名：</td><td><input type="text" name="mei"></td>
		</tr>
		<tr>
		 <td>セイ：</td><td><input type="text" name="sei_kana"></td>
		 <td>メイ：</td><td><input type="text" name="mei_kana"></td>
		 <!-- value値で文字を設定すると，濃い色．ボタンなどに使う． 送信時の値の指定．-->
		</tr>
		<table>

		<p class="info_title">メールアドレス</p>
		<input type="text" name="mail_add">

		<p class="info_title">年齢</p>
		<select name="age">
		<option>----</option>
		<option>~18歳</option>
		<option>19歳</option>
		<option>20歳</option>
		<option>21歳</option>
		<option>22歳</option>
		<option>23歳</option>
		<option>24歳</option>
		<option>25歳以上</option>
		</select>

		<p class="info_title">所属</p>
		<div class="comment">学生でない方は、差し支えない範囲でご職業や所属機関を記入し、下の学年では『その他』を選択してください。</div><div class="comment">（その場合、記入は必須ではございません。）</div>
		<!-- ↑　<span>を使うと、文字の幅に合わせて領域borderが決まる。marginは適用されず、paddingは適用されるが、borderが広がり、前後の要素との位置関係は調整されず、border内に前後の要素も覆われる。 -->
		<table>
		 <tr>
		  <td>大学：</td><td><input type="text" name="univ" size="30" placeholder="〇〇大学/短期大学/専門学校"></td>
		  <td>学部学科：</td><td><input type="text" name="department" size="30" placeholder="服飾学部被服学科など"></td>
		 </tr>
		</table>

		<p class="info_title">学年</p>
		<select name="grade">
		<option>----</option>
		<option>1年生</option>
		<option>2年生</option>
		<option>3年生</option>
		<option>4年生</option>
		<option>5年生以上</option>
		<option>院生</option>
		<option>その他</option>
		</select>
		
		<div class="submit_button">
			<input type="submit" value="次へ">
		</div>

	</form>	
	</div>
		 

	<!-- <table style="color:#0099ff">
		<form name='login_form' method='POST' action='index_check.php'>

			<tr height=30>
			<td>名前（姓と名の間にスペースを入れてください）:</td>
			<td><input type='text' name='user' size=13><br></td>
			</tr> 

			<tr height=30 >
			<td>メールアドレス:</td>
			<td><input type='password' name='pass' size=13></td>
			<td><input type='submit' value='Log-in' size=15><br></td>
			</tr>
		
		</form>
	</table> -->

	
	</div>
	</font> 
</body>
</html>