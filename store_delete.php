<?php

require_once("db.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<mate charset="utf-8">
<title>削除</title>
<body>
<div>
<?php

ini_set('display_errors' , "On");

$pdo = new Db();
$pdo->conect_db();
$result = $pdo->delete_store($_POST["id"]);

if($result === true)
{
    echo "削除が完了しました。";
}else{
    echo '<span class="error"> 削除エラーがありました。</span><br>';
};

?>
<hr>
<p><a href="store_read.php">戻る</a></p>
</div>
</body>
</html>