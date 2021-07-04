<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once("funcs.php");
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];
// echo $id;

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
};
?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="bm_ichiran.php">登録書籍データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="bm_update.php">
        <div class="jumbotron">
        <fieldset>
                <legend>お気に入り登録</legend>
                <label>書籍名：　　<input type="text" name="name" value="<?= $result["name"] ?>" ></label><br>
                <label>書籍url：　<input type="text" name="url" value="<?= $result["url"] ?>"></label><br>
                <label>感想・内容：<textarea name="content" rows="4" cols="40"><?=$result["content"] ?></textarea></label><br>
              
                <input type="hidden" name="id" value=<?=$result["id"]?>>
                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
</body>

</html>
