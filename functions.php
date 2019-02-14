<?php
// DB接続関数（PDO）
function db_conn()
{
    //DB接続
    $dbn = 'mysql:dbname=gs_f02_db26;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:'.$e->getMessage());
    }
}


// SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// headHTML作成
function headHtml($title) {
    $head = "<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>$title</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
    </head>";
    return $head;
}

// ヘッダーHTML作成
function headerHtml($title) {
    $header = "<header>
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='#'>$title</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav'>
        <li class='nav-item'>
        <a class='nav-link' href='index.php'>データ登録</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='select.php'>データ一覧</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='user_index.php'>ユーザー登録</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='user_select.php'>ユーザー一覧</a>
        </li>
        </ul>
        </div>
        </nav>
        </header>";

    return $header;
}

// 登録済のユーザーリストHTMLを作成
function createUserlist($userid) {
    // DB接続
    $pdo = db_conn();

    // SQL作成
    $sql = "SELECT * FROM user_table";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    // ユーザーリスト作成
    $userlist="";
    if ($status == false) {
        //execute（SQL実行時にエラーがある場合）
        errorMsg($stmt);
    } else {
        //Selectデータの数だけ自動でループしてくれる
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $result["id"];
            $name = $result["name"];
            // selected
            $selected = "";
            if ($id == $userid) {
                $selected = 'selected="selected"';
            }
            $userlist .= "<option value='$id' $selected>$name</option>";
        }
    }

    $userlist = "<div class='form-group'>
        <label for='name'>ユーザー名 *</label>
        <select class='form-control' id='name' name='name'>
        <option></option>
        $userlist
        </select>
        </div>";

    return $userlist;
}

function getUsername ($userid) {
    // DB接続
    $pdo = db_conn();

    // SQL作成
    $sql = "SELECT * FROM user_table WHERE id=$userid";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    // ユーザーリスト作成
    $username="";
    if ($status == false) {
        //execute（SQL実行時にエラーがある場合）
        errorMsg($stmt);
    } else {
        //Selectデータの数だけ自動でループしてくれる
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = $result["name"];
        }
    }

    return $username;
}