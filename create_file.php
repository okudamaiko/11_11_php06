<?php
session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// exit();

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['team']) || $_POST['team'] == '' ||
  !isset($_POST['q1']) || $_POST['q1'] == '' ||
  !isset($_POST['q2']) || $_POST['q2'] == '' ||
  !isset($_POST['q3']) || $_POST['q3'] == ''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 受け取ったデータを変数に入れる
$username = $_POST['username'];
$team = $_POST['team'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];


// ここからファイルアップロード&DB登録の処理を追加しよう！！！

// DB接続
$pdo = connect_to_db();

if (!isset($_FILES['upfile']) && $_FILES['upfile']['error'] != 0) {
  exit('Error:画像が送信されていません');
} else {
  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path = $_FILES['upfile']['tmp_name'];
  $directory_path = 'upload/';
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
  // var_dump($filename_to_save);
  // exit();
  if (!is_uploaded_file($temp_path)) {
    exit('Error:画像がありません');
  } else {
    if (!move_uploaded_file($temp_path, $filename_to_save)) {
      exit('Error:アップロードできませんでした');
    } else {
      chmod($filename_to_save, 0644); // 権限の変更
      // データ登録SQL作成
      // `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
      $sql = 'INSERT INTO users_table(id, username, team, image, q1 , q2, q3, created_at, updated_at) VALUES(NULL, :username, :team, :image, :q1, :q2, :q3, sysdate(), sysdate())';

      // SQL準備&実行
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->bindValue(':team', $team, PDO::PARAM_STR);
      $stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
      $stmt->bindValue(':q1', $q1, PDO::PARAM_STR);
      $stmt->bindValue(':q2', $q2, PDO::PARAM_STR);
      $stmt->bindValue(':q3', $q3, PDO::PARAM_STR);
      $status = $stmt->execute();
      if ($status == false) {
        // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
      } else {
        // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
        $_SESSION = array();
        $_SESSION["session_id"] = session_id();
        $_SESSION["team"] = $val["team"];
        // $_SESSION["user_id"] = $val["id"];
        header("Location:todo_read.php");
        exit();
      }
    }
  }
}
