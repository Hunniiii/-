<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>

<?php
//　postデータをローカル変数に保存
$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];

//　サニタイジング
$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

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
    $sql = 'INSERT INTO
            mst_staff(name,password)
            VALUES(:name,:password)';
    // DataBaseHandler に SQL を代入
    $stmt = $dbh ->prepare($sql);
    // プリペアドステートメントの値をバインド
    $stmt ->bindValue(':name',$staff_name);
    $stmt ->bindValue(':password',$staff_pass);
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