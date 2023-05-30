<?php
if(isset($_POST['add'])){  
    header('Location:staff_add.php');
    exit();
}
//修正ボタンが押されたとき
if(isset($_POST['edit'])){
    //　ラジオボタンが選択されてない場合NGにジャンプ
    if(isset($_POST['staffcode']) == false){
        header('Location:staff_ng.php');
        exit();    
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_edit.php?staffcode='. $staff_code);
    exit();
}

//削除ボタンが押されたとき
if(isset($_POST['delete'])){
    //　ラジオボタンが選択されてない場合NGにジャンプ
    if(isset($_POST['staffcode']) == false){
        header('Location:staff_ng.php');
        exit();    
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_delete.php?staffcode='. $staff_code);
    exit();
}

