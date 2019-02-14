<?php
include("functions.php");
$title = "ユーザー一覧";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml($title);

// DB接続
$pdo = db_conn();

// フィルタの値を決定
$limit = "20";
if (isset($_POST["limit"])) {
    $limit = $_POST["limit"];
}
$like = "";
if (isset($_POST["like"])) {
    $like = $_POST["like"];
}

// データ表示SQL作成
$sql = "SELECT * FROM user_table WHERE name LIKE '%$like%' LIMIT $limit";
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
        $name = "ユーザー名: ".$result["name"];
        $lid = "ログインID: ".$result["lid"];
        $lpw = "パスワード: ".$result["lpw"];
        $kanri_flg = "kanri_flg: ".$result["kanri_flg"];
        $life_flg = "life_flg: ".$result["life_flg"];
        $edit = '<a href="user_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
        $delete = '<a href="user_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';
        $view .= "<li class='list-group-item'>
            <p>$id</p>
            <p>$name</p>
            <p>$lid</p>
            <p>$lpw</p>
            <p>$kanri_flg</p>
            <p>$life_flg</p>
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
        <form action="user_select.php" method="POST">
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