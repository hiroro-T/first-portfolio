<?php
    session_start();
?>


<html lang="ja">
    <head>
        <title>Entrance</title>
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">

        <style type="text/css">
            body{
                font-family: "ヒラギノ角ゴシック";
            }
            h1{
                margin: 20px;
                color: green;
                font-size: 250%;
            }
            li{
                font-weight: bolder;
            }
            .q_line{
                text-decoration: underline double;
            }
            .table{
                color: #808080;
                width: 70%;
                border: solid 3px;
            }
            .table thead th{
                border: solid 1px;
                width: 100px;
                font-size: 80%;
            }
            table tr td{
                text-align: center;
            }
            input[type=radio]{
                transform: scale(1.5); 
            }
            .text{
                height: 30px;
                width: 150px;
            }
            .submit_button{
                float: right;
                margin: -20px 60px 30px 0px;
                width: 100px;
                height: 60px;
                font-size: 100%;
                font-weight: bold;
            }
        </style>
    </head>

    <body  alink="#666666" vlink="#666666" link="#666666">
        <h1>中間ブレイクアンケート</h1>

        <div class="contents">
        <form method="POST" action="middle_data.php">
            <ol>
                <div>
                <li><p>アパレルに関する経験について</p></li>
                    <p>●　学校でアパレルに関して学んでいる（いた）．
                        <input type="radio" name="Q1" value=0>&nbsp;No &emsp;<input type="radio" name="Q1" value=1>&nbsp;Yes </p>
                    <p>●　それはどんな分野ですか．（複数回答可）［上記で"No"と回答した方は「その他」を選んでください．］<br>
                        &emsp;<input type="radio" name="Q2_1" value="design">デザイン
                        &emsp;<input type="radio" name="Q2_2" value="busines">ビジネス
                        &emsp;<input type="radio" name="Q2_3" value="production">アパレル設計・生産
                        &emsp;<input type="radio" name="Q2_4" value="culture">歴史・文化
                        &emsp;<input type="radio" name="Q2_5" value="material">素材
                        &emsp;<input type="radio" name="Q2_6" value="others">その他 <!--etcetera-->
                        <!-- （メモ）　&emsp;「全角スペースとほぼ同じ」 &nbsp;「改行しないスペース，半角くらい」 &ensp;「半角より少し広いスペース」 -->
                        <!-- （メモ）　<pre></pre> は<p>と同じ様に文章入力に使えるが，スペースなども反映される．-->
                        <!-- （メモ）　cssでは letter-spacingで指定できる． -->
                        &emsp; <input type="button" value="取り消し" onclick="deselect()">
                    </p>
                    <p>●　アパレルでアルバイト（仕事）をしている（いた）．
                        <input type="radio" name="Q3" value=0>&nbsp;No &emsp;<input type="radio" name="Q3" value=1>&nbsp;Yes(→) 
                    ■期間(ex. 約1年10ヶ月)：<input class="text" type="text" name="Q3_span"> </p>
                </div>

                <script type="text/javascript">
                    function deselect(){        
                        for(var i=1; i<7; i++){
                            document.getElementsByName("Q2_"+i)[0].checked = false;
                        }
                    }
                </script>




                <?php
				$questions = array();
				$questions[] = ("ファッション（流行）には敏感な方だ．");
				$questions[] = ("服装は人のキャラクターや印象を表すと思う．");
				$questions[] = ("普段の外出時に衣服選択に気を使う．");
				$questions[] = ("ちょっと出かける時（近所，知り合いと合わない）も衣服選択に気を使う．");
				$questions[] = ("周囲の人は私の服装によって受ける印象が変わると思う．");
				$questions[] = ("他人（友達含め）の印象は服装によって変わる．");
				$questions[] = ("自分のキャラクターと普段の服装の印象はマッチしている．");
				$questions[] = ("自分に似合う服装（コーディネート）の系統は決まっている．");
				$questions[] = ("それ以外の系統も着てみたいと思う．（上記で「当てはまらない」と回答した方は「どちらでもない」を選択してください．）");
			    ?>

                <div>
                <li><p>衣服選択について</p></li>
                <!-- <p>ファッション（流行）には敏感な方だ．</p>
                <p>服装は人のキャラクターや印象を表すと思う．</p>
                <p>普段の外出時に衣服選択に気を使う．</p>
                <p>ちょっと出かける時（近所，知り合いと合わない）も衣服選択に気を使う．</p>
                <p>周囲の人は私の服装によって受ける印象が変わると思う．</p>
                <p>他人（友達含め）の印象は服装によって変わる．</p>
                <p>自分のキャラクターと普段の服装の印象はマッチしている．</p>
                <p>自分に似合う服装（コーディネート）の系統は決まっている．</p>
                <p>それ以外の系統も着てみたいと思う．</p> -->
                
                <div>                       
                    <?php for($i=0; $i<=8; $i++): ?>
                    <p class="q_line">●　<?=$questions[$i] ?></p>
                    <p>    
                        <table class="table">
                            <thead>
                                <th>当てはまらない</th>
                                <th>やや当てはまらない</th>
                                <th>どちらでもない</th>
                                <th>やや当てはまる</th>
                                <th>当てはまる</th>
                            </thead>
                            <tr>
				            <!-- <td>当てはまらない</td> -->
				            <?php for($j=-2; $j<=2; $j++): ?>
					        <td class="radio"><input type='radio' name='Q_C<?=$i?>' value='<?=$j?>'></td>
				            <?php endfor; ?>
				            <!-- <td>当てはまる</td> -->
				            </tr>
                        </table>
                    </p>
			        <?php endfor; ?>
                </div>

                <ul>
                <p>■　決まっているのはどの様な系統ですか？：<input class="text" type=text name="category"></p>
                <p>■　いつ頃固まってきましたか？（だいたいで構いません．ex. 大学1年生の頃，18歳の頃）：<input class="text" type=text name="category_when"></p>
                </ul>
                </div>



                <div>
                <li><p>ブランドについて</p></li>
                <p>●　好きなブランド（最大3つ）：<input class="text" type=text name="fb1">&nbsp;<input class="text" type=text name="fb2">&nbsp;<input class="text" type=text name="fb3"> </p>
                <p>●　よく買う・着るブランド（最大3つ）：<input class="text" type=text name="ub1">&nbsp;<input class="text" type=text name="ub2">&nbsp;<input class="text" type=text name="ub3"> </p>
                <p>●　憧れる・着てみたいブランド（最大3つ）：<input class="text" type=text name="lb1">&nbsp;<input class="text" type=text name="lb2">&nbsp;<input class="text" type=text name="lb3"> </p>
                </div>



                <div>
                <li><p>これまでの経験について</p></li>
                <p>●　雑誌や店頭などで「これいいな」と思うアイテムは自分の持っている物と似ている．</p>
                <p>    
                        <table class="table">
                            <thead>
                                <th>当てはまらない</th>
                                <th>やや当てはまらない</th>
                                <th>どちらでもない</th>
                                <th>やや当てはまる</th>
                                <th>当てはまる</th>
                            </thead>
                            <tr>
				            <!-- <td>当てはまらない</td> -->
				            <?php for($j=-2; $j<=2; $j++): ?>
					        <td class="radio"><input type='radio' name='Q_E1' value='<?=$j?>'></td>
				            <?php endfor; ?>
				            <!-- <td>当てはまる</td> -->
				            </tr>
                        </table>
                    </p>
                <p>●　雑誌や店頭などで「これいいな」と思うコーディネーションは普段の自分の服装と近い．</p>
                <p>    
                        <table class="table">
                            <thead>
                                <th>当てはまらない</th>
                                <th>やや当てはまらない</th>
                                <th>どちらでもない</th>
                                <th>やや当てはまる</th>
                                <th>当てはまる</th>
                            </thead>
                            <tr>
				            <!-- <td>当てはまらない</td> -->
				            <?php for($j=-2; $j<=2; $j++): ?>
					        <td class="radio"><input type='radio' name='Q_E2' value='<?=$j?>'></td>
				            <?php endfor; ?>
				            <!-- <td>当てはまる</td> -->
				            </tr>
                        </table>
                    </p>
                <p>●　雑誌や店頭などで「これいいな」と思うアイテムがあっても，自分には合わないと思うことがある．</p>
                <p>    
                        <table class="table">
                            <thead>
                                <th>当てはまらない</th>
                                <th>やや当てはまらない</th>
                                <th>どちらでもない</th>
                                <th>やや当てはまる</th>
                                <th>当てはまる</th>
                            </thead>
                            <tr>
				            <!-- <td>当てはまらない</td> -->
				            <?php for($j=-2; $j<=2; $j++): ?>
					        <td class="radio"><input type='radio' name='Q_E3' value='<?=$j?>'></td>
				            <?php endfor; ?>
				            <!-- <td>当てはまる</td> -->
				            </tr>
                        </table>
                    </p>
                <p>●　雑誌や店頭などで「これいいな」と思うコーディネーションがあっても，自分には合わないと思うことがある．</p>
                <p>    
                        <table class="table">
                            <thead>
                                <th>当てはまらない</th>
                                <th>やや当てはまらない</th>
                                <th>どちらでもない</th>
                                <th>やや当てはまる</th>
                                <th>当てはまる</th>
                            </thead>
                            <tr>
				            <!-- <td>当てはまらない</td> -->
				            <?php for($j=-2; $j<=2; $j++): ?>
					        <td class="radio"><input type='radio' name='Q_E4' value='<?=$j?>'></td>
				            <?php endfor; ?>
				            <!-- <td>当てはまる</td> -->
				            </tr>
                        </table>
                    </p>
                </div>
            </ol>

            <input class="submit_button" id="submit-button" type="submit" value="送信">
        
        </form>
        </div>


    </body>

</html>