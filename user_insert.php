<?php
include("functions.php");

// 入力チェック
if (
    !isset($_POST["name"]) || $_POST["name"] == "" || !isset($_POST["lid"]) || $_POST["lid"] == "" || !isset($_POST["lpw"]) || $_POST["lpw"] == ""
) {
    exit("ParamError");
}

//POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

// DB接続
$pdo = db_conn();

// データ登録SQL作成
$sql ="INSERT INTO user_table(id, name, lid, lpw, kanri_flg, life_flg) VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$stmt->bindValue(":lpw", $lpw, PDO::PARAM_STR);
$stmt->bindValue(":kanri_flg", $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(":life_flg", $life_flg, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    errorMsg($stmt);
} else {
    // index.phpへリダイレクト
    header("Location: user_index.php");
}







