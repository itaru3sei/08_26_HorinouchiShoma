<?php
// 関数ファイルの読み込み
include("functions.php");
$title = "ユーザー更新";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLの作成
$header = headerHtml($title);

// getで送信されたidを取得
$id = $_GET["id"];

//DB接続
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = "SELECT * FROM user_table WHERE id=:id";
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

// selected
$kanri_flg = "";
if ($rs['kanri_flg'] == "1") {
    $kanri_flg = 'selected="selected"';
}
$life_flg = "";
if ($rs['life_flg'] == "1") {
    $life_flg = 'selected="selected"';
}

?>


<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="post" action="user_update.php" class="container">
        <div class="form-group">
            <label for="name">ユーザー名 *</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="lid">ログインID *</label>
            <input type="text" class="form-control" id="lid" name="lid" value="<?=$rs['lid']?>">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード *</label>
            <input type="password" class="form-control" id="lpw" name="lpw" value="<?=$rs['lpw']?>">
        </div>
        <div class="form-group">
            <label for="kanri_flg">権限</label>
            <select class="form-control" id="kanri_flg" name="kanri_flg">
                <option value="0">一般</option>
                <option value="1" <?=$kanri_flg?>>管理者</option>
            </select>
        </div>
        <div class="form-group">
            <label for="life_flg">利用</label>
            <select class="form-control" id="life_flg" name="life_flg">
                <option value="0">アクティブ</option>
                <option value="1" <?=$life_flg?>>非アクティブ</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>