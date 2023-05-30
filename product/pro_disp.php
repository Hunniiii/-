<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sokota農園</title>
</head>
<body>

<?php

//　Postデータをローカル変数に格納
$pro_code = $_GET['procode'];
//print $pro_code;

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
    $sql = 'SELECT name,price FROM mst_product WHERE code = :code';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    // プリペアドステートメントの値をバインド
    $stmt ->bindValue(':code',$pro_code);
    //　クエリの実行
    $stmt ->execute();
    //　DBの切断
    $dbh = null;
    //　氏名の読み込み
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_price=$rec['price'];

    print '<h2>商品参照</h2>';
    ?>
  
    商品コード：<?= $pro_code;?>
    <br>
    <br>    
    商品名<br>
    <?php print $pro_name;?>
    <br />
    価格<br>
    <?php print $pro_price;?>円
    <br　/>  
    <input type="button" onclick="history.back()" value="戻る">
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