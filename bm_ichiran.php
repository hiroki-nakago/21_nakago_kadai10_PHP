<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */

session_start();
require_once("funcs.php");

loginCheck();
$user_name = $_SESSION['name'];
$user_kanri = $_SESSION['kanri'];

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .= '<a href="bm_detail.php?id='.$result["id"].'" >';
        $view .= $result["indate"] . "：" . $result["name"];
        $view .= '</a>';
        $view .= '<a href=bm_sakuzyo.php?id='.$result["id"].'">';
        $view .= '　　[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録書籍一覧</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                    <a class="navbar-brand" href="bm_register.php">←書籍登録画面へ</a>
                    <?php if($user_kanri == 1){
                        echo '<a class="navbar-brand" href="user_ichiran.php">←ユーザー一覧管理画面へ</a>';
                        };
                        echo "<p class ='navbar-brand' >ようこそ！$user_name さん！</p>";
                    ?>
                     <div class="navbar-header"><a class="navbar-brand" href="user_logout.php">ログアウト</a></div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="bm_detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
