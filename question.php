<?php
	session_start();
?>


<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ファッションコーディネートの<br>印象評価アンケート</title>
		<link rel="stylesheet" type="text/css" href="question2.css">
	</head>

	<body text="#999999" alink="#666666" vlink="#666666" link="#666666">
	<div align="center">
	<!-- <style type="text/css"></style>で同じファイルに挿入もできる -->

	<div class="top">衣服コーディネーションの印象評価アンケート</div>

  <nav class="contents">
	<div class="head-wrapper-phone"> <!-- スマホの上部分 -->
	<div class="left_contents">
		<?php
			echo "<div class=\"left_contents_inner\">";
			print"<br><img id='image' src='sample_img/".$_GET['sample']."' width='90%' height='auto'><br><br>";
			/* サイズはここで指定しないと表示されない．左セルが上に回り込んでしまう */
				//これがないとページエラー
			/* これだと動かない．<img src='sample_img/". <?php $_GET['sample'] ?>."'> */
			echo "</div>";
		?>
	</div>
	
	<!-- ****スマホ向けのデザイン専用送信ボタン．　form属性（＝<form>のid）で送信内容を取得．　disable属性解除はJSにまとめて記載 -->
	<div class="submit-phone">
		<p class="top2">【ファッションコーディネートの<br>印象評価アンケート】</p>
		<p>すべての項目に回答すると<br>ボタンが有効になります。</p>
		<p>左右どちらかに，<br>◎：とても当てはまる<br>◯：当てはまる<br>△：少し当てはまる<br>×：どちらでもない</p>
		<button type="submit" form="Q" id="submit-button-phone" disabled>送信</button>
		<div><?php 
			if(array_search($_GET["sample"], $_SESSION["order"])<$_SESSION["sample_num"]-1){
				echo "【回答数：".(array_search($_GET["sample"], $_SESSION["order"])+1)."/".$_SESSION["sample_num"]." 】";
			}
			else{
				echo "ご協力ありがとうございました。";
			}
		?></div>	
	</div>
	
	<div class="clear">
		<!-- ****foloat解除**** -->
	</div>
	
	</div><!-- head-wrapper-phone -->
	<!-- ******************************************************************************************* -->


	<?php    
	//---------------------評価と送信--------------------------------
		print"<form id='Q' method='POST' action='question2.php?sample=".$_GET['sample']."' style='margin:0px;'>";
	?>
	<div class="right_contents">
		<div class="right_contents_inner">
			<table>

				<thead>
					<tr class="tr1">
						<th></th>
						<th>とても当てはまる</th>
						<th>当てはまる</th>
						<th>少し当てはまる</th>
						<th>どちらでもない</th>
						<th>少し当てはまる</th>
						<th>当てはまる</th>
						<th>とても当てはまる</th>
						<th></th>
					</tr>
					<tr class="tr2">
						<th></th>
						<th>◎</th>
						<th>◯</th>
						<th>△</th>
						<th>×</th>
						<th>△</th>
						<th>◯</th>
						<th>◎</th>
						<th></th>
					</tr>
				</thead>

					


			<?php
				$question_words = array();
				$question_words[] = array("気楽な", "格式高い");
				$question_words[] = array("子供っぽい", "大人っぽい");
				$question_words[] = array("下品な", "上品な");
				$question_words[] = array("ありふれた", "個性的な");
				$question_words[] = array("無骨な", "ふんわりとした");
				$question_words[] = array("安定感のある", "わくわく感のある");
				$question_words[] = array("大人しい", "大胆な");
				$question_words[] = array("無難な", "奇抜な");
				$question_words[] = array("かっこいい", "かわいい");
				$question_words[] = array("色味のある", "色味のない");
				$question_words[] = array("清楚な", "セクシーな");
				$question_words[] = array("軽快な", "重々しい");
				$question_words[] = array("日常的な", "特別な");
				$question_words[] = array("着てみたい", "着てみたくない");
				$question_words[] = array("男の子らしい", "女の子らしい");
				$question_words[] = array("地味な", "派手な");
				$question_words[] = array("デザイン性の高い", "機能性の高い");
				$question_words[] = array("男性らしい", "女性らしい");
				$question_words[] = array("引き締まった", "柔らかな");
				$question_words[] = array("暗い", "明るい");
				$question_words[] = array("きれいめな", "かわいらしい");
				$question_words[] = array("軽薄な", "理知的な");
				$question_words[] = array("すっきりした", "ふんわりした");
				$question_words[] = array("露出度の低い", "露出度の高い");
				$question_words[] = array("くつろいだ", "上品な");
				$question_words[] = array("好みに合う", "好みに合わない");
			?>

			<?php for($i=0; $i<count($question_words); $i++): ?>
				<tr id="question<?=$i?>-line">
				<td class="adj"><?=$question_words[$i][0]?></td> <!-- adjectives形容詞 -->
				<?php for($j=-3; $j<=3; $j++): ?>
					<td id='ans<?=$j?>'><input type='radio' name='question<?=$i?>' value='<?=$j?>'></td>
				<?php endfor; ?>
				<td class="adj"><?=$question_words[$i][1]?></td>
				</tr>
			<?php endfor; ?>
        
            <!--------------------上の文をPHPで純粋に描くと下になる．　echoはphpの表示させるメソッドだが．表示されるものはhtml文として扱われる！！！！-------------------->
                <!-- ”{”　は　”：”　，　”}”　は　”endfor;”　に変更可能．　\" でエスケープシーケンスにもなる -->
                <?php 
                /*  
                    for($i=0; $i<count($question_words); $i++){
		            	echo "<tr id='question'".$i."-line>";
                        echo "<td class='adj'>".$question_words[$i][0]."</td>";
		            	for($j=-3; $j<=3; $j++){
		            		echo "<td><input type='radio' name='question".$i."value=$j></td>";
                        }
                        echo "<td class='adj'>".$question_words[$i][1]."</td>";
		            	echo "</tr>";
                    }
                */
                ?>
		
			</table>
		</div> <!--right_contents_inner-->

		<?php
			print"<input type='hidden' name='no' value='".$_GET["no"]."'>";
		?>
		<!-- <br> -->
		<tr><td class="submit-box" colspan='2' align='center'>
		
			<div class='submit'>
				<input id='submit-button' type='submit' value='送信' disabled>
				<div>
					<span class="coment">送信ボタンを押してください。
						<?php 
							if(array_search($_GET["sample"], $_SESSION["order"])<$_SESSION["sample_num"]-1){
								echo "【回答数：".(array_search($_GET["sample"], $_SESSION["order"])+1)."/".$_SESSION["sample_num"]." 】";
								
								// echo $_SESSION[u_num];
								// echo $_SESSION[mail_add];
								// echo $_SESSION["temp"];
								// echo $_SESSION["current_sample_id"];
								
							}
							else{
								echo '<br>';
								echo "これで最後です！ご協力ありがとうございました！！";
							}
						?>
					</span>
				</div>
			</div>
		</td></tr>
		</form>
		<!-- <br> -->
	</div> <!--right_contents-->

  </nav>

	



	<script type="text/javascript">
	
		// （メモ）CSSでラジオボタンのサイズを変更したから必要なくなった！！！ここでの課題はcheckedになったあと、下のfunctionが適用されず、行の色が変わらなかった。これにすごく苦戦していた。
		// /* =====================セルをクリックすればラジオボタンが有効になる======================== */
		// var n = 

		// for(let i=0; i<n; i++){
        //     var Row = document.getElementById("question"+i+"-line");
        //     for(let j=1; j<Row.cells.length-1; j++){ 
        //         Row.cells[j].style.cursor="pointer";
		// 		Row.cells[j].addEventListener("click", function(){
		// 			alert("クリックされました");
		// 			var radios = document.getElementsByName("question"+i);
		// 			radios[j-1].checked = true;
		// 		});
		// 	}
		// }


			// （メモ）onclickとaddEventListenerの使い分け
        //         Row.cells[j].onclick = function(){radioCheck(i, j-1);};    
        //     }
		// }
        // function radioCheck(row, cell){
        //     var radios = document.getElementsByName("question"+row);
        //     radios[cell].checked = true;
        // }

        // RowはrowElementというobjectで，cellsプロパティーを持っている．　Row.cellsはcellElement．　radiosはobjectで同じname属性を持ってる要素が配列の様に格納されていて，radios[n]はn番目のNodeList（要素？）
        // for文のi,jをvarで定義すると，スコープが汚れる？外れる？ため，関数に持っていけなくて，ずっと7だった．letを使うとfor文のブロックでスコープを構築するため，関数にも反映されるらしい．




		var n = <?=count($question_words)?>;

        /* ======================セルの色付け・送信ボタンの有効無効===================== */

		function is_checked(radios){
			for(var i=0; i<radios.length; i++){
				if(radios[i].checked){
					return true;
				}
			}
			return false;
		}

		for(var qid=0; qid<n; ++qid){
			var radios = document.getElementsByName("question"+qid);
			var Row = document.getElementById("question"+qid+"-line");
			for(var i=0; i<radios.length; i++){
				radios[i].addEventListener("change", {obj: Row, handleEvent: function(){
					this.obj.style.background="#C0C0C0";
					
					for(var qid=0; qid<n; ++qid){
						var radios = document.getElementsByName("question"+qid);
						if(!is_checked(radios)){
							return;
							// returnの後ろに文が指定されていないとき、「以降の処理をせずに終了して呼び出し元へ流れを返す」という意味になる。
						}
					}
					document.getElementById("submit-button").disabled = false;
					document.getElementById("submit-button-phone").disabled = false;
				}});
			}

			// --------$$$$$$$-----------
			// for(var i=0; i<radios.length; i++){
			// 	radios[i].onchange = function(){Change(i, Row);};
			// }

		}


		// --------$$$$$$$-----------
		// function Change(i, Row){
		// 	Row.style.background="#C0C0C0";

		// 	for(var qid=0; qid<n; ++qid){
		// 		var radios = document.getElementsByName("question"+qid);
		// 		if(!is_checked(radios)){
		// 			return;
		// 			// returnの後ろに文が指定されていないとき、「以降の処理をせずに終了して呼び出し元へ流れを返す」という意味になる。
		// 		}
		// 	}
		// 	document.getElementById("submit-button").disabled = false;
		// 	document.getElementById("submit-button-phone").disabled = false;
			
		// }
		

	</script>


	</div>
	</body>
</html>