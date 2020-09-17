<?php

require_once("db.php");

$id = $_POST["id"];
$code = $_POST["code"];

?>
<!DOCTYPE html>
<html lang="ja"><head>
<meta charset="utf-8">
<title>更新</title>
</head>
<body>
<div>
<form method="POST" action="store_update3.php">
<ul>
    <li>
        <label>id：
        <?= $_POST["id"] ?>  
        <!-- 値を表示するだけなら上の書き方でも良い -->
        <?php 
        echo "<input type=hidden name='id' value=" . $_POST["id"] . "></td>";
        ?>
        </label>
    </li>

    <li>
        <label>code：
        <?php echo $code; 
       echo "<input type=hidden name='code' value=" . $code . "></td>";
        ?>
        </label>
    </li>

    <li>
        <label>pref：
        <input type="text" name="pref" placeholder="都道府県">
        </label>
    </li>

    <li>
        <label>name :
            <input type="text" name="name" placeholder="店舗名">
        </label>
    </li>

    <li>
        <label>creat_date :
            <input type="text" name="creat_date" placeholder="2020-9-10 13:10:02">
        </label>
    </li>
    <li>
        <label>update_date :
            <input type="text" name="update_date" placeholder="2020-9-10 13:10:02">
        </label>
    </li>
    <li><input type="submit" value="更新する"></li>
</ul>
</form>
</div>
</body>
</html>