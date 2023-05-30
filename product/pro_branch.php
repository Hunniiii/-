<?php
if(isset($_POST['disp'])==true){ 
    if(isset($_POST['procode'])==false){ 
    header('Location:pro_ng.php');
    exit();}
$pro_code=$_POST['procode'];
header('Location: pro_disp.php?procode='.$pro_code);
    exit();}
if(isset($_POST['add'])==true){  
    header('Location:pro_add.php');
    exit();
}
//修正ボタンが押されたとき
if(isset($_POST['edit'])==true){
    //　ラジオボタンが選択されてない場合NGにジャンプ
    if(isset($_POST['procode']) == false){
        header('Location:pro_ng.php');
        exit();    
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_edit.php?procode='. $pro_code);
    exit();
}

//削除ボタンが押されたとき
if(isset($_POST['delete'])==true){
    //　ラジオボタンが選択されてない場合NGにジャンプ
    if(isset($_POST['procode']) == false){
        header('Location:pro_ng.php');
        exit();    
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_delete.php?procode='. $pro_code);
    exit();
}

