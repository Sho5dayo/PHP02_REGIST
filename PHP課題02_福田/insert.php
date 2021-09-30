<?php

// /**
//  * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
//  * insert.phpにPOSTでデータが飛ぶようにしてください。
//  * 2. insert.phpで値を受け取ってください。
//  * 3. 受け取ったデータをバインド変数に与えてください。
//  * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
//  */

// //1. POSTデータ取得
// $date = $_POST['date'];
// $vs = $_POST['vs'];
// $w_l = $_POST['w_l'];
// $score = $_POST['score'];

// //2. DB接続します
// try {
//     $pdo = new PDO('mysql:dbname=scoring_machine;charset=utf8;host=localhost', 'root', 'root');
// } catch (PDOException $e) {
//     exit('DBConnectError:' . $e->getMessage());
// }

// //３．データ登録SQL作成
// // 1. SQL文を用意
// // $stmt = $pdo->prepare("INSERT INTO scoring_machine(id, date, vs, w_l, score)VALUES(NULL, :date, :vs, :W_l, :score)");

// $dsn = 'mysql:host=localhost;dbname=scoring_machine;charset=utf8';
// $user = 'administrator';
// $pass = 'P@ssw0rd';

// $dbh = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// $sql = 'INSERT INTO scoring_machine(id, date, vs, w_l, score)VALUES(NULL, :date, :vs, :W_l, :score)';
// $stmt = $dbh->query($sql);

// //  2. バインド変数を用意
// $stmt->bindValue(':date', $date, PDO::PARAM_STR);
// $stmt->bindValue(':vs', $vs, PDO::PARAM_STR);
// $stmt->bindValue(':w_l', $w_l, PDO::PARAM_STR);
// $stmt->bindValue(':score', $score, PDO::PARAM_STR);

// //  3. 実行
// $status = $stmt->execute();

// //４．データ登録処理後
// if ($status == false) {
//     //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//     $error = $stmt->errorInfo();
//     exit("ErrorMessage:" . $error[2]);
// } else {
//     //５．index.phpへリダイレクト
//     header('Location: score.php');
// }


/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$id = $_POST['id'];
$date = $_POST['date'];
$vs = $_POST['vs'];
$w_l = $_POST['w_l'];
$score = $_POST['score'];

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=scoring_machine;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
}

//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO scoring_machine(id, date, vs, w_l, score)VALUES (:id, date, :vs, :W_l, :score)");

//  2. バインド変数を用意
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':vs', $vs, PDO::PARAM_STR);
$stmt->bindValue(':w_l', $w_l, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);

//  3. 実行
$status = $stmt;

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:" . $error[2]);
} else {
  //５．index.phpへリダイレクト
    header('Location: index.php');
}
