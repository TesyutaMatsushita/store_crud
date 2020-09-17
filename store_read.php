<?php

require_once("db.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<mate charset="utf-8">
<body>
<div>
<?php

ini_set('display_errors' , "On");

$pdo = new Db();
$pdo->conect_db();
$result = $pdo->select_store();

echo "<table>";
echo "<thead><tr>";
echo "<th>", "ID", "</th>";
echo "<th>", "code", "</th>";
echo "<th>", "pref", "</th>";
echo "<th>", "name", "</th>";
echo "<th>", "creat_date", "\t", "</th>";
echo "<th>", "update_date", "\t", "</th>";
echo "<th>", "up or dele", "\t", "</th>";
echo "</tr></thead>";
echo "<tbody>";
foreach ($result as $row){
echo "<tr>";
echo "<td>", $row['id'], "</td>";
echo "<td>", $row['code'], "</td>";
echo "<td>", $row['pref'], "</td>";
echo "<td>", $row['name'], "\t", "</td>";
echo "<td>", $row['creat_date'], "\t", "</td>";
echo "<td>", $row['update_date'], "\t", "</td>";
echo "<form action = store_update2.php method=POST>";
echo "<td><input type=hidden name='id' value=" . $row['id'] . "></td>";
echo "<td><input type=hidden name='code' value=" . $row['code'] . "></td>";
echo "<td><input type = submit value = 更新></td>";
echo "</form>";
echo "<form action = store_delete.php method=POST>";
echo "<td><input type=hidden name='id' value=" . $row['id'] . "></td>";
echo "<td><input type = submit value = 削除></td>";
echo "</form>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
<p><a href="store_create.html">新規登録</a></p>
</div>
</body>
</html>