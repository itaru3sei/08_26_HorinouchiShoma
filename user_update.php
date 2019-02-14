<?php
// 関数ファイル読み込み
include("functions.php");

//入力チェック(受信確認処理追加)
if (
    !isset($_POST["name"]) || $_POST["name"] == "" || !isset($_POST["lid"]) || $_POST["lid"] == "" || !isset($_POST["lpw"]) || $_POST["lpw"] == ""
) {
    exit("ParamError");
}

//POSTデータ取得
$id = $_POST['id'];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

//DB接続します(エラー処理追加)
$pdo = db_conn();

//データ登録SQL作成
$sql = 'UPDATE user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":lid", $lid, PDO::PARAM_STR);
$stmt->bindValue(":lpw", $lpw, PDO::PARAM_STR);
$stmt->bindValue(":kanri_flg", $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(":life_flg", $life_flg, PDO::PARAM_STR);
$stmt->bindValue(":id", $id, PDO::PARAM_STR);
$status = $stmt->execute();


//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit;
}
