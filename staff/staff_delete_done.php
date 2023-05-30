<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>

<?php
//　postデータをローカル変数に保存
$staff_code = $_POST['code'];

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
    $sql = 'DELETE FROM
            mst_staff
            WHERE code = :code';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    // プリペアドステートメントの値をバインド
    $stmt ->bindValue(':code',$staff_code,);
    //　クエリの実行
    $stmt ->execute();
    //　DBの切断
    $dbh = null;

    //　データを書き込んだらスタッフ一覧にリダイレクト
    header('Location:./staff_list.php');
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