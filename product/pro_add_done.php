<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>

<?php
//　postデータをローカル変数に保存
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];

//　サニタイジング
$pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

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
    $sql = 'INSERT INTO
            mst_product(name,price)
            VALUES(:name,:price)';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    // プリペアドステートメントの値をバインド
    $stmt ->bindValue(':name',$pro_name);
    $stmt ->bindValue(':price',$pro_price);
    //　クエリの実行
    $stmt ->execute();
    //　DBの切断
    $dbh = null;

    //　データを書き込んだら商品一覧にリダイレクト
    header('Location:./pro_list.php');
    exit();
    
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