<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>
    <h2>商品追加</h2>
    <form method="post" action="pro_add_check.php" enctype="multipart/from-data">
    商品名を入力してください。<br>
    <input type="text" name="name" style="width:200px"><br>
    価格を入力してください。<br>
    <input type="text" name="price" style="width:50px"><br>
    画像を選んでください。<br />
    <input type ="file" name="gazou" style="width:400px"><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="登録">
    </form>

</body>
</html>