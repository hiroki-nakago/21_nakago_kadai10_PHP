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
                <!-- <div class="navbar-header"><a class="navbar-brand" href="user_ichiran.php">ユーザー一覧</a></div> -->
                <div class="navbar-header"><a class="navbar-brand" href="user_login.php">ログイン画面</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="user_index.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="text" name="lpw"></label><br>
                <label>
                <select name="kanri" >
                <option value="0">管理者</option>
                <option value="1">スーパー管理者</option>
                </select>
                <select name="life" >
                <option value="0">退社</option>
                <option value="1">入社</option>
                </select>

                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>
</body>

</html>
