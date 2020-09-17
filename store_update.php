<?php

require_once("db.php");

$gobackURL = "store_update.html";

$db = new Db();
if (!$db->cken($_POST)){
    header("Location:{$gobackURL}");
    exit();
}

$errors = [];
if (!isset($_POST["id"])||(!ctype_digit($_POST["id"]))){
    $errors[] = "idを入力してください";
}
if (!isset($_POST["code"])||(!ctype_digit($_POST["code"]))){
    $errors[] = "codeを入力してください";
}
if (!isset($_POST["pref"])||($_POST["pref"]==="")){
    $errors[] = "都道府県を入力してください";
}
if (!isset($_POST["name"])||($_POST["name"]==="")){
    $errors[] = "店舗名を入力してください";
}
if (!isset($_POST["creat_date"])||($_POST["creat_date"]==="")){
    $errors[] = "create_dateを入力してください";
}
if (!isset($_POST["update_date"])||($_POST["update_date"]==="")){
    $errors[] = "update_dateを入力してください";
}

if (count($errors)>0){
    echo '<ol class="error">';
    foreach ($errors as $value){
        echo "<li>", $value , "</li>";
    }
    echo "</ol>";
    echo "<hr>";
    echo "<a href=", $gobackURL, ">戻る</a>";
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

$pdo = new Db();
$pdo->conect_db();
$result = $pdo->update_store($_POST["id"], $_POST["code"], $_POST["pref"], 
                             $_POST["name"], $_POST["creat_date"], $_POST["update_date"]);
    
if($result === true)
{
    echo "更新が完了しました。";
    }else{
    echo '<span class="error"> 更新エラーがありました。</span><br>';
    };

?>
<hr>
<p><a href="store_read.php">戻る</a></p>
</div>
</body>
</html>