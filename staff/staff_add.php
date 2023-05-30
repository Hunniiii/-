<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BigRock農園</title>
</head>
<body>
    <h2>スタッフ追加</h2>
    <form method="post" action="staff_add_check.php">
    スタッフ名を入力してください。<br>
    <input type="text" name="name" style="width:200px"><br>
    パスワードを入力してください。<br>
    <input type="password" name="pass" style="width:100px"><br>
    もう一度パスワードを入力してください。<br>
    <input type="password" name="pass2" style="width:100px"><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="登録">
    </form>

</body>
</html>