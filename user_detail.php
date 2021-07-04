<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once("user_funcs.php");
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];
// echo $id;

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
};
// echo $result["kanri"];
// echo $result["life"];
?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録者更新</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user_ichiran.php">ユーザー管理</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="user_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入り登録</legend>
                <label>名前：<input type="text" name="name" value="<?= $result["name"] ?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $result["lid"] ?>"></label><br>
                <label>PW：<input type="text" name="lpw" value="<?= $result["lpw"] ?>"></label><br>
                <label>

                <select name="kanri" >
                <option value="0" <?php if($result["kanri"] == 0) echo 'selected' ?> >管理者</option>
                <option value="1" <?php if($result["kanri"] == 1) echo 'selected' ?> >スーパー管理者</option>
                </select>
                <select name="life" >
                <option value="0" <?php if($result["life"] == 0) echo 'selected' ?>  >退社</option>
                <option value="1" <?php if($result["life"] == 1) echo 'selected' ?>  >入社</option>
                </select>

                <input type="hidden" name="id" value=<?=$result["id"]?>>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
