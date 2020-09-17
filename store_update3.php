<?php

require_once("db.php");
$gobackURL = "store_update2.php";

ini_set('display_errors' , "On");

$db = new Db();
if (!$db->cken($_POST)){
    header("Location:{$gobackURL}");
    exit();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<mate charset="utf-8">
</head>
<body>
<div>
<?php
ini_set('display_errors' , "On");

$errors = [];
if (empty($_POST["pref"])){
    $errors[] = "都道府県を入力してください";
}
if (empty($_POST["name"])){
    $errors[] = "店舗名を入力してください";
}
if (empty($_POST["creat_date"])){
    $errors[] = "create_dateを入力してください";
}
if (empty($_POST["update_date"])){
    $errors[] = "update_dateを入力してください";
}

if(count($errors) === 0)
{
    $pdo = new Db();
    $pdo->conect_db();
    $result = $pdo->update_store($_POST["id"], $_POST["code"], $_POST["pref"], 
                                $_POST["name"], $_POST["creat_date"], $_POST["update_date"]);
        
    if($result === true)
    {
        echo "更新が完了しました。";
    }else{
        echo '<span class="error"> 更新エラーがありました。</span><br>';
        }    
}

if(count($errors)>0)
{
    echo "<hr>";
    echo "エラー項目" , "<br>";
    echo '<ul class="error">';
    foreach ($errors as $value){
        echo  "<li>", $value , "</li>";
    }
    echo "<hr>";
    echo "</ull>";
    echo "<a href=", $gobackURL, ">更新画面へ</a>";
    exit();
}

?>
<hr>
<p><a href="store_read.php">戻る</a></p>
</div>
</body>
</html>