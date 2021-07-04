<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="bm_ichiran.php">登録書籍一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="user_logout.php">ログアウト</a></div><!-- ここを追記 -->
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="bm_touroku.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入り登録</legend>
                <label>書籍名：　　<input type="text" name="name"></label><br>
                <label>書籍url：　<input type="text" name="url"></label><br>
                <label>感想・内容：<textarea name="content" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
