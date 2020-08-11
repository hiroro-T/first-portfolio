<?php
    echo "これはチェックページです<br><br><br>";
    echo "メモやチェック，進捗を記載";

    ////////////////////////////////////
    echo "進捗：　5/15 レスポンシブデザイン中．スマホの時に送信ボタンが画像の横に来る様に考え，2つのボタンを作成し達成！次はデザインを整える　";
    ////////////////////////////////////

    for($i=1; $i<=50; $i++){
        echo $_POST{"question$i"};
    }
    echo "<br>";
    
    // $answers = array(50);
    $answers = [50];

    for($i=1; $i<=50; $i++){
        $answers[$i-1] = $_POST{"question$i"};
    }
    var_dump($answers);
    echo "<br>";

    $keys = range(1,50);
    //連続する整数の配列(start,end(,span))
    var_dump($keys);
    echo "<br>";

    $answers = array_combine($keys, $answers);

    var_dump($answers);
/*
$name = 'Alex';
$gender = 'men';
$age = 30;
$email = 'nickerdoodle@sample.co.jp';
$personalData = array();
// 変数を統合
$personalData = compact( "name", "gender", "age", "email");
var_dump($personalData);
*/

?>