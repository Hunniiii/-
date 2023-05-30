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
$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];
$staff_pass2 = $_POST['pass2'];

//　サニタイジング
$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass2 = htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

//　スタッフ名のチェック
if($staff_name == ''){
    print 'スタッフ名が入力されてません！<br>';
}else{
    print 'スタッフ名：';
    print $staff_name;
    print '<br>';
}

//　パスワードのチェック
if($staff_pass == ''){
    print 'パスワードが入力されてません！<br>';
}

//　2個めのパスワードが1個めと一致しない場合(未入力も含む)
if($staff_pass != $staff_pass2){
    print 'パスワードが一致しません！<br>';
}

//　エラーがある場合、戻るボタンのみ表示する
if($staff_name == '' or $staff_pass == '' or $staff_pass != $staff_pass2){
    ?>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
    <?php
}else{
    //　エラーがない場合は、登録ボタンの表示とhidden渡し
    //　パスワードをハッシュ関数(MD5)で暗号化
    $staff_pass = md5($staff_pass);
    //print $staff_pass;
    ?>
    <form method="post" action="staff_edit_done.php">
    <input type="hidden" name="name" value="<?=$staff_name;?>">
    <input type="hidden" name="pass" value="<?=$staff_pass;?>">
    <input type="hidden" name="code" value="<?=$staff_code;?>">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="変更">
    </form>


<?php
}

?>
</body>
</html>