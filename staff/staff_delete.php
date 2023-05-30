<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>

<?php

//　Postデータをローカル変数に格納
$staff_code = $_GET['staffcode'];
//print $staff_code;

// DB に接続する場合エラーが発生するので例外処理を行う
try{
    // DataSourceName
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    // DB User(mariaDB のユーザ名)
    $db_user='root';
    // DB Password(mariaDB のパスワード)
    $db_pass='';
    // dbh(DataBaseHandler)インスタンスを、PDO クラスから生成する
    $dbh = new PDO($dsn,$db_user,$db_pass);
    // インスタンスにプロパティを設定する
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // SQL の準備(プリペアドステートメント)
    $sql = 'SELECT name FROM mst_staff WHERE code = :code';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    // プリペアドステートメントの値をバインド
    $stmt ->bindValue(':code',$staff_code);
    //　クエリの実行
    $stmt ->execute();
    //　DBの切断
    $dbh = null;
    //　氏名の読み込み
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    print '<h2>スタッフ削除</h2>';
    ?>
  
    スタッフコード：　<?= $staff_code;?>
    <br>
    <br>
    スタッフ名:　<?= $rec['name'];?>
    <br>
    このスタッフを削除してよろしいでしょうか？<br>
    <form method="post" action="staff_delete_done.php">
    <input type="hidden" name="code" value="<?=$staff_code;?>">
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="確定">
    </form>
    <?php

 //　　　例外が発生したら、内容を$eに保存
 }catch(PDOException $e){
    //　エラーメッセージの表示
    print '<h2><pre>--- DB Error ---';
    //　プログラムの終了とエラーの内容
    exit($e);
 }
 



?>
</body>
</html>