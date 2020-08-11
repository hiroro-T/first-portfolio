<?php
	session_start();
?>

<html>
<head> 
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
    <style type="text/css">
        body{
            text-align: center;
        }
        .comment{
			background: rgba(255,215,0,0.7);
			width: 80%;
			margin: 2.0em auto;
			padding: 1.0em;
			border-radius: 1.0em;
		}
        .comment2{
			background: rgba(189,183,107,0.7);
			width: 70%;
			margin: 2.0em auto;
			padding: 1.0em;
			border-radius: 1.0em;
            text-align: left;
            font-weight: bold;
		}
    </style>
   
	<title>end of page</title>
</head>

<bodytopmargin="100">
<body alink="#666666" vlink="#666666" link="#666666">
<FONT face="メイリオ">

<div class="comment">
	<br><font size='6'>これで全て終了です。</font><br>
	<font size='8'>ご協力ありがとうございました。</font><br>
	<br><font size='6'>タブを閉じていただいて大丈夫です。</font><br>
</div>

<?php


    $u_num = $_SESSION[u_num];
    $mail_add = $_SESSION[mail_add];
    $if_correct = $_POST[if_cor];
    $new_mail_add = $_POST[new_mail_add];
    $note = $_POST[note];


    // echo $u_num."<br>".$mail_add."<br>".$if_correct."<br>".$new_mail_add."<br>".$note;
    
    require_once("./DB_class.php");
    $db = new DB_class();
    
    $sql = "insert into thanks_table (u_num, if_correct, note, new_mail_add, mail_add) values(\"$u_num\", \"$if_correct\",\"$note\", \"$new_mail_add\", \"$mail_add\")";
    $rst = mysqli_query($db->db_object, $sql);
    if(!$rst){
        echo $sql;
		exit  (mysqli_error ($db->db_object));
    }


?>

<div class="comment2">
    この内容が送信されました。▼
    <?php echo "<br>回答者番号；　".$u_num."<br>メールアドレス；　".$new_mail_add."<br>備考；　".$note; ?>

</div>
</FONT> 
</body>
</html>