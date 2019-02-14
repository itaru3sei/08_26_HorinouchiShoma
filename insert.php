<?php
include("functions.php");

// 入力チェック
if (
    !isset($_POST["name"]) || $_POST["name"] == "" || !isset($_POST["moisture"]) || $_POST["moisture"] == ""
) {
    exit("ParamError");
}

//POSTデータ取得
$name = $_POST["name"];
$moisture = $_POST["moisture"];
$comment = $_POST["comment"];

// DB接続
$pdo = db_conn();

// データ登録SQL作成
$sql ="INSERT INTO moisture_table(id, name, moisture, comment, indate) VALUES(NULL, :name, :moisture, :comment, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":moisture", $moisture, PDO::PARAM_STR);
$stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    errorMsg($stmt);
} else {
    // index.phpへリダイレクト
    header("Location: index.php");
}







