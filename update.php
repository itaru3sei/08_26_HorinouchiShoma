<?php
// 関数ファイル読み込み
include("functions.php");

//入力チェック(受信確認処理追加)
if (
    !isset($_POST["name"]) || $_POST["name"] == "" || !isset($_POST["moisture"]) || $_POST["moisture"] == ""
) {
    exit("ParamError");
}

//POSTデータ取得
$id = $_POST['id'];
$name = $_POST["name"];
$moisture = $_POST["moisture"];
$comment = $_POST["comment"];

//DB接続します(エラー処理追加)
$pdo = db_conn();

//データ登録SQL作成
$sql = 'UPDATE moisture_table SET name=:name, moisture=:moisture, comment=:comment WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':moisture', $moisture, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: select.php');
    exit;
}
