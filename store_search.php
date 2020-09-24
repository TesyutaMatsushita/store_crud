<?php

require_once("db.php");
$gobackURL = "store_read.php";

$db = new Db();
if (!$db->cken($_POST)){
    header("Location:{$gobackURL}");
    exit();
}

if (empty($_POST["name"])){
    echo "nameの都道府県を入力してください";
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
$result = $pdo->search_store($_POST["name"]);

if(count ($result)>0)
{
    echo "nameに「{$_POST["name"]}」が含まれているレコード";
    echo "<table>";
    echo "<thead><tr>";
    echo "<th>", "ID", "</th>";
    echo "<th>", "code", "</th>";
    echo "<th>", "pref", "</th>";
    echo "<th>", "name", "</th>";
    echo "<th>", "creat_date", "\t", "</th>";
    echo "<th>", "update_date", "\t", "</th>";
    echo "</tr></thead>";
    echo "<tbody>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>", $row['id'], "</td>";
        echo "<td>", $row['code'], "</td>";
        echo "<td>", $row['pref'], "</td>";
        echo "<td>", $row['name'], "\t", "</td>";
        echo "<td>", $row['creat_date'], "\t", "</td>";
        echo "<td>", $row['update_date'], "\t", "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}else{
    echo "nameに「{$_POST["name"]}」は見つかりませんでした。";
}

?>
<hr>
<p><a href="store_read.php">戻る</a></p>
</div>
</body>
</html>