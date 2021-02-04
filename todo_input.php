<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mypage（入力画面）</title>
</head>

<body>
  <form action="create_file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>mypage（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">logout</a>
      <div>
        名前: <input type="text" name="username">
      </div>
      <div>
        チーム名: <input type="text" name="team">
      </div>
      <div>
        Q1-コミュニケーションは楽しいか: <input type="text" name="q1">
      </div>
      <div>
        Q2-コミュニケーションは得意か: <input type="text" name="q2">
      </div>
      <div>
        Q3-人からどうみられているか気になるか: <input type="text" name="q3">
      </div>
      <div>
        画像登録: <input type="file" name="upfile" accept="image/*">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>