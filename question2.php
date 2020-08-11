<?php
	session_start();
?>

<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
	<title>Questions</title>
</head>
<body text="#999999" alink="#666666" vlink="#666666" link="#666666">
<div align="center">


<?php
//-------------------データベースに接続--------------------------
	require_once("./DB_class.php");
	$db = new DB_class();

//---------------userのテーブルへのアップデート----------------

	
	
	// insert into [テーブル名1，2，・・・（列名1，2，・・・）] values(値1，2，・・・);　値の挿入
	// insert into A; select *(項目名) from B; BからselectされたテーブルがAに差し込まれる
	$sql = "insert into answer_tbl (u_num, sample) values (\"$_SESSION[u_num]\", \"$_GET[sample]\")";
	// \"で文字列を切らずに，”の挿入を意味している．単純に”だけだと文字列が切れてしまう．　文字列の足し算はできる．

	/* $sql = "insert into answer_tbl (user, sample, question1) values (\"$_SESSION[user]\", \"$_GET[sample]\", $_POST[question1)"; */
	/* DB上でクエリ（要求，命令）を実行（実行文を変数化？）　
		手続き型　mysqli_query(mysqli $link, string $query)
		オブジェクト指向　mysqli::query(string $query)
		失敗→FALSE，成功→TRUE，SELECT,SHOW,DESCRIBE,EXPLAINが成功するとmysqli_resultオブジェクトを返す．
	*/

		
	$rst  = mysqli_query($db->db_object, $sql);
	if (!$rst) { //実行がFALSEだったら???
		echo $sql;
		// sqlクエリの実行？，
		exit  (mysqli_error ($db->db_object));
		// 言語構造， exit ([string,int $status]):void statusの指定なしでカッコなしでもコールできる．statusを表示して終了する．
	}


	$answers = [];

	for($i=0; $i<=25; $i++){
		$answers[$i] = $_POST["question$i"];
	}

	$keys = range(1,26);
	//連続する整数の配列(start,end(,span))
	// 0~25にするなら，データベースのquestion0~25の26個に，1~26ならデータベースのquestion1~26の26個に入る．　keyを使うなら，配列の数よりここに対応関係を気をつける！！！

	$answers = array_combine($keys, $answers);

	foreach($answers as $key => $value){
		$sql2 = "update answer_tbl set question$key = $value where u_num = \"$_SESSION[u_num]\" and sample = \"$_GET[sample]\" ";
		//　注）　\”が無いと　Unknown column 'test' in 'where clause'のエラー
	
		$rst  = mysqli_query($db->db_object, $sql2);
		if (!$rst) { //実行がFALSEだったら???
			echo $sql2;
			// sqlクエリの実行？，
			exit  (mysqli_error ($db->db_object));
			// 言語構造， exit ([string,int $status]):void statusの指定なしでカッコなしでもコールできる．statusを表示して終了する．
		}
	}

	// $sql2 = "insert into answer_tbl(question".($i+1).") values(answer[".$i."])";

	//ページの切り替え
		
	$current_sample_id = array_search($_GET["sample"], $_SESSION["order"]);
	// array_search(mixed $needle, array $haystack)　haystack（配列）内の needleを検索する．
	$_SESSION["current_sample_id"]=$current_sample_id;

	if($current_sample_id+1 == $_SESSION["sample_num"]/2) {
			//$_SESSION[sample_num]=画像枚数 回答が送信された画像が半分の枚数目の時 
		$temp =	$_SESSION["order"][$current_sample_id + 1];
		// ここで＋1しておいて，middle_formから直接次の画像評価に移動する．
			
		$_SESSION["temp"]=$temp;
		$_SESSION["current_sample_id"]=$current_sample_id+1;
		echo $_SESSEION[temp];

		print"<script type='text/javascript'>";
		print"parent.location.href='middle_form.php';";
		print"</script>";
	
	}

	elseif($current_sample_id < $_SESSION["sample_num"] - 1) {
		//　ランダムにした画像配列から提示画像の番号を引き出し，配列数（配列番号-1，0番目と配列個数）より少なければ，次の画像提示を以下の文で行う．
		
		$temp =	$_SESSION["order"][$current_sample_id + 1];
		// temporary?一時的な？
			
		var_dump ($_GET["sample"]);
		// dump投げ捨てる，打ち出す．　変数または，処理命令の戻り値を詳細に出力するデバック用ツールともなる関数．
		$_SESSION["temp"] = $temp;
		// $_SESSION["current_sample_id"] = $current_sample_id;
		echo $temp;

		print"<script type='text/javascript'>";
		print"parent.location.href='question.php?sample=".$temp." ' ";
		print"</script>";
		//　ランダムにした画像の並びを，

	}
	
	else{
		//------ページの切り替え------
		print"<script type='text/javascript'>";
		print"parent.location.href='thanks.php';";
		print"</script>";
					
	}

?>
</font> 
</body>
</html>