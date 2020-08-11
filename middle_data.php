<?php
	session_start();
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />

	<title>Insert middle_form into DB</title>
</head>

<bodytopmargin="100">
<body alink="#666666" vlink="#666666" link="#666666">
<FONT face="メイリオ">
<?php

	print"<center>";
	print"<td><img src='line1.gif'></td>";
	print"<br><br>。。。読み込み中。。。<br><br>";
  print"<td><img src='line1.gif'></td>";
  print"<p>このページから移動できず、下に文字が並んでいる場合、入力に漏れや誤りがあります。<p>";
  print"<td><img src='line1.gif'></td>";
  print"<p><br>ブラウザーバック（戻る）を利用して入力し直してください。<br><p>";
  print"<td><img src='line1.gif'></td>";
  print"</center>";
    

    $u_num = $_SESSION[u_num];
    $mail_add = $_SESSION[mail_add];


    echo $u_num.$mail_add;
    
    require_once("./DB_class.php");
    $db = new DB_class();
    
    $sql = "insert into middle_table (u_num, mail_add, Q1, Q2, Q3, Q3_span, Q4, Q5, Q6, Q7, Q8, Q9, Q10, Q11, Q12, category, category_when, fb, ub, lb, Q13, Q14, Q15, Q16) values(\"$u_num\", \"$mail_add\",\"$_POST[Q1]\", \"$_POST[Q2_1], $_POST[Q2_2], $_POST[Q2_3], $_POST[Q2_4], $_POST[Q2_5], $_POST[Q2_6]\", \"$_POST[Q3]\", \"$_POST[Q3_span]\", \"$_POST[Q_C0]\", \"$_POST[Q_C1]\", \"$_POST[Q_C2]\", \"$_POST[Q_C3]\", \"$_POST[Q_C4]\", \"$_POST[Q_C5]\", \"$_POST[Q_C6]\", \"$_POST[Q_C7]\", \"$_POST[Q_C8]\", \"$_POST[category]\", \"$_POST[category_when]\", \"$_POST[fb1], $_POST[fb2], $_POST[fb3]\", \"$_POST[ub1], $_POST[ub2], $_POST[ub3]\", \"$_POST[lb1], $_POST[lb2], $_POST[lb3]\", \"$_POST[Q_E1]\", \"$_POST[Q_E2]\", \"$_POST[Q_E3]\", \"$_POST[Q_E4]\")";
    $rst = mysqli_query($db->db_object, $sql);
    if(!$rst){
      echo $sql;
		  exit  (mysqli_error ($db->db_object));
    }

    // なくても実行できる！！条件の（！）をなくすと，echoされるから，エラーチェック？？　$rstが実行できる（！の否定）が真の時，実行される．

    // ------------ページの移動----------------
		
		print"<script type='text/javascript'>";
		print"parent.location.href='question.php?sample=".$_SESSION["temp"]."'";
		print"</script>";
    

?>
</FONT> 
</body>
</html>