<?php
include("functions.php");
$title = "ユーザー登録";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml($title);

?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form action="user_insert.php" method="POST" class="container">
        <div class="form-group">
            <label for="name">ユーザー名 *</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="lid">ログインID *</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード *</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
        <div class="form-group">
            <label for="kanri_flg">権限</label>
            <select class="form-control" id="kanri_flg" name="kanri_flg">
                <option value="0">一般</option>
                <option value="1">管理者</option>
            </select>
        </div>
        <div class="form-group">
            <label for="life_flg">利用</label>
            <select class="form-control" id="life_flg" name="life_flg">
                <option value="0">アクティブ</option>
                <option value="1">非アクティブ</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>

</body>

</html>