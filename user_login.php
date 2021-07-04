<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_register.php">ユーザー新規登録</a></div>
    <!-- <div class="navbar-header"><a class="navbar-brand" href="user_ichiran.php">ユーザー一覧</a></div> -->
    <div class="navbar-header"><a class="navbar-brand" href="bm_ichiran.php">登録書籍一覧</a></div>
    </div>
  </nav>
</header>
<h2>ログインフォーム</h2>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="user_login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>
<br>
<p>※スーパー管理者でログインするとユーザー一覧画面が選択できます</p>

</body>
</html>