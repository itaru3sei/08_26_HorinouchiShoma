<?php
include("functions.php");
$title = "データ一覧";

// headHTMLを作成
$head = headHtml($title);

// header用HTML作成
$header = headerHtml($title);

// DB接続
$pdo = db_conn();

// フィルタの値を決定
$order = "DESC";
if (isset($_POST["order"])) {
    $order = $_POST["order"];
}
$limit = "20";
if (isset($_POST["limit"])) {
    $limit = $_POST["limit"];
}
$like = "";
if (isset($_POST["like"])) {
    $like = $_POST["like"];
}

// selected
$selected = "";
if ($order == "ASC") {
    $selected = 'selected="selected"';
}

// データ表示SQL作成
$sql = "SELECT * FROM moisture_table WHERE name LIKE '%$like%' OR comment LIKE '%$like%' ORDER BY indate $order LIMIT $limit";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示
$view="";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    errorMsg($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = "id: ".$result["id"];
        $name = "ユーザー名: ".getUsername($result["name"]);
        $moisture = "水分量: ".$result["moisture"];
        $comment = "コメント: ".$result["comment"];
        $indate = "登録日時: ".$result["indate"];
        $edit = '<a href="detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
        $delete = '<a href="delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';
        $view .= "<li class='list-group-item'>
            <p>$id</p>
            <p>$name</p>
            <p>$moisture</p>
            <p>$comment</p>
            <p>$indate</p>
            $edit$delete
            </li>";
    }
}

?>



<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <div class="container">
        <form action="select.php" method="POST">
            <select name="order">
                <option value="DESC">新着順</option>
                <option value="ASC" <?=$selected?>>登録順</option>
            </select>
            <input type="number" name="limit" min="0" value=<?=$limit?>>件
            <input type="text" name="like" placeholder="検索ワード" value=<?=$like?>>
            <input type="submit" value="抽出">
        </form>
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>

</body>

</html>