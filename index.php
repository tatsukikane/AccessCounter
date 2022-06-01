<?php
  //カウント数が記録してあるファイルを読み書きできるモードで開く
  $fp = fopen('count.txt', 'r+b');

  //ファイルからカウント数を取得する
  $count = fgets($fp);

  //カウント数を1増やす
  $count++;

  //カウント数の分割
  $count_ary = str_split($count);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アクセスカウンター</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <h1>アクセスカウンタ</h1>
  <div class="counter-area">
    <ul class="access-count">
      <?php
      //ループ処理でアクセス数の数字を1つづつli要素に入れる
      for($i = 0; $i < count($count_ary); $i++){
        echo'<li>'.$count_ary[$i] .'</li>';
      }
      ?>
    </ul>
  </div>
</body>
</html>

<?php
  //ポインターをファイルの先頭に戻す
  rewind($fp);

  //最新のアクセス数をファイルに書き込む
  fwrite($fp, $count);

  //ファイルを閉じる
  fclose($fp);
?>