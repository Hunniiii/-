<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>

<?php

// DB に接続する場合エラーが発生するので例外処理を行う
try{
    // DataSourceName
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    // DB User(mariaDB のユーザ名)
    $db_user='root';
    // DB priceword(mariaDB のパスワード)
    $db_price='';
    // dbh(DataBaseHandler)インスタンスを、PDO クラスから生成する
    $dbh = new PDO($dsn,$db_user,$db_price);
    // インスタンスにプロパティを設定する
    $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // SQL の準備(プリペアドステートメント)
    $sql = 'SELECT code,name,price FROM mst_product';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    //　クエリの実行
    $stmt ->execute();
    //　DBの切断
    $dbh = null;

    print '<h2>商品一覧</h2>';
/*
    //　無限ループ
    while(true){
        //　読み込んだデータのフェッチ
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        //　フェッチが終了(false)になったら、ループを抜ける
        if($rec == false){
            break;
        }
        print $rec['name'];
        print '<br>';
    }
*/
    ?>
    <form method="post" action="pro_branch.php">
    <table border="1">
    <?php
    //　フェッチの結果をループの継続条件とする。
    while($rec = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <tr>
            <td><input type="radio" name="procode" value="<?=$rec['code'];?>"></td>
            <td><?=$rec['name'];?></td>
            <td><?=$rec['price'];?></td>
        </tr>
    <?php
    }
    ?>
    </table>
    <input type="submit" name="disp" value="参照">
    <input type="submit" name="add" value="追加">
    <input type="submit" name="edit" value="修正">
    <input type="submit" name="delete" value="消す">

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