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

//　商品名のチェック
if($pro_name == ''){
    print '商品名が入力されてません！<br>';
}else{
    print '商品名：';
    print $pro_name;
    print '<br>';
}

//　正規表現で、価格が半角数字なのをチェックする
if(preg_match('/\A[0-9]+\z/',$pro_price)==0){    //0は一致しないとき
    print '価格は半角数字で入力してください！';
}else{
    //　価格が正しく入力されているとき
    print '価　格：';
    print $pro_price;
    print '円<br>';
}

//　エラーがある場合、戻るボタンのみ表示する
if($pro_name == '' or preg_match('/\A[0-9]+\z/',$pro_price)==0){
    ?>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
    <?php
}else{
    //　エラーがない場合は、登録ボタンの表示とhidden渡し
    ?>
    <form method="post" action="pro_add_done.php">
    <input type="hidden" name="name" value="<?=$pro_name;?>">
    <input type="hidden" name="price" value="<?=$pro_price;?>">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="登録">
    </form>


<?php
}

?>
</body>
</html>