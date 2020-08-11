<?php
	session_start();
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />

	<title>Error</title>
</head>

<bodytopmargin="100">
<body text="#999999" alink="#666666" vlink="#666666" link="#666666">
<FONT face="メイリオ">
<?php

	print"<center>";
	print"<td><img src='line1.gif'></td>";
	print"<br><br>。。。読み込み中。。。<br><br>";
	print"<td><img src='line1.gif'></td>";
    print"</center>";
    

    if($_POST["sei"] != NULL && $_POST["mei"]!=NULL && $_POST["mail_add"]!=NULL && $_POST["age"]!="----" && $_POST["univ"]!=NULL && $_POST["department"]!=NULL && $_POST["grade"]!="----"){
        echo $_POST["sei"];
        echo $_POST["mei"];
        echo $_POST["age"];
        echo $_POST["grade"];
        echo $_POST["univ"];
        echo gettype($_POST["age"]);
    }

    require_once("./DB_class.php");
    $db = new DB_class();

    $sql ="select max(u_num) as max_num from info_table";
    $stmt = mysqli_query($db->db_object, $sql);
    if(!$stmt){
        echo "erro";
    }
    else{
        echo "collect";
        
        $result = mysqli_fetch_assoc($stmt);
        // stmtはクエリ実行によるデータセットを得ているが，PHPでは扱えない．　これをfetchで連想配列にしている．assocはカラム名や上でのasで設定した名前，　NUMにするとカラム番号で表現するっぽい．
        $u_num = $result["max_num"];

        if($u_num == NULL){
            echo "Null";
            echo "here";
            $u_num = 101;
        }
        else{
            echo $u_num;
            echo "there";
            $u_num += 1;
        }
    }
    
    $sql2 = "insert into info_table (u_num, sei, mei, sei_kana, mei_kana, mail_add, age, univ, department, grade) values(\"$u_num\", \"$_POST[sei]\", \"$_POST[mei]\", \"$_POST[sei_kana]\", \"$_POST[mei_kana]\", \"$_POST[mail_add]\", \"$_POST[age]\", \"$_POST[univ]\", \"$_POST[department]\", \"$_POST[grade]\")";
    // values()の /" /" の中身は文字列として扱われて代入される．　複数入力もでき，区切り（，）を入れるとそのまま入る．
    // 上の文章で，POST[]のなかに””を入れるとエラー
    $rst2 = mysqli_query($db->db_object, $sql2);
    if(!$rst2){
        echo $sql2;
		exit  (mysqli_error ($db->db_object));
    }

    $_SESSION["u_num"] = $u_num;
    $_SESSION["mail_add"] = $_POST[mail_add];
    echo $_SESSION[u_num];
    echo $_SESSION[mail_add];
    // （発見）　$_POST[]の中は””がなくても実行できる！！

    // なくても実行できる！！条件の（！）をなくすと，echoされるから，エラーチェック？？　$rstが実行できる（！の否定）が真の時，実行される．

    //------------ページの移動----------------
		
		$dir = "sample_img";
		$order = array();
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if ($file !== "." && $file !== ".." && $file !== ".DS_Store") {
                        // .は自分のディレクトリ，　..は親ディレクトリ（1階層上）に含まれていることを意味する．
						
						/* ???聞きたい??? */
						
						$order[] = $file;
					}
				}
				closedir($dh);
			}
		}
		
		shuffle ($order);
		//　画像ファイルを配列に入れて，ランダムにする
		
		$order = array_combine (range (0, count ($order)-1), $order);
			/* array_combineで前者をキー，後者を値として配列を構築する．rangeで前者startから後者endまでの整数配列をつくる．(startがシーケンス最初の値，値がendに達するまでシーケンスを続ける) */
		
		$_SESSION["order"] = $order;
		$_SESSION["sample_num"] = count ($order);
		var_dump ($order);
		print"<script type='text/javascript'>";
		print"parent.location.href='question.php?sample=".$_SESSION["order"][0]."'";
			// question.phpファイル呼び出し・利用　?はgetで得たモノを入れるところを意味してる．
        print"</script>";
        // ここでsampleという変数が定義されたことになるのかも！！！ ↑[?sample]

?>
</FONT> 
</body>
</html>