<?php
// 関数ファイルの読み込み
include("functions.php");
$title = "データ更新";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLの作成
$header = headerHtml($title);

// getで送信されたidを取得
$id = $_GET["id"];

//DB接続
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = "SELECT * FROM moisture_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
}

// ユーザーリストHTMLを作成
$userlist = createUserlist($rs["name"]);

?>


<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="post" action="update.php" class="container">
        <?=$userlist?>
        <div class="form-group">
            <label for="moisture">水分量 *</label>
            <input type="number" class="form-control" id="moisture" name="moisture" value="<?=$rs['moisture']?>" step="0.1">
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"><?=$rs['comment']?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>