<?php
include("functions.php");
$title = "データ登録";

// headHTMLを作成
$head = headHtml($title);

// ヘッダー用HTMLを作成
$header = headerHtml($title);

// ユーザーリストHTMLを作成
$userlist = createUserlist("");

?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form action="insert.php" method="POST" class="container">
        <?=$userlist?>
        <div class="form-group">
            <label for="moisture">水分量 *</label>
            <input type="number" step="0.1" class="form-control" id="moisture" name="moisture">
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>

</body>

</html>